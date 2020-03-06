<?php
    function get_director($id = null){
        $pdo = get_pdo();
        if(is_null($id)){
            $stm = $pdo->prepare(
                '
                SELECT u.*, d.*
                FROM users u
                INNER JOIN director d on u.id = d.user_id WHERE u.role_id = 2  ORDER BY u.id DESC');
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
            $stm = $pdo->prepare('SELECT u.id, u.role_id, u.login, u.email, u.full_name, u.register_date, u.comment, u.code, d.*
                                            FROM users u
                                            INNER JOIN director d on u.id = d.user_id WHERE d.id = :id ORDER BY u.id DESC');
            $stm->bindValue(':id', $id);
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
        }
        return $response;
    }
    function get_company_by_director_id($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT * FROM company WHERE director_id = :id');
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
        return $response;
    }
    function get_director_by_user_id($id = null){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT u.id, u.role_id, u.login, u.email, u.full_name, u.register_date, u.comment, u.code, d.*
                                            FROM users u
                                            INNER JOIN director d on u.id = d.user_id WHERE d.user_id = :id');
        $stm->bindValue(':id', $id);
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

    function update_director_column($id, $data, $column){
        $pdo = get_pdo();
        $stm = $pdo->prepare('UPDATE director d
                                        INNER JOIN users u on d.user_id = u.id
                                        SET u.'.$column.'=:data
                                        WHERE d.id = :id');
        $stm->bindValue(':id', $id);
        $stm->bindValue(':data', $data);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function activate_director($data){
        $pdo = get_pdo();
        $stm = $pdo->prepare('UPDATE director d
                                        INNER JOIN users u on d.user_id = u.id
                                        SET u.status=:status, u.code=:code, u.comment=:comment, d.markup=:markup, d.brand=:brand, d.activation_count=:activation_count
                                        WHERE d.id = :id');
        $stm->bindValue(':id', $data['id']);
        $stm->bindValue(':status', $data['status']);
        $stm->bindValue(':code', $data['code']);
        $stm->bindValue(':comment', $data['comment']);
        $stm->bindValue(':markup', $data['markup']);
        $stm->bindValue(':brand', $data['brand']);
        $stm->bindValue(':activation_count', $data['activation_count']);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function deactivate_director($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('UPDATE director d
                                        INNER JOIN users u on d.user_id = u.id
                                        SET u.status=:status
                                        WHERE d.id = :id');
        $stm->bindValue(':id',$id);
        $stm->bindValue(':status', 0);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function block_director($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('UPDATE director d
                                        INNER JOIN users u on d.user_id = u.id
                                        SET u.status=:status
                                        WHERE d.id = :id');
        $stm->bindValue(':id', $id);
        $stm->bindValue(':status', 2);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function unlock_director($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('UPDATE director d
                                        INNER JOIN users u on d.user_id = u.id
                                        SET u.status=:status
                                        WHERE d.id = :id');
        $stm->bindValue(':id', $id);
        $stm->bindValue(':status', 0);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function delete_director($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('DELETE u
                                        FROM users u
                                        INNER JOIN director d on u.id = d.user_id
                                        WHERE d.id = :id
                                        ');
        $stm->bindValue(':id', $id);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function get_director_id_by_email($data){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT d.id
                                        FROM director d
                                        INNER JOIN users u on u.id = d.user_id WHERE u.email = :email');
        $stm->bindValue(':email', $data);
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
    function get_director_id_by_login($data){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT d.id
                                        FROM director d
                                        INNER JOIN users u on u.id = d.user_id WHERE u.login = :login');
        $stm->bindValue(':login', $data);
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
    function get_user_id_by_login($login){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT id
                                        FROM users
                                        WHERE login = :login');
        $stm->bindValue(':login', $login);
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
    function add_user($data){
        $pdo = get_pdo();
        $stm = $pdo->prepare('INSERT INTO
                                        `users`
                                        (role_id, `password`, `login`, `email`, `full_name`, `comment`, `code`, `status`, `register_date`)
                                        VALUES
                                        (2, :password, :login, :email, :full_name, null, null, 0, :register_date)');
        $stm->bindValue(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $stm->bindValue(':login', $data['login']);
        $stm->bindValue(':email', $data['email']);
        $stm->bindValue(':full_name', $data['full_name']);
        $stm->bindValue(':register_date', date('Y-m-d H:i:s'));
        if($stm->execute()){
            $id = get_user_id_by_login($data['login'])['data']['id'];
            $stm = $pdo->prepare('INSERT INTO
                                        `director`
                                        (user_id, markup, activation_count, brand)
                                        VALUES
                                        (:id, null, null, null)');
            $stm->bindValue(':id', $id);
            if($stm->execute()){
                $response = ['error' => false, 'status' => 'success'];
            }
            else{
                $response = ['error' => true, 'status' => 'execute error'];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;

    }
    function get_sort_director($direction, $field){
        $pdo = get_pdo();
        if($direction == 1){
            $direction = 'ASC';
        }
        else{
            $direction = 'DESC';
        }
        if($field == 'markup' or $field == 'activation_count' or $field == 'brand'){
            $table = 'd';
        }
        else{
            $table = 'u';
        }
        $sql = '
            SELECT u.*, d.*
            FROM users u
            INNER JOIN director d on u.id = d.user_id WHERE u.role_id = 2  ORDER BY '.$table.'.'.$field.' '.$direction;
        $stm = $pdo->prepare($sql);
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

    function update_director($id, $data){
        $pdo = get_pdo();
        $stm = $pdo->prepare('UPDATE director d
                                        INNER JOIN users u on d.user_id = u.id
                                        SET u.full_name=:full_name, u.email=:email, u.login=:login, u.code=:code, d.markup=:markup, d.activation_count=:activation_count, d.brand=:brand
                                        WHERE d.id = :id');
        $stm->bindValue(':id', $id);
        $stm->bindValue(':full_name', $data['full_name']);
        $stm->bindValue(':email', $data['email']);
        $stm->bindValue(':login', $data['login']);
        $stm->bindValue(':code', $data['code']);
        $stm->bindValue(':markup', $data['markup']);
        $stm->bindValue(':activation_count', $data['activation_count']);
        $stm->bindValue(':brand', $data['brand']);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }