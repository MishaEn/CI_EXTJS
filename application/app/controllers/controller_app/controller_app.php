<?php
    function action_index(){
        //pretty_print($_SESSION);
        $user_data = get_user_data($_SESSION['user']['id']);
        $_SESSION['app']['template_name'] = 'application';
        template_loader('application', ['user' => $user_data]);
    }
    function action_post_json(){
        echo json_encode(['error' => false, 'status' => 'success']);
    }