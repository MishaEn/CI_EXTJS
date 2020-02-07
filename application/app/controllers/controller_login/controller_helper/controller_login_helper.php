<?php
    function check_user_login($login){
        return app_get_user_login($login);;
    }
    function get_activate_code($address){
        $ip = $_SERVER['REMOTE_ADDR'];
        $trash_code = substr(password_hash($ip.'secret'.$address, PASSWORD_DEFAULT), 10,40);
        $code = substr(preg_replace('/[^ a-zа-яё\d]/ui', '',$trash_code ), 10, 5);
        $_SESSION['app']['address'] = $address;
        $_SESSION['app']['recovery_code'] = $code;
        return $code;
    }