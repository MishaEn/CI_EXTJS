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