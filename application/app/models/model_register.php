<?php
    function add_user($data){
        $pdo = get_pdo();
        $stm = $pdo->prepare('INSERT INTO `users`
                                        (
                                            `role_id`,
                                            `password`,
                                            `login`,
                                            `email`,
                                            `full_name`, 
                                            `comment`,
                                            `code`, 
                                            `status`,
                                            `register_date`
                                        ) 
                                        VALUES
                                        (
                                            2,
                                            :password,
                                            :login,
                                            :email,
                                            :ful_name,
                                            null,
                                            null,
                                            0,
                                            :register_data
                                        )');
        $stm->bindValue(':password', $data['password']);
        $stm->bindValue(':login', $data['login']);
        $stm->bindValue(':email', $data['email']);
        $stm->bindValue(':ful_name', $data['ful_name']);
        $stm->bindValue(':register_data', date("Y-m-d H:i:s"));
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function check_login($login){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT id FROM users WHERE login=:login');
        $stm->bindValue(':login', $login);
        if($stm->execute()){
            $data = $stm->fetch();
            if(empty($data)){
                $response = ['error' => false, 'status' => 'success'];
            }
            else{
                $response = ['error' => true, 'status' => 'exist'];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function check_email($email){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT id FROM users WHERE email = :email');
        $stm->bindValue(':email', $email);
        if($stm->execute()){
            $data = $stm->fetch();
            if(empty($data)){
                $response = ['error' => false, 'status' => 'success'];
            }
            else{
                $response = ['error' => true, 'status' => 'exist'];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }