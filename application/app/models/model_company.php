<?php
    function get_company($id = null){
        $pdo = get_pdo();
        if(is_null($id)){
            $stm = $pdo->prepare('SELECT * FROM company');
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
        }
        return $response;
    }
    function add_company($id, $count){
        $pdo = get_pdo();
        $stm = $pdo->prepare('INSERT INTO company (director_id, organization_name, status, register_date) VALUES (:director_id, :name, 0, :date)');
        $stm->bindValue(':director_id', $id);
        $stm->bindValue(':name', 'Новая компания '.$count);
        $stm->bindValue(':date', date("Y-m-d H:i:s"));
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function get_last_company_id($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT id FROM company WHERE director_id = :id ORDER BY id DESC LIMIT 1;');
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

    function update_deleted_at($data){
        if($data['delete'] == 'false'){
            $deleted_at = date('Y-m-d H:i:s');
            $status = 3;
        }
        else{
            $deleted_at = null;
            $status = 0;
        }
        $pdo = get_pdo();
        $stm = $pdo->prepare('UPDATE company SET status=:status, deleted_at = :delete_at WHERE id=:id');
        $stm->bindValue(':id', $data['id']);
        $stm->bindValue(':delete_at', $deleted_at);
        $stm->bindValue(':status', $status);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function update_blocked_at($data){
        if($data['delete'] == 'false'){
            $deleted_at = date('Y-m-d H:i:s');
            $status = 4;
        }
        else{
            $deleted_at = null;
            $status = 0;
        }
        $pdo = get_pdo();
        $stm = $pdo->prepare('UPDATE company SET status=:status, blocked_at = :delete_at WHERE id=:id');
        $stm->bindValue(':id', $data['id']);
        $stm->bindValue(':delete_at', $deleted_at);
        $stm->bindValue(':status', $status);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function update_company_column($id, $data, $column){
        $pdo = get_pdo();
        $stm = $pdo->prepare('UPDATE company SET status=:status, '.$column.' = :data WHERE id=:id');
        $stm->bindValue(':id', $id);
        $stm->bindValue(':data', $data);
        $stm->bindValue(':status', 5);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function get_company_status($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT status FROM company WHERE id = :id');
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