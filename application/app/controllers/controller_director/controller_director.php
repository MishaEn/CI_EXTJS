<?php
function action_index(){
    $data = get_director();
    if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['director']['read'])){
        submodule_loader('director', null, $data);
    }
}