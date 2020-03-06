<?php
    function action_index(){
        template_loader('register');
    }
    function action_full_registration(){
        $error = false;
        $response = ['error' => false, 'status' => 'success'];
        $option = [
            'full_name' => ['min_length' => 5, 'regexp' =>  '/^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}|([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}$/'],
            'email' => ['min_length' => 6, 'max_length' => 254, 'regexp' =>  '/^([a-z0-9_\.-]+\@[\da-z\.-]+\.[a-z\.]{2,6})$/'],
            'login' => ['min_length' => 3, 'max_length' => 32, 'regexp' =>  '/^([a-z]|[A-Z][a-z]|[A-Z])+([-_]?[a-z0-9]+){0,2}$/'],
            'password' => ['min_length' => 6, 'max_length' => 32, 'regexp' =>  '/^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}$/'],
            'organization_name' => ['type' => 'string', 'min_length' => '2', 'regexp' => '/^(ООО\s["][A-ZА-Я0-9].+(\s.+|)["]|ИП\s[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+)$/'],
            'director_name' => ['type' => 'string', 'min_length' => '6', 'regexp' => '/^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}$/'],
            'inn_kpp' => ['type' => 'string', 'min_length' => 12, 'max_length' => 20, 'regexp' => '/^[0-9]{12}|([0-9]{10}\/[0-9]{9})$/'],
            'ogrn' => ['type' => 'string', 'min_length' => 13, 'max_length' => 15, 'regexp' => '/^[0-9]{13,15}$/'],
            'juridical_address' => ['type' => 'string', 'min_length' => 5],
            'postal_address' => ['type' => 'string', 'min_length' => 5],
            'settlement_account' => ['type' => 'string', 'min_length' => 20, 'max_length' => 20, 'regexp' =>  '/^[0-9]{20}$/'],
            'bank_name' => ['type' => 'string', 'min_length' => 2],
            'correction_account' => ['type' => 'string', 'min_length' => 20, 'max_length' => 20, 'regexp' => '/^[0-9]{20}$/'],
            'bik' => ['type' => 'string', 'min_length' => 9, 'max_length' =>  9, 'regexp' => '/^[0-9]{9}$/'],
            'okpo' => ['type' => 'string', 'min_length' => 8, 'max_length' => 10, 'regexp' => '/^[0-9]{8,10}$/'],
            'shop_name' => ['type' => 'string', 'min_length' => 3],
            'director_email' => ['type' => 'string', 'min_length' => 6, 'max_length' => 254, 'regexp' => '/^([A-Za-z0-9_\.-]+\@[\dA-Za-z\.-]+\.[A-Za-z\.]{2,6})$/'],
            'director_phone' => ['type' => 'string', 'min_length' => 11, 'max_length' => 12, 'regexp' => '/^([+][7]|[7]|[8])[0-9]{10}$/'],
            'shop_address' => ['type' => 'string', 'min_length' => 3],
            'work_time' => ['type' => 'string', 'min_length' => 5],
            'shop_email' => ['type' => 'string', 'min_length' => '6', 'max_length' => 254, 'regexp' => '/^([A-Za-z0-9_\.-]+\@[\dA-Za-z\.-]+\.[A-Za-z\.]{2,6})$/'],
            'shop_phone' => ['type' => 'string', 'min_length' => 11, 'max_length' => 12, 'regexp' => '/^([+][7]|[7]|[8])[0-9]{10}$/']
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
            $explode_inn = explode('/', $_POST['inn_kpp']);
            if(count($explode_inn) == 2){
                $inn = $explode_inn[0];
            }
            else{
                $inn = $_POST['inn_kpp'];
            }
            $error = false;
            foreach (get_inn()['data'] as $item){
                if(explode('/', $item['inn_kpp'])[0] == $inn){
                    $error = true;
                }
            }
            $check_ogrn = check_ogrn($_POST['ogrn']);
            $check_settlement_account = check_settlement_account($_POST['settlement_account']);
            if($error and $check_ogrn['error'] and $check_settlement_account['error']){
                $response = ['error' => true, 'status' => 'all exist'];
                echo json_encode($response);
                exit;
            }
            else if ($error){
                $response = ['error' => true,'status' =>  'inn exist'];
                echo json_encode($response);
                exit;
            }
            else if ($check_ogrn['error']){
                $response = ['error' => true, 'status' => 'ogrn exist'];
                echo json_encode($response);
                exit;
            }
            else if ($check_settlement_account['error']){
                $response = ['error' => true,'status' =>  'settlement account exist'];
                echo json_encode($response);
                exit;
            }
            else{
                $check_login = check_login($_POST['login']);
                $check_email = check_email($_POST['email']);
                if($check_email['error'] and $check_login['error']){
                    $response = ['error' => true, 'status' => 'login and email exist'];
                    echo json_encode($response);
                    exit;
                }
                else if($check_email['error']){
                    $response = ['error' => true, 'status' => 'email exist'];
                    echo json_encode($response);
                    exit;
                }
                else if($check_login['error']) {
                    $response = ['error' => true, 'status' => 'login exist'];
                    echo json_encode($response);
                    exit;
                }
                else{
                    $add_status = add_user($_POST);
                    if($add_status['error']){
                        $response = ['error' => true, $add_status['status']];
                        echo json_encode($response);
                        exit;
                    }
                    else{
                        $add_company = register_add_company(register_get_director_id(register_get_user_id($_POST['login'])['data']), $_POST);
                        if($add_company['error']){
                            $response = $add_company;
                            echo json_encode($response);
                            exit;
                        }
                        else{
                            $add_shop = add_shop(register_get_director_id(register_get_user_id($_POST['login'])['data']), $_POST);
                            if($add_shop['error']){
                                $response = $add_shop;
                                echo json_encode($response);
                                exit;
                            }
                        }
                    }
                }
            }
        }
        echo json_encode($response);
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
                $response = ['error' => true, 'status' => 'login and email exist'];
            }
            else if($check_email['error']){
                $response = ['error' => true, 'status' => 'email exist'];
            }
            else if($check_login['error']) {
                $response = ['error' => true, 'status' => 'login exist'];
            }
            else{
                $add_status = add_user($_POST);

            }

        }
        echo json_encode($response);
    }
