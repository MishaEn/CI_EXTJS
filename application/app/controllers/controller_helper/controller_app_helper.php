<?php
    function valid_login_form($login, $password){
        $valid_status_login = valid_field($login);
        $valid_status_password = valid_field($password);
        if($valid_status_login['error'] and $valid_status_password['error']){
            $response = ['error' => true, 'status' => 'valid fail', 'field' => ['login' => $valid_status_login['status'], 'password' => $valid_status_password['status']]];
        }
        elseif($valid_status_login['error']){
            $response = ['error' => true, 'status' => 'valid fail', 'field' => ['login' => $valid_status_login['status']]];
        }
        elseif($valid_status_password['error']){
            $response = ['error' => true, 'status' => 'valid fail', 'field' => ['password' => $valid_status_password['status']]];
        }
        else{
            $response = ['error' => false, 'status' => 'success'];
        }
        return $response;
    }
    function check_user_exist($login){
        $user_array = get_user_id_by_user_login($login);
        if($user_array['error']){
            switch($user_array['status']){
                case 'fetch error':
                    $response = ['error' => true, 'status' => 'user does not exist'];
                    break;
                case 'execute error':
                    $response = ['error' => true, 'status' => 'unexpected error'];
                    break;
                default:
                    $response = ['error' => true, 'status' => 'something wrong'];
                    break;
            }
        }
        else{
            $response = ['error' => false, 'status' => 'success'];
        }
        return $response;
    }
    function check_user_password($login, $password){
        //$response = ['error' => true, 'status' => 'access guard'];
        $user_id = get_user_id_by_user_login($login);
        if($user_id['error']){
            $response = ['error' => true, 'status' => 'user does not exist'];
            return $response;
        }
        else{
            $salt_password = get_user_password_by_user_id($user_id['data']['id']);
            if(is_null($salt_password['data']['password'])){
                $salt_password['data']['password'] = password_hash($password,  PASSWORD_DEFAULT );
                update_user_password($user_id['data']['id'], $salt_password['data']['password']);
            }
        }
        if($salt_password['error']){
            switch($salt_password['status']){
                case 'fetch error':
                    $response = ['error' => true, 'status' => 'user does not exist'];
                    break;
                case 'execute error':
                    $response = ['error' => true, 'status' => 'unexpected error'];
                    break;
                default:
                    $response = ['error' => true, 'status' => 'something wrong'];
                    break;
            }
        }
        else{
            if(password_verify($password, $salt_password['data']['password'])){
                return $response = ['error' => false, 'status' => 'success'];
            }
            else{
                $response = ['error' => true, 'status' => 'wrong login or password'];
            }
        }
        return $response;
    }

