<?php

    function load_controller($controller_name){
        if(file_exists(ROOTCONTROLLERS.'/controller_'.$controller_name.'/controller_'.$controller_name.'.php')){
            if(file_exists(ROOTCONTROLLERS.'/controller_'.$controller_name.'/controller_helper/'.'/controller_'.$controller_name.'_helper.php')){
                require_once ROOTCONTROLLERS.'/controller_'.$controller_name.'/controller_helper/'.'/controller_'.$controller_name.'_helper.php';
            }
            require_once ROOTCONTROLLERS.'/controller_'.$controller_name.'/controller_'.$controller_name.'.php';
        }
        else{
            require_once ROOTCONTROLLERS.'/controller_404/controller_404.php';
        }
    }

    function run_action($action_name){
        $action_name = 'action_'.$action_name;
        if(function_exists($action_name)){
            $action_name();
        }
    }