<?php
    function run($url){
        $explode_url = explode('/', $url);
        $controller_name = 'app';
        $model_name = 'app';
        $action_name = 'index';
        if($explode_url[1] == 'app' or empty($explode_url[1])){
            if(!isset($_SESSION['app']['logout'])){
                header('Location: /login');
            }
            else{
                if(check_authorization()['error']){
                    header('Location: /login');
                }
            }
        }
        if(isset($explode_url[1])){
            if(!empty($explode_url[1])){
                if($explode_url[1] !== '?_ym_debug=1'){
                    load_controller($explode_url[1]);
                    load_model($explode_url[1]);
                }
                else{
                    template_loader('test');
                }
            }
            else{
                load_controller($controller_name);
                load_model($model_name);
            }
        }
        if(!($explode_url[1] === 'server_send_event')){
            if(isset($explode_url[2])){
                if(function_exists('action_'.$explode_url[2])){
                    run_action($explode_url[2]);
                }
                else{
                    load_controller('404');
                }
            }
            else{

                run_action($action_name);
            }
        }
    }