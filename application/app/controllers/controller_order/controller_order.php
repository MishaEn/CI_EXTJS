<?php
    function action_index(){

        if($_SESSION['user']['role_id'] == 2){
            $data = get_orders($_SESSION['user']['id']);
        }
        else{
            $data = get_orders();
        }
        $_SESSION['app']['module_name'] = 'application';
        $policy = $_SESSION['app']['role_policy'];
        if(in_array($_SESSION['user']['role_id'], $policy['order']['read'])){
            switch($_SESSION['user']['role_id']){
                case 2:
                    submodule_loader('director_order', 'order', $data);
                    break;
                default:

                    submodule_loader('all_order', 'order', $data);
                    break;
            }
        }
    }


    function action_get_all_order(){
        $data = get_all_order($_POST['list'], $_POST['year']);
        if(!$data['error']){
            element_loader('order_tr', 'order', $data);
        }
    }

    function action_get_sort_order(){
        if($_SESSION['user']['role_id'] == 2){
            $data = get_sort_order($_POST['direction'], $_POST['field'], $_SESSION['user']['id']);
        }
        else{
            $data = get_sort_order($_POST['direction'], $_POST['field'], null);
        }

        element_loader('order_tr', 'order', $data);
    }
    function action_update_order_status(){
        $update_status = update_order_status($_POST['id'], $_POST['status']);
        if($update_status['error']){
            $response = $update_status;
        }
        else{
            $response = ['error' => false, 'status' => 'success'];
        }
        echo json_encode($response);
    }

    function action_delete_order(){
        $delete_status = delete_order($_POST['id']);
        if($delete_status['error']){
            $response = $delete_status;
        }
        else{
            $response = ['error' => false, 'status' => 'success'];
        }
        echo json_encode($response);
    }

    function action_refresh_order(){
        if(refresh_order()['error']){
            $response = ['error' => true];
        }
        else{
            $response = ['error' => false];
        }
        echo  json_encode($response);
    }