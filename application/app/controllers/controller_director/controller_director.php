<?php
    function action_index(){
        $data = get_director();
        if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['director']['read'])){
            submodule_loader('director', null, $data);
        }
    }
    function action_get_director_modal(){
        $director_data = get_director($_POST['id'])['data'];
        $data = ['director' => $director_data];
        $company_data = get_company_by_director_id($director_data['id']);
        if(!$company_data['error']){
            $data['company'] = $company_data['data'];
        }
        element_loader('director', 'director', $data);
    }
    function action_get_director_by_user_id_modal(){
        $director_data = get_director_by_user_id($_POST['id'])['data'];
        $data = ['director' => $director_data];
        $company_data = get_company_by_director_id($director_data['id']);
        if(!$company_data['error']){
            $data['company'] = $company_data['data'];
        }
        element_loader('director', 'director', $data);
    }

    function action_get_activate_director(){
        element_loader('activate_director', 'director', $_POST['id']);
    }
    function action_get_update_director(){
        $data = get_director($_POST['id']);
        element_loader('update_director', 'director', $data['data']);
    }
    function action_activate_director(){
        echo json_encode(activate_director($_POST));
    }
    function action_deactivate_director(){
        echo json_encode(deactivate_director($_POST['id']));
    }
    function action_block_director(){
        echo json_encode(block_director($_POST['id']));
    }
    function action_unlock_director(){
        echo json_encode(unlock_director($_POST['id']));
    }
    function action_delete_director(){
        echo json_encode(delete_director($_POST['id']));
    }
    function action_add_director(){
        $check_email = get_director_id_by_email($_POST['email']);
        $check_login = get_director_id_by_login($_POST['login']);
        if($check_login['error'] and $check_email['error']){
            $add_status = add_user($_POST);
            if($add_status['error']){
                $response = $add_status;
            }
            else{
                $response = ['error' => false, 'status' => 'success', 'user_id' => get_user_id_by_login($_POST['login'])['data']['id'], 'director_id' => get_director_id_by_login($_POST['login'])['data']['id']];
            }

        }
        elseif(!$check_login['error'] and !$check_email['error']){
            $response = ['error' => true, 'status' => 'login and email exist'];
        }
        elseif(!$check_email['error'] or !$check_login['error']){
            if(!$check_email['error']){
               $response = ['error' => true, 'status' => 'email exist'];
            }
            if(!$check_login['error']){
                $response = ['error' => true, 'status' => 'login exist'];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'unexpected error'];
        }
        echo json_encode($response);
    }
    function action_update_director(){
        $update_status = update_director($_POST['id'], $_POST['data']);
        if($update_status['error']){
            $response = $update_status;
        }
        else{
            $response = ['error' => false, 'status' => 'success'];
        }
        echo json_encode($response);
    }

    function action_get_sort_director(){
        $data = get_sort_director($_POST['direction'], $_POST['field']);
        element_loader('director_tr', 'director', $data['data']);
    }