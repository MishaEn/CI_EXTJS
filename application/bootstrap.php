<?php
    require_once ROOTKERNEL.'/kernel.php';
    build_kernel();
    run($_SERVER['REQUEST_URI']);
