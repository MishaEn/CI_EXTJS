<?php
    /*TODO:Подключение ядра*/
    require_once ROOTKERNEL.'/kernel.php';
    /*TODO:Сборка ядра*/
    build_kernel();
    /*TODO:Запуск приложения*/
    run($_SERVER['REQUEST_URI']);
