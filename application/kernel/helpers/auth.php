<?php

    function salt_password($password){
        return password_hash($password,  PASSWORD_DEFAULT );
    }

    function authentication($user_login, $user_password){

    }
    function authorization($user_id){

    }

    function check_authorization(){
        $response = ['error' => true, 'status' => 'success'];
        if(isset($_COOKIE['UID']) and isset($_SESSION['user']['id'])){
            if($_COOKIE['UID'] == $_SESSION['user']['UID'] and password_verify($_COOKIE['UID'], $_SESSION['user']['key'])){
                $_SESSION['app']['logout'] = false;
                $response = ['error' => false, 'status' => 'success'];
            }
            else{
                $_SESSION['app']['logout'] = true;
                $response = ['error' => true, 'status' => 'denied'];
            }
        }
        else{
            $_SESSION['app']['logout'] = true;
            $response = ['error' => true, 'status' => 'denied'];
        }
        return $response;
    }
    function long_uid(){
        return mt_rand(100000000, 999999999);
    }
    function get_role_policy(){
        load_model_app('app');
        $role_policy = app_get_role_policy()['data'];
        $response = [];
        foreach($role_policy as $key => $item){
            $response[$item['functional_name']] = [];
        }
        foreach($response as $functional => $value){
            foreach($role_policy as $key => $item){
                $response[$functional][$item['action_name']] = [];
            }
        }
        foreach($response as $functional => $value){
            foreach($value as $action => $item){
                foreach($role_policy as $key => $index){
                    if($functional == $index['functional_name'] and $action == $index['action_name']){
                        $response[$functional][$action] = format_role_list($index['role_list']);
                    }
                }
            }
;
        }
        $_SESSION['app']['role_policy'] = $response;
        return $response;
    }
    function format_role_list($list){
        return explode(';', $list);
    }
    function check_role_policy($functionality, $action){
        if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy'][$functionality][$action])){
            $response = ['error' => false, 'status' => 'access allowed'];
        }
        else{
            $response = ['error' => true, 'status' => 'access denied'];
        }
        return $response;
    }