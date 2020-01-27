<?php
    function load_model_app($model_name){
        if(file_exists(ROOTMODELS.'/models_app/model_'.$model_name.'.php')){
            require_once ROOTMODELS.'/models_app/model_'.$model_name.'.php';
        }
    }
    function load_model($model_name){
        if(file_exists(ROOTMODELS.'/model_'.$model_name.'.php')){

            require_once ROOTMODELS.'/model_'.$model_name.'.php';
        }
    }
/*
    function create_response($stm, $field){
        if($stm->execute()){
            $data = $stm->fetchAll();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{
                $response = ['error' => false, 'status' => 'success', 'data' => [$field => $data[0][$field]]];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }
    function create_response_full($stm){
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
    function create_response_list($stm, $field){
        if($stm->execute()){
            $data = $stm->fetchAll();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{
                $response = ['error' => false, 'status' => 'success', 'data' => [$field => []]];
                foreach ($data as $item){
                    array_push($response['data'][$field], $item[$field]);
                }

            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function create_response_insert($stm){
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }*/