<?php
    function action_index(){
        template_loader('register');
    }
    function action_add_user(){
        $error = false;
        $response = ['error' => false, 'status' => 'success'];
        $option = [
            'full_name' => ['min_length' => 5, 'regexp' =>  '/^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}$/'],
            'email' => ['min_length' => 6, 'max_length' => 254, 'regexp' =>  '/^([a-z0-9_\.-]+\@[\da-z\.-]+\.[a-z\.]{2,6})$/'],
            'login' => ['min_length' => 3, 'max_length' => 32, 'regexp' =>  '/^([a-z]|[A-Z][a-z]|[A-Z])+([-_]?[a-z0-9]+){0,2}$/'],
            'password' => ['min_length' => 6, 'max_length' => 32, 'regexp' =>  '/^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}$/'],

        ];
        foreach($_POST as $key => $item) {
            $valid_status = valid_field($item, $option[$key]);
            if ($valid_status['error']) {
                $error = true;
                $response['error'] = true;
                $response['status'] = 'valid error';
                array_push($response['field'], [$key => $valid_status['status']]);
            }
        }
        if(!$error){
            $check_login = check_login($_POST['login']);
            $check_email = check_email($_POST['email']);
            if($check_email['error'] and $check_login['error']){
                $response = ['error' => true, 'status' => 'email exist'];
            }
            else if($check_email['error']){
                $response = ['error' => true, 'status' => 'login exist'];
            }
            else if($check_login['error']) {
                $response = ['error' => true, 'status' => 'login and email exist'];
            }
            else{
                /*$add_status = add_user($_POST);*/
            }

        }
        echo json_encode($response);
    }