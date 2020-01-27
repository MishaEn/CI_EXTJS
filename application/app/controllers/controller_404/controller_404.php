<?php
    function action_index(){
        header('Location: /404/error');
    }

    function action_error(){
        template_loader('404');
    }