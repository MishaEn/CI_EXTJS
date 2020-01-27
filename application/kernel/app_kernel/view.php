<?php
    define('TEMPLATE_ROOT', ROOTVIEWS.'/template_');
    function template_loader($template_name, $data = null){
        if(file_exists(TEMPLATE_ROOT.$template_name.'/template_'.$template_name.'.php')){
            $_SESSION['app']['template_name'] = $template_name;
            include_once TEMPLATE_ROOT.$template_name.'/template_'.$template_name.'.php';

        }
        else{
            return;
        }

    }
    function module_loader($module_name, $data = null){
        if(file_exists(TEMPLATE_ROOT.$_SESSION['app']['template_name'].'/module_'.$module_name.'/module_'.$module_name.'.php')){
            $_SESSION['app']['module_name'] = $module_name;
            include_once TEMPLATE_ROOT.$_SESSION['app']['template_name'].'/module_'.$module_name.'/module_'.$module_name.'.php';
        }
        else{
            return;
        }
    }


    function submodule_loader($submodule_name, $data = null){
        if(file_exists(TEMPLATE_ROOT.$_SESSION['app']['template_name'].'/module_'.$_SESSION['app']['module_name'].'/submodule_'.$submodule_name.'/submodule_'.$submodule_name.'.php')){
            $_SESSION['app']['submodule_name'] = $submodule_name;
            include TEMPLATE_ROOT.$_SESSION['app']['template_name'].'/module_'.$_SESSION['app']['module_name'].'/submodule_'.$submodule_name.'/submodule_'.$submodule_name.'.php';
        }
        else{
            return;
        }
    }
    function element_loader($element_name, $data = null){
        if(file_exists(TEMPLATE_ROOT.$_SESSION['app']['template_name'].'/module_'.$_SESSION['app']['module_name'].'/submodule_'.$_SESSION['app']['submodule_name'].'/element_'.$element_name.'/element_'.$element_name.'.php')){
            include_once TEMPLATE_ROOT.$_SESSION['app']['template_name'].'/module_'.$_SESSION['app']['module_name'].'/submodule_'.$_SESSION['app']['submodule_name'].'/element_'.$element_name.'/element_'.$element_name.'.php';
        }
        else{
            return;
        }
    }
    function modal_loader($modal_name, $data = null){
        if(file_exists(ROOTVIEWS.'/modal_view/modal_'.$modal_name.'.php')){
            include_once ROOTVIEWS.'/modal_view/modal_'.$modal_name.'.php';
        }
        else{
            return;
        }
    }
