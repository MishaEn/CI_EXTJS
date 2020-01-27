<?php
    function valid_field($field, $option = null){
        $response = ['error' => true, 'status' => 'access guard'];
        if(empty($field)){
            $response = ['error' => true, 'status' => 'field empty'];
        }
        else{
            $response = ['error' => false, 'status' => 'success'];
        }
        if(!is_null($option)){
            if(isset($option['type'])){

            }
            if(isset($option['min_length'])){
                if(strlen($field) < $option['min_length']){
                    printable($field);
                    printable($option['min_length']);
                    $response = ['error' => true, 'status' => 'min length error'];
                }
                else{
                    $response = ['error' => false, 'status' => 'success'];
                }
            }
            if(isset($option['max_length'])){
                if(strlen($field) > $option['max_length']){
                    $response = ['error' => true, 'status' => 'max length error'];
                }
                else{
                    $response = ['error' => false, 'status' => 'success'];
                }
            }
            if(isset($option['regexp'])){

            }
        }

        return $response;
    }

    function valid_group_field($data){
        $result = [];
        foreach ($data['field'] as $key => $item){
            $valid_status = valid_field($item, $data['option'][$key]);
            $result['field'][$key] = $valid_status;
        }
        foreach($result['field'] as $key => $item){
            if($item['error']){
                $result['error'] = true;
                $result['status'] = 'valid error';
                break;
            }
        }
        if(!isset($result['error'])){
            $result['error'] = false;
            $result['status'] = 'success';
        }
 /*       echo '<pre>';
        var_dump($result);
        echo '</pre>';*/
        return $result;
    }
