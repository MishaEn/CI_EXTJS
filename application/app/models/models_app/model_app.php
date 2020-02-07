<?php
    function app_get_user_password($login){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT password FROM users WHERE login = :login');
        $stm->bindValue(':login', $login);
        if($stm->execute()){
            $data = $stm->fetch();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{
                $response = ['error' => false, 'status' => 'success', 'data' => $data['password']];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function app_get_user_login($login){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT `login` FROM users WHERE login = :login');
        $stm->bindValue(':login', $login);
        if($stm->execute()){
            $data = $stm->fetch();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{
                $response = ['error' => false, 'status' => 'success'];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function app_get_user_id($login){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT id FROM users WHERE login = :login');
        $stm->bindValue(':login', $login);
        if($stm->execute()){
            $data = $stm->fetch();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{
                $response = ['error' => false, 'status' => 'success','data' => $data['id']];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function app_get_role_policy(){

        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT f.functional_name, a.action_name, rp.role_list
                                        FROM role_policy rp
                                        INNER JOIN action_on_functionality aof on rp.action_functionality_id = aof.id
                                        INNER JOIN action a on aof.action_id = a.id
                                        INNER JOIN functional f on aof.functional_id = f.id ');
        if($stm->execute()){
            $data = $stm->fetchAll();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{
                $response = ['error' => false, 'status' => 'success','data' => $data];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function app_get_role_id($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT role_id FROM users WHERE id = :id');
        $stm->bindValue(':id', $id);
        if($stm->execute()){
            $data = $stm->fetch();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{
                $response = ['error' => false, 'status' => 'success','data' => $data['role_id']];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function update_user_password($password, $login){
        $pdo = get_pdo();
        $stm = $pdo->prepare('UPDATE users SET password = :password WHERE login = :login');
        $stm->bindValue(':password', $password);
        $stm->bindValue(':login', $login);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function get_director_id($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT id FROM director WHERE user_id = :id');
        $stm->bindValue(':id', $id);
        if($stm->execute()){
            $data = $stm->fetch();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{
                $response = ['error' => false, 'status' => 'success','data' => $data['id']];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function get_director_status($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT status FROM users WHERE id = :id');
        $stm->bindValue(':id', $id);
        if($stm->execute()){
            $data = $stm->fetch();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{
                $response = ['error' => false, 'status' => 'success','data' => $data['status']];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function app_check_email($email){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT id FROM users WHERE email = :email');
        $stm->bindValue(':email', $email);
        if($stm->execute()){
            $data = $stm->fetch();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'not exist'];
            }
            else{
                $response = ['error' => false, 'status' => 'success'];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function app_update_password($password, $email){
        $pdo = get_pdo();
        $stm = $pdo->prepare('UPDATE `users` SET `password`=:password WHERE email = :address');
        $stm->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
        $stm->bindValue(':address', $email);
        if ($stm->execute()) {
            $response = ['error' => false, 'status' => 'success'];
        } else {
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }