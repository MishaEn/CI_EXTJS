<?php
    function action_index(){
        $policy = $_SESSION['app']['role_policy'];
        $_SESSION['app']['module_name'] = 'application';
        if($_SESSION['user']['role_id'] == 2){
            $id = $_SESSION['user']['director_id'];
        }
        else{
            $id = null;
        }
        $data = get_company($id);
        if(in_array($_SESSION['user']['role_id'], $policy['company']['read'])){
            switch($_SESSION['user']['role_id']){
                case 2:
                    submodule_loader('director_company', 'company', $data);
                    break;
                default:
                    submodule_loader('admin_company', 'company', $data);
                    break;
            }
        }
    }
    function action_add_company(){
        $valid_id = valid_field($_POST['id'], ['regexp' => '/^[0-9]$/']);
        if($valid_id['error']){
            $response = $valid_id;
        }
        else{
            $add_status = add_company($_POST['id'], $_POST['count']);
            if($add_status['error']){
                $response = $add_status;
            }
            else{
                $get_last_id = get_last_company_id($_POST['id']);
                if($get_last_id['error']){
                    $response = $get_last_id;
                }
                else{
                    $response = ['error' => false, 'status' => 'success', 'data' => $get_last_id['data']];
                }
            }
        }
        echo json_encode($response);
    }
    function action_update_deleted_at(){
        $update_status = update_deleted_at($_POST);
        if($update_status['error']){
            $response = ['error' => true, 'status' => $update_status['status']];
        }
        else{
            $response = ['error' => false, 'status' => 'success'];
        }
        echo json_encode($response);
    }
    function action_update_blocked_at(){
        $update_status = update_blocked_at($_POST);
        if($update_status['error']){
            $response = ['error' => true, 'status' => $update_status['status']];
        }
        else{
            $response = ['error' => false, 'status' => 'success'];
        }
        echo json_encode($response);
    }
    function action_update_field(){
        $field = ['organization_name','director_name','inn_kpp','ogrn','juridical_address','postal_adress','settlement_account','bank_name','correction_account','bik', 'okpo'];
        $data = $_POST['data'];
        $id = $_POST['id'];
        $column = $field[$_POST['number']];
        $status = update_company_column($id, $data, $column);
        if($status['error']){
            $response = ['error' => true, 'status' => $status['status']];
        }
        else{
            $response = ['error' => false, 'status' => 'success'];
        }
        echo json_encode($response);
    }
    function action_check_company_status(){
        $status = get_company_status($_POST['id']);
        if($status['error']){
            $response = $status;
        }
        else{
            $response = ['error' => false, 'status' => 'success', 'data' => $status['data']];
        }
        echo json_encode($response);
    }