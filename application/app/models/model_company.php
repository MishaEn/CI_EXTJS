<?php
    function get_company($id = null){
        $pdo = get_pdo();
        if(is_null($id)){
            $stm = $pdo->prepare('SELECT * FROM company ORDER BY register_date DESC ');
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
                    $response = ['error' => false,  'status' => 'success','data' => $data];
                }
            }
            else{
                $response = ['error' => true, 'status' => 'execute error'];
            }
        }
        return $response;
    }
    function get_company_by_id($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT u.full_name, u.id, d.id, c.*
                                        FROM company c
                                        INNER JOIN director d on c.director_id = d.id
                                        INNER JOIN users u on d.user_id = u.id
                                        WHERE c.id = :id');
        $stm->bindValue(':id', $id);
        if($stm->execute()){
            $data = $stm->fetchAll();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{
                $response = ['error' => false,  'status' => 'success','data' => $data];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function add_company($id=null, $organization_name = null, $count=null, $data = null){
        $pdo = get_pdo();
        if($data == null){
            $stm = $pdo->prepare('INSERT INTO company (director_id, organization_name, status, register_date) VALUES (:director_id, :name, 0, :date)');
            $stm->bindValue(':director_id', $id);
            $stm->bindValue(':name', $organization_name);
            $stm->bindValue(':date', date("Y-m-d H:i:s"));
            if($stm->execute()){
                $response = ['error' => false, 'status' => 'success'];
            }
            else{
                $response = ['error' => true, 'status' => 'execute error'];
            }
        }
        else{
            $stm = $pdo->prepare('INSERT INTO company
                                        (
                                            `director_id`, `organization_name`, `director_name`, `inn_kpp`, `ogrn`, `juridical_address`, `postal_adress`, `settlement_account`, `bank_name`, `correction_account`, `bik`, `okpo`, `code`, `comment`, `status`, `register_date`
                                        ) 
                                        VALUES
                                        (
                                           :director_id, :organization_name, :director_name, :inn_kpp, :ogrn, :juridical_address, :postal_adress, :settlement_account, :bank_name, :correction_account, :bik, :okpo, null, null, 0, :register_date
                                        )');
            $stm->bindValue(':director_id', $data['director_id']);
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
            }
            else{
                $response = ['error' => true, 'status' => 'execute error'];
            }
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
    function get_company_status($id, $value = null,  $type = null){
        $pdo = get_pdo();
        if(is_null($type)){
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
        }
        else{
            $stm = $pdo->prepare('SELECT id, status FROM company WHERE id IN ('.$id.')');
            $exp = explode(',', $id);
            $arr = explode(',', $value);
            foreach ($arr as $key => $item){
                $stm->bindValue($exp[$key], $item);
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
        }

        return $response;
    }
    function get_directors_id(){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT u.code, u.full_name, d.id
                                        FROM users u
                                        INNER JOIN director d on u.id = d.user_id'
                            );
        if($stm->execute()){
            $data = $stm->fetchAll();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{
                $response = ['error' => false,  'status' => 'success','data' => $data];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function activate_company($data){
        $pdo = get_pdo();

        if(empty($_POST['code']) && empty($_POST['comment'])) {
            $stm = $pdo->prepare('UPDATE company SET status=1 WHERE id=:id');
            $stm->bindValue(':id', $_POST['id']);
        }
        else if(!empty($_POST['code'])){
            $stm = $pdo->prepare('UPDATE company SET code=:code, status=1 WHERE id=:id');
            $stm->bindValue(':code', $_POST['code']);
            $stm->bindValue(':id', $_POST['id']);
        }
        else if(!empty($_POST['comment'])){
            $stm = $pdo->prepare('UPDATE company SET comment=:comment, status=1 WHERE id=:id');
            $stm->bindValue(':comment', $_POST['comment']);
            $stm->bindValue(':id', $_POST['id']);
        }
        else{
            $stm = $pdo->prepare('UPDATE company SET code=:code, comment=:comment, status=1 WHERE id=:id');
            $stm->bindValue(':code', $_POST['code']);
            $stm->bindValue(':comment', $_POST['comment']);
            $stm->bindValue(':id', $_POST['id']);
        }
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success', 'data' =>  $_POST['id']];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function delete_company($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('DELETE FROM `company` WHERE id=:id');
        $stm->bindValue(':id',$id);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function get_company_by_date($now, $past){
        /**/

        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT organization_name, director_name, code, comment, status, id FROM company WHERE register_date BETWEEN :past and :now');
        $stm->bindValue(':now', $now);
        $stm->bindValue(':past', $past);
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