<?php
    function action_index(){

    }

    function action_post_order(){
        $pdo = get_pdo();
        $json = $_POST['list_item'];
        $error = [];
        $error_flag = false;
        $status = 'success';
        if(isset($json)){
            if(!empty($json)){
                if(is_string($json)){
                    foreach (json_decode($json, true) as $item){
                        if(is_string($item)){
                            $order_array =  json_decode($item, true);
                            $first = explode('.',$order_array['n_date_con']);
                            $n_con = $first[2].'-'.$first[1].'-'.$first[0];
                            $n_order_se = $order_array['n_order_se'];
                            $n_order_ne = $order_array['n_order_ne'];
                            $n_status = $order_array['n_status'];
                            $n_code_ord = $order_array['n_code_ord'];
                            $stm = $pdo->prepare('INSERT INTO `n_order_x`
                                            (`n_order_se`, `n_order_ne`, `n_date_con`, `n_status`, `n_code_ord`, `created_at`) 
                                            VALUES 
                                            (:n_order_se, :n_order_ne, :n_date_con, :n_status, :n_code_ord, :date)');
                            $stm->bindValue(':n_order_se',$n_order_se);
                            $stm->bindValue(':n_order_ne',$n_order_ne);
                            $stm->bindValue(':n_date_con',$n_con);
                            $stm->bindValue(':n_status',$n_status);
                            $stm->bindValue(':n_code_ord',$n_code_ord);
                            $stm->bindValue(':date',  date('Y-m-d'));
                            try {
                                $stm->execute();
                            }
                            catch (\PDOException $e) {
                                if ($e->errorInfo[1] == 1062) {
                                    $error_flag = true;
                                    $status = 'execute error';
                                    $error[$order_array['n_order_ne']] = ['error' => true, 'status' => 'exist'];
                                }
                                else{
                                    $error[$order_array['n_order_ne']] = ['error' => false, 'status' => 'success'];
                                }
                            }
                        }
                        else{
                            $error_flag = true;
                            $status = 'item is not json';
                            break;
                        }
                    }
                    if($error_flag){
                        switch ($status){
                            case 'execute error':
                                $response = ['error' => true, 'status' => $status, 'data' => $error_flag];
                                break;
                            case 'item not string':
                                $response = ['error' => true, 'status' => $status];
                                break;
                            default:
                                $response = ['error' => false, 'status' => 'success'];
                                break;
                        }
                    }
                    else{
                        $response = ['error' => false, 'status' => 'success'];
                    }
                }
                else{
                    $response = ['error' => true, 'status' => 'list_item is not json string'];
                }
            }
            else{
                $response = ['error' => true, 'status' => 'empty POST'];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'POST not set'];
        }
        echo json_encode($response);
    }
    function action_update_order_status(){
        $pdo = get_pdo();
        $post['list_item'] = '{"0": {"n_order_ne": 5316,"n_status": "work","n_week": 1,"n_mount": "01.01.2020"},"1": {"n_order_ne": 5315,"n_status": "confirm"}}';
        $json = $post['list_item'];
        $error = [];
        $error_flag = false;
        $status = 'success';
        if(isset($json)){
            if(!empty($json)){
                if(is_string($json)){
                    foreach (json_decode($json, true) as $item){
                        if(isset($item['n_week']) and isset($item['n_mount'])){
                            $sql = 'UPDATE n_order_x SET n_status = :status, n_week = :week, n_mount = :mount, updated_at = :date WHERE n_order_ne = :order_ne';
                            $stm = $pdo->prepare($sql);
                            $stm->bindValue(':status', $item['n_status']);
                            $stm->bindValue(':week', $item['n_week']);
                            $first = explode('.',$item['n_mount']);
                            $n_con = $first[2].'-'.$first[1].'-'.$first[0];
                            $stm->bindValue(':mount', $n_con);
                            $stm->bindValue(':date', date('Y-m-d H:i:s'));
                            $stm->bindValue(':order_ne', $item['n_order_ne']);
                        }
                        else{
                            $sql = 'UPDATE n_order_x SET n_status = :status, updated_at = :date WHERE n_order_ne = :order_ne';
                            $stm = $pdo->prepare($sql);
                            $stm->bindValue(':status', $item['n_status']);
                            $stm->bindValue(':order_ne', $item['n_order_ne']);
                            $stm->bindValue(':date',  date('Y-m-d H:i:s'));
                        }
                        if($stm->execute()){
                            $error[$item['n_order_ne']] = ['error' => false, 'status' => 'success'];
                        }
                        else{
                            $error_flag = true;
                            $status = 'execute error';
                            $error[$item['n_order_ne']] = ['error' => true, 'status' => 'execute error'];
                        }
                    }
                    if($error_flag){
                        switch ($status){
                            case 'execute error':
                                $response = ['error' => true, 'status' => $status, 'data' => $error_flag];
                                break;
                            default:
                                $response = ['error' => false, 'status' => 'success'];
                                break;
                        }

                    }
                    else{
                        $response = ['error' => false, 'status' => 'success'];
                    }
                }
                else{
                    $response = ['error' => true, 'status' => 'list_item is not json string'];
                }
            }
            else{
                $response = ['error' => true, 'status' => 'empty POST'];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'POST not set'];
        }
        echo json_encode($response);
    }


