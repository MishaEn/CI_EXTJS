<?php
    require_once ROOTMODELS.'/model_access_controll.php';


    function check_user_access($user_id, $action_name, $functionality_name){
        $action_id = get_action_id_by_action_name($action_name);
        $functionality_id = get_functionality_id_by_functionality_name($functionality_name);
        if(!$action_id['error'] and !$functionality_id['error']){
            $action_functionality_id = get_action_functionality_id($action_id['data']['id'], $functionality_id['data']['id']);
            if(!$action_functionality_id['error']){
                $user_access = check_user_action_on_functionality($user_id, $action_functionality_id['data']['id']);
                if($user_access['error']){
                    $response = ['error' => true, 'status' => 'access denied'];
                }
                else{
                    $response = ['error' => false, 'status' => 'access allowed'];
                }
            }
            else{
                $response = ['error' => true, 'status' => 'access denied'];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'access denied'];
        }
        return $response;
    }
    function check_attribute_access($user_id, $attribute_name, $attribute_value){
        $user_attribute_status = get_user_attribute($user_id, $attribute_name);
        $user_attribute = $user_attribute_status['data'][$attribute_name];
        if($user_attribute_status['error']){
            $response = ['error' => true, 'status' => 'access denied'];
        }
        else{
            if($user_attribute == $attribute_value){
                $response = ['error' => false, 'status' => 'access allowed'];
            }
            else{
                $response = ['error' => true, 'status' => 'access denied'];
            }

        }
        return $response;
    }
    function check_role_access($user_id, $role_name, $action_name, $functionality_name){
        $action_id = get_action_id_by_action_name($action_name);
        $functionality_id = get_functionality_id_by_functionality_name($functionality_name);
        if(!$action_id['error'] and !$functionality_id['error']){
            $action_functionality_id = get_action_functionality_id($action_id['data']['id'], $functionality_id['data']['id']);
            if(!$action_functionality_id['error']){
                $user_role = get_user_id_by_role_name($user_id, $role_name);
                $role_id = get_role_id_by_role_name($role_name);
                if(!$user_role['error']){
                    if($user_role['data']['id']==$user_id){
                        if($role_id['error']){
                            $response = ['error' => true, 'status' => 'access denied'];
                        }
                        else{
                            $role_access = check_role_action_on_functionality($role_id['data']['id'], $action_functionality_id['data']['id']);
                            if($role_access['error']){
                                $response = ['error' => true, 'status' => 'access denied'];
                            }
                            else{
                                $response = ['error' => false, 'status' => 'access allowed'];
                            }
                        }
                    }
                    else{
                        $response = ['error' => true, 'status' => 'access denied'];
                    }
                }
                else {
                    $response = ['error' => true, 'status' => 'access denied'];
                }
            }
            else{
                $response = ['error' => true, 'status' => 'access denied'];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'access denied'];
        }
        return $response;
    }
    function role_policy_frame(){
        $action_id = get_action_list()['data'];
        $functionality_id = get_functional_list()['data'];
        $functionality_array = [];
        $action_array = [];
        $array = [];
        foreach ($action_id as $item){
            $array[$item['action_name']] = [];
            array_push($action_array, $array);
            $array = [];
        }
        foreach ($functionality_id as $item){
            $array[$item['functional_name']] = $action_array;
            array_push($functionality_array, $array);
            $array = [];
        }
        return $functionality_array;
    }
    function parse_role_id($role_list){
        return explode(';', $role_list);
    }
/*    function get_role_policy(){
        require_once ROOTMODELS.'/model_app.php';
        $role_policy = get_role_policy_list()['data'];
        $role_policy_frame = role_policy_frame(); [];
        $action = get_action_list()['data'];
        $functionality = get_functional_list()['data'];
        $action_functionality = get_action_on_functional_list()['data'];
        foreach($role_policy as $policy){
            foreach($action_functionality as $action_function){
                if($policy['action_functionality_id'] === $action_function['id']){
                    foreach($functionality as $functionality_item){
                        if($action_function['functional_id'] === $functionality_item['id']){
                            foreach($action as $action_item){
                                if($action_function['action_id'] === $action_item['id']){
                                    $role_policy_frame[$functionality_item['functional_name']][$action_item['action_name']] = parse_role_id($policy['role_list']);
                                }
                            }

                        }

                    }
                }

            }

        }
        $_SESSION['app']['role_policy'] = $role_policy_frame;
    }*/
    function check_role_policy($functionality, $action){
        if(in_array($_SESSION['user']['role_id'], $_SESSION['role_policy'][$functionality][$action])){
            $response = ['error' => false, 'status' => 'access allowed'];
        }
        else{
            $response = ['error' => true, 'status' => 'access denied'];
        }
        return $response;
    }