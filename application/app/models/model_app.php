<?php
    function get_user_data($id){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT * FROM users WHERE id = :id');
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
