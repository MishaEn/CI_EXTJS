<?php
    function action_index(){
        template_loader('login');
    }


    function action_authentication(){
        load_model_app('app');
        $valid_login = valid_field($_POST['login'], []);
        $valid_password = valid_field($_POST['password'], []);
        if($valid_login['error']  or $valid_password['error']){
            $response = ['error' => true, 'login' => $valid_login, 'password' => $valid_password];
        }
        else{
            if(check_user_login($_POST['login'])['error']){
                $response = ['error' => true, 'status' => 'user exist error'];
            }
            else{
                $password = app_get_user_password($_POST['login']);
                if(is_null($password['data'])){
                    $password['data'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
                    update_user_password($password['data'], $_POST['login']);
                }
                $verify_status = password_verify($_POST['password'], $password['data']);
                if($verify_status){
                    $user_id = app_get_user_id($_POST['login']);
                    if($user_id['error']){
                        $response = ['error' => true, 'user or password error'];
                    }
                    else{

                        $_SESSION['app']['logout'] = false;
                        $_SESSION['user']['id'] = $user_id['data'];
                        $_SESSION['user']['role_id'] = app_get_role_id($user_id['data'])['data'];
                        $_SESSION['user']['director_id'] = get_director_id($_SESSION['user']['id'])['data'];
                        $_SESSION['user']['salt'] = long_uid();
                        $_SESSION['user']['UID'] = password_hash($_SESSION['user']['id'].$_SESSION['user']['salt'], PASSWORD_DEFAULT);
                        $_SESSION['user']['key'] = password_hash($_SESSION['user']['UID'], PASSWORD_DEFAULT);
                        setcookie('UID',  $_SESSION['user']['UID'],  time()+60*60*24*30, '/', 'dedal-service.ru', false, true);
                        $response = ['error' => false, 'status' => 'success'];
                    }
                }
                else{
                    $response = ['error' => true, 'user or password error'];
                }

            }
        }
        get_role_policy();
        echo  json_encode($response);
    }
    function action_logout(){
        $_SESSION['app']['logout'] = true;
        unset($_SESSION['user']);
        setcookie('UID', '',-1);
        echo json_encode(['error' => false]);
    }