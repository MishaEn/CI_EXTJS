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
        $stm->bindValue(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $stm->bindValue(':login', $data['login']);
        $stm->bindValue(':email', $data['email']);
        $stm->bindValue(':ful_name', $data['full_name']);
        $stm->bindValue(':register_data', date("Y-m-d H:i:s"));
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
            add_director($data['login']);
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function register_get_user_id($login){
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
    function add_director($login){
        $id = register_get_user_id($login)['data'];

            $pdo = get_pdo();
        $stm = $pdo->prepare('INSERT INTO `director`(`user_id`, `markup`, `activation_count`, `brand`) VALUES (:id, null, null, null)');
        $stm->bindValue(':id', $id);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function register_get_director_id($user_id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT id FROM director WHERE user_id = :user_id');
        $stm->bindValue(':user_id', $user_id);
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
    function get_inn(){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT inn_kpp FROM company');
        if($stm->execute()){
            $data = $stm->fetchAll();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{

                $response = ['error' => false, 'status' => 'success', 'data' => $data];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function check_inn($inn){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT id FROM company WHERE inn_kpp = :inn');
        $stm->bindValue(':email', $email);
        if($stm->execute()){
            $data = $stm->fetchAll();
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
    function check_ogrn($ogrn){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT id FROM company WHERE ogrn = :ogrn');
        $stm->bindValue(':ogrn', $ogrn);
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
    function check_settlement_account($settlement_account){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT id FROM company WHERE settlement_account = :settlement_account');
        $stm->bindValue(':settlement_account', $settlement_account);
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

    function register_add_company($director_id, $data){
        $pdo = get_pdo();
        $stm = $pdo->prepare('INSERT INTO company
                                        (
                                            `director_id`, `organization_name`, `director_name`, `inn_kpp`, `ogrn`, `juridical_address`, `postal_adress`, `settlement_account`, `bank_name`, `correction_account`, `bik`, `okpo`, `code`, `comment`, `status`, `register_date`
                                        ) 
                                        VALUES
                                        (
                                           :director_id, :organization_name, :director_name, :inn_kpp, :ogrn, :juridical_address, :postal_adress, :settlement_account, :bank_name, :correction_account, :bik, :okpo, null, null, 0, :register_date
                                        )');
        $stm->bindValue(':director_id', $director_id['data']);
        $stm->bindValue(':organization_name', $data['organization_name']);
        $stm->bindValue(':director_name', $data['director_name']);
        $stm->bindValue(':inn_kpp', $data['inn_kpp']);
        $stm->bindValue(':ogrn', $data['ogrn']);
        $stm->bindValue(':juridical_address', $data['juridical_address']);
        $stm->bindValue(':postal_adress', $data['postal_address']);
        $stm->bindValue(':settlement_account', $data['settlement_account']);
        $stm->bindValue(':bank_name', $data['bank_name']);
        $stm->bindValue(':correction_account', $data['correction_account']);
        $stm->bindValue(':bik', $data['bik']);
        $stm->bindValue(':okpo', $data['okpo']);
        $stm->bindValue(':register_date', date("Y-m-d H:i:s"));
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
            add_director($data['login']);
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function add_shop($director_id, $data){
        $pdo = get_pdo();
        $stm = $pdo->prepare('INSERT INTO shop
                                        (
                                            director_id, director_email, director_phone, shop_address, work_time, shop_email, shop_phone, shop_name, register_date, comment, status
                                        ) 
                                        VALUES
                                        (
                                            :director_id, :director_email, :director_phone, :shop_address, :work_time, :shop_email, :shop_phone, :shop_name, :register_data, null, null
                                        )');
        $stm->bindValue(':director_id', $director_id['data']);
        $stm->bindValue(':director_email', $data['director_email']);
        $stm->bindValue(':director_phone', $data['director_phone']);
        $stm->bindValue(':shop_address', $data['shop_address']);
        $stm->bindValue(':work_time', $data['work_time']);
        $stm->bindValue(':shop_email', $data['shop_email']);
        $stm->bindValue(':shop_phone', $data['shop_phone']);
        $stm->bindValue(':shop_name', $data['shop_name']);
        $stm->bindValue(':register_data', date("Y-m-d H:i:s"));
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
