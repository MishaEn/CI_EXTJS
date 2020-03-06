<?php
    function get_employee($id = null){
        $pdo = get_pdo();
        if(is_null($id)){
            $stm = $pdo->prepare('SELECT e.id, u.full_name, u.login, u.email, u.status, e.director_id FROM users u INNER JOIN employee e on u.id = e.user_id');
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
        }
        else{
            $stm = $pdo->prepare('SELECT e.id, u.full_name, u.login, u.email, u.status FROM users u INNER JOIN employee e on u.id = e.user_id  WHERE e.director_id = :id');
            $stm->bindValue(':id', $id);
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
        }
        return $response;
    }


    function add_employee($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('INSERT INTO users (role_id, password, login, email, full_name, status, register_date) VALUES (3, :password, :login, :email, :full_name, 0, :register_data)');
        $stm->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
        $stm->bindValue(':login', $_POST['login']);
        $stm->bindValue(':email', $_POST['email']);
        $stm->bindValue(':full_name', $_POST['full_name']);
        $stm->bindValue(':register_data', date('Y-m-d H:i:s'));
        if($stm->execute()){
            //
            $pdo = get_pdo();
            $stm = $pdo->prepare('SELECT id FROM users where email = :email');
            $stm->bindValue(':email', $_POST['email']);
            $stm->execute();
            $data = $stm->fetch();
            $pdo = get_pdo();
            $stm = $pdo->prepare('INSERT INTO employee (user_id, director_id) VALUES (:data, :director_id)');
            $stm->bindValue(':data', $data['id']);
            $stm->bindValue(':director_id', $id);
            $stm->execute();
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }


    function get_last_employee_row($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT e.id, u.full_name, u.login, u.email, u.status, e.director_id FROM users u INNER JOIN employee e on u.id = e.user_id where director_id = 248 ORDER BY e.id desc LIMIT 1');
        if($stm->execute()){
            $data = $stm->fetch();
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

    function get_employee_status($list, $value){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT u.status FROM users u INNER JOIN employee e on u.id = e.user_id where e.id IN ('.$list.')');
        $arr = explode(',', $list);
        foreach($arr as $key => $item){
            $stm->bindValue($item, $value[$key]);
        }
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