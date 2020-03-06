<?php
    function action_index(){
        $policy = $_SESSION['app']['role_policy'];
        $_SESSION['app']['module_name'] = 'application';
        if($_SESSION['user']['role_id'] == 2){
            $id = $_SESSION['user']['director_id'];
        }
        else{
            $id = null;
        }
        $data = get_company($id);
        if(in_array($_SESSION['user']['role_id'], $policy['company']['read'])){
            switch($_SESSION['user']['role_id']){
                case 2:
                    submodule_loader('director_company', 'company', $data);
                    break;
                default:
                    submodule_loader('admin_company', 'company', $data);
                    break;
            }
        }
    }
    function action_add_company(){
        require_once ROOTMODELS.'/model_register.php';
        if(isset($_POST['data'])){
            $option = [
                'director_id' => ['regexp' => '/^[0-9]$/'],
                'organization_name' => ['type' => 'string', 'min_length' => '2', 'regexp' => '/^(ООО\s["][A-ZА-Я0-9].+(\s.+|)["]|ИП\s[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+)$/'],
                'director_name' => ['type' => 'string', 'min_length' => '6', 'regexp' => '/^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}$/'],
                'inn_kpp' => ['type' => 'string', 'min_length' => 12, 'max_length' => 20, 'regexp' => '/^[0-9]{12}|([0-9]{10}\/[0-9]{9})$/'],
                'ogrn' => ['type' => 'string', 'min_length' => 13, 'max_length' => 15, 'regexp' => '/^[0-9]{13,15}$/'],
                'juridical_address' => ['type' => 'string', 'min_length' => 5],
                'postal_address' => ['type' => 'string', 'min_length' => 5],
                'settlement_account' => ['type' => 'string', 'min_length' => 20, 'max_length' => 20, 'regexp' =>  '/^[0-9]{20}$/'],
                'bank_name' => ['type' => 'string', 'min_length' => 2],
                'correction_account' => ['type' => 'string', 'min_length' => 20, 'max_length' => 20, 'regexp' => '/^[0-9]{20}$/'],
                'bik' => ['type' => 'string', 'min_length' => 9, 'max_length' =>  9, 'regexp' => '/^[0-9]{9}$/'],
                'okpo' => ['type' => 'string', 'min_length' => 8, 'max_length' => 10, 'regexp' => '/^[0-9]{8,10}$/']
            ];
            $error = false;
            foreach($_POST['data'] as $key => $item) {
                $valid_status = valid_field($item, $option[$key]);
                if ($valid_status['error']) {
                    $error = true;
                    $response['error'] = true;
                    $response['status'] = 'valid error';
                    array_push($response['field'], [$key => $valid_status['status']]);
                }
            }
            if(!$error){
                $explode_inn = explode('/', $_POST['data']['inn_kpp']);
                if(count($explode_inn) == 2){
                    $inn = $explode_inn[0];
                }
                else{
                    $inn = $_POST['data']['inn_kpp'];
                }
                $error = false;
                foreach (get_inn()['data'] as $item){
                    if(explode('/', $item['inn_kpp'])[0] == $inn){
                        $error = true;
                    }
                }
                $check_ogrn = check_ogrn($_POST['data']['ogrn']);
                $check_settlement_account = check_settlement_account($_POST['data']['settlement_account']);
                if($error and $check_ogrn['error'] and $check_settlement_account['error']){
                    $response = ['error' => true, 'status' => 'all exist'];
                    echo json_encode($response);
                    exit;
                }
                else if ($error){
                    $response = ['error' => true,'status' =>  'inn exist'];
                    echo json_encode($response);
                    exit;
                }
                else if ($check_ogrn['error']){
                    $response = ['error' => true, 'status' => 'ogrn exist'];
                    echo json_encode($response);
                    exit;
                }
                else if ($check_settlement_account['error']){
                    $response = ['error' => true,'status' =>  'settlement account exist'];
                    echo json_encode($response);
                    exit;
                }
                else{
                    $add_status = add_company(null, null, $_POST['data']);
                    $get_last_id = get_last_company_id($_POST['data']['director_id']);
                    $response = ['error' => false, 'status' => 'success', 'data' => $get_last_id['data']];
                }
            }
        }
        else{
            $add_status = add_company($_POST['id'], $_POST['organization_name'], $_POST['count']);
            $valid_id = valid_field($_POST['id'], ['regexp' => '/^[0-9]$/']);
            if($valid_id['error']){
                $response = $valid_id;
            }
            else{
                if($add_status['error']){
                    $response = $add_status;
                }
                else{
                    $get_last_id = get_last_company_id($_POST['id']);
                    if($get_last_id['error']){
                        $response = $get_last_id;
                    }
                    else{
                        $response = ['error' => false, 'status' => 'success', 'data' => $get_last_id['data']];
                    }
                }
            }
        }
        echo json_encode($response);
    }
    function action_get_company_modal(){
        $company_data = get_company_by_id($_POST['id'])['data'][0];
        element_loader('company', 'company', $company_data);
    }
    function action_update_deleted_at(){
        $update_status = update_deleted_at($_POST);
        if($update_status['error']){
            $response = ['error' => true, 'status' => $update_status['status']];
        }
        else{
            $response = ['error' => false, 'status' => 'success'];
        }
        echo json_encode($response);
    }
    function action_update_blocked_at(){
        $update_status = update_blocked_at($_POST);
        if($update_status['error']){
            $response = ['error' => true, 'status' => $update_status['status']];
        }
        else{
            $response = ['error' => false, 'status' => 'success'];
        }
        echo json_encode($response);
    }
    function action_update_field(){
        $field = ['organization_name','director_name','inn_kpp','ogrn','juridical_address','postal_adress','settlement_account','bank_name','correction_account','bik', 'okpo'];
        $data = $_POST['data'];
        $id = $_POST['id'];
        $column = $field[$_POST['number']];
        $status = update_company_column($id, $data, $column);
        if($status['error']){
            $response = ['error' => true, 'status' => $status['status']];
        }
        else{
            $response = ['error' => false, 'status' => 'success'];
        }
        echo json_encode($response);
    }
    function action_check_company_status(){
        if(!isset($_POST['type'])){
            $status = get_company_status($_POST['id']);
            if($status['error']){
                $response = $status;
            }
            else{
                $response = ['error' => false, 'status' => 'success', 'data' => $status['data']];
            }
        }
        else{
            $arr=explode(',', $_POST['id']);
            $values = '';
            foreach($arr as $item){
                $values .= ':var_'.$item.',';
            }
            $status = get_company_status(substr($values, 0, -1), $_POST['id'],$_POST['type']);
            $response = $status;
        }

        echo json_encode($response);
    }

    function action_get_directors_id()
    {
        $id = get_directors_id();
        if (!$id['error']) {
            $response = $id;
        }
        echo json_encode($response);
    }
    function action_get_last_company_id(){
        $id = get_last_company_id($_POST['director_id']);
        echo json_encode($id);
    }

    function action_get_activate_company(){
        element_loader('activate_company', 'company', $_POST['id']);
    }
    function action_get_update_company(){
        $company_data = get_company_by_id($_POST['id'])['data'][0];
        element_loader('update_company', 'company', $company_data);
    }
    function action_activate_company(){
        echo json_encode(activate_company($_POST));
    }
    function action_update_company(){
        echo json_encode(update_company($_POST));
    }
    function action_delete_company(){
        echo json_encode(delete_company($_POST['id']));
    }
    function action_deactivate_company(){
        echo json_encode(update_company_column($_POST['id'], 0, 'status'));
    }
    function action_block_company(){
        echo json_encode(update_company_column($_POST['id'], 2, 'status'));
    }
    function action_unlock_company(){
        echo json_encode(update_company_column($_POST['id'], 0, 'status'));
    }
    function action_check_new_company(){
        $now = date('Y-m-d H:i:s');
        $past = date('Y-m-d H:i:s', strtotime("$now - 5 minutes"));
        $data = get_company_by_date($now, $past);
        echo json_encode($data);
    }