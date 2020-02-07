<?php
function action_index(){
    if($_SESSION['user']['role_id'] == 2){
        $data = get_orders($_SESSION['user']['id']);
    }
    else{
        $data = get_orders();
    }
    submodule_loader('order', null, $data);
}