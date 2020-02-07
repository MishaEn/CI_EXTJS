<?php

    /*TODO:Сборка ядра*/
    function build_kernel(){
        session_start();
        build_app_kernel();
        init_config();
        build_kernel_helpers();
    }
    /*TODO:Сборка основного ядра*/
    function build_app_kernel(){
        require_once ROOTKERNEL . '/app_kernel/controller.php';
        require_once ROOTKERNEL . '/app_kernel/model.php';
        require_once ROOTKERNEL . '/app_kernel/view.php';
    }
     /*TODO:Инициаизация конфигурации*/
    function init_config(){
        require_once ROOTKERNEL.'/config/router.php';
        require_once ROOTKERNEL.'/config/PDO.php';
    }
    /*TODO:Сборка помошников*/
    function build_kernel_helpers(){
        require_once ROOTKERNEL.'/helpers/config.php';
        require_once ROOTKERNEL.'/helpers/auth.php';
        require_once ROOTKERNEL.'/helpers/validation.php';
    }
