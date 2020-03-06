<?php
    function action_index(){
        if($_SESSION['user']['role_id'] == 2){
            $id = $_SESSION['user']['director_id'];
            $data = get_employee($id);
        }
        else{
            $data = get_employee();
        }
        submodule_loader('employee', null, $data);
    }
    function action_add_employee(){
        $add_status = add_employee($_SESSION['user']['director_id']);
        echo json_encode(['error' => false, 'status' => 'success']) ;
    }
    function action_get_employee_row(){
        $data = get_last_employee_row($_SESSION['user']['director_id']);
        element_loader('row', $data);
    }

    function action_check_employee_status(){
        $arr=explode(',', $_POST['id']);
        $values = '';
        foreach($arr as $item){
            $values .= ':var_'.$item.',';
        }
        $status = get_employee_status(trim($values, ','), explode(',', $_POST['id']));
        if($status['error']){
            $response = $status;
        }
        else{
            $response = ['error' => false, 'status' => 'success', 'data' => $status['data']];
        }
        echo json_encode($response);
    }