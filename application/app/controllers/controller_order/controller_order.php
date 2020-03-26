<?php
    function action_index(){
        $conn = connect_ftp();
        $code = 'АМО';
        $id = '258';
        $folder_name = $code.'_'.$id;
        $folder = '/LK/users';
        $contents = ftp_nlist($conn['connection'], $folder.'/'.$folder_name);
        if(empty($contents)){
            ftp_mkdir($conn['connection'],$folder.'/'.$folder_name);
        }
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
        if(!empty($_POST)){
            $data = get_all_order($_POST['year'], $_POST['month']);
        }
        else{
            $data = get_all_order();
        }
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

    function action_update_shipping_order(){
        $id = $_POST['id'];
        $date = $_POST['date'];
        $week = $_POST['week'];
        $update_status = update_shipping_order($id, $date, $week);
        if($update_status){
            $response = $update_status;
        }
        else{
            $response = ['error' => false, 'status' => 'success'];
        }
        echo json_encode($response);
    }
    function action_update_table(){
        $now = date('Y-m-d H:i:s');
        $past = date('Y-m-d H:i:s', strtotime("$now - 1 minute"));
        $new_order = get_new_order($now, $past);
        $update_order = get_updated_order();
        if($new_order['error']){
            $response = ['error' => false, 'status' => 'new order error', 'data' => ['new_order' => $new_order]];
        }
        else{
            $response = ['error' => false, 'status' => 'new order success', 'data' => ['new_order' => $new_order['data']]];
        }
        if($update_order['error']){
            $response['status'] .= ' and update order error';
            $response['data']['update_order'] = $update_order;
        }
        else{
            $response['status'] .= ' and update order success';
            $response['data']['update_order'] = $update_order['data'];
        }
        echo json_encode($response);
    }
    function action_get_new_order(){
        $new_order = get_new_order_by_id($_POST['list']);
        if(!$new_order['error']){
            element_loader('order_tr', 'order', $new_order);
        }
    }