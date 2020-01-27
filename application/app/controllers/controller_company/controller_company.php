<?php
    function action_index(){
        $_SESSION['app']['module_name'] = 'application';
        if($_SESSION['user']['role_id'] == 2){
            $id = $_SESSION['user']['director_id'];
        }
        else{
            $id = null;
        }
        $data = get_company($id);
        submodule_loader('company', $data);
    }