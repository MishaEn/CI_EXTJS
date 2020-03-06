<?php
    function get_orders($id = null){
        $pdo = get_pdo();
        if(is_null($id)){
            $stm = $pdo->prepare('SELECT u.code, nox.*
                                            FROM n_order_x nox
                                            INNER join users u on nox.n_code_ord = u.id
                                            WHERE YEAR(nox.n_date_con)=:date ORDER BY nox.n_order_ne DESC LIMIT 9');
            $stm->bindValue(':date', date('Y'));
            if($stm->execute()){
                $data = $stm->fetchAll();
                if(empty($data)){
                    $response = ['error' => true, 'status' => 'fetch error'];
                }
                else{
                    $response = ['error' => false, 'status' => 'success','data' => $data];
                }
            }
            else{
                $response = ['error' => true, 'status' => 'execute error'];
            }
        }
        else{
            $stm = $pdo->prepare('SELECT u.code, nox.*
                                            FROM n_order_x nox
                                            INNER join users u on nox.n_code_ord = u.id
                                            WHERE nox.n_code_ord = :id ORDER BY nox.n_order_ne DESC');
            $stm->bindValue(':id', $id);
            if($stm->execute()){
                $data = $stm->fetchAll();
                if(empty($data)){
                    $response = ['error' => true, 'status' => 'fetch error'];
                }
                else{
                    $response = ['error' => false, 'status' => 'success','data' => $data];
                }
            }
            else{
                $response = ['error' => true, 'status' => 'execute error'];
            }
        }
        return $response;
    }
    function get_all_order($list, $year = null){
        $pdo = get_pdo();
        $stm = $pdo->prepare('SELECT u.code, nox.*
                                        FROM n_order_x nox
                                        INNER join users u on nox.n_code_ord = u.id
                                        WHERE YEAR(nox.n_date_con)=:year AND
                                        order_id != :id_0 and 
                                        order_id != :id_1 and 
                                        order_id != :id_2 and 
                                        order_id != :id_3 and 
                                        order_id != :id_4 and 
                                        order_id != :id_5 and 
                                        order_id != :id_6 and 
                                        order_id != :id_7 and 
                                        order_id != :id_8 
                                        ORDER BY nox.n_order_ne DESC ');
        if(!is_null($year)){
            $stm->bindValue(':year', $year);
        }
        else{
            $stm->bindValue(':year', date('Y'));
        }
        $stm->bindValue(':id_0', explode(',', $list)[0]);
        $stm->bindValue(':id_1', explode(',', $list)[1]);
        $stm->bindValue(':id_2', explode(',', $list)[2]);
        $stm->bindValue(':id_3', explode(',', $list)[3]);
        $stm->bindValue(':id_4', explode(',', $list)[4]);
        $stm->bindValue(':id_5', explode(',', $list)[5]);
        $stm->bindValue(':id_6', explode(',', $list)[6]);
        $stm->bindValue(':id_7', explode(',', $list)[7]);
        $stm->bindValue(':id_8', explode(',', $list)[8]);
        if($stm->execute()){
            $data = $stm->fetchAll();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{
                $response = ['error' => false, 'status' => 'success','data' => $data];
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function get_sort_order($direction, $field, $id = null){
        if($direction == 1){
            $direction = 'ASC';
        }
        else{
            $direction = 'DESC';
        }
        $pdo = get_pdo();
        if(is_null($id)){
            $sql = 'SELECT u.code, nox.*
                    FROM n_order_x nox
                    INNER join users u on nox.n_code_ord = u.id
                    ORDER BY nox.'.$field.' '.$direction;
            $stm = $pdo->prepare($sql);
            if($stm->execute()){
                $data = $stm->fetchAll();
                if(empty($data)){
                    $response = ['error' => true, 'status' => 'fetch error'];
                }
                else{
                    $response = ['error' => false, 'status' => 'success','data' => $data];
                }
            }
            else{
                $response = ['error' => true, 'status' => 'execute error'];
            }
        }
        else{
            $sql = 'SELECT u.code, nox.*
                    FROM n_order_x nox
                    INNER join users u on nox.n_code_ord = u.id
                    WHERE nox.n_code_ord = :id
                    ORDER BY nox.'.$field.' '.$direction;
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':id', $id);
            if($stm->execute()){
                $data = $stm->fetchAll();
                if(empty($data)){
                    $response = ['error' => true, 'status' => 'fetch error'];
                }
                else{
                    $response = ['error' => false, 'status' => 'success','data' => $data];
                }
            }
            else{
                $response = ['error' => true, 'status' => 'execute error'];
            }
        }
        return $response;
    }

    function update_order_status($id, $status){
        $pdo = get_pdo();
        $sql = 'UPDATE n_order_x SET n_status=:status WHERE order_id=:id';
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':id', $id);
        $stm->bindValue(':status', $status);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function delete_order($id){
        $pdo = get_pdo();
        $sql = 'DELETE FROM n_order_x WHERE order_id=:id';
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':id', $id);
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function refresh_order(){
        $charset = 'utf8';
        $host = '';
        $db = '';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", '', '', [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
        $now = date('Y-m-d H:i:s');
        $past = date('Y-m-d H:i:s', strtotime("$now - 1 minute"));
        $sql = 'SELECT * FROM n_order_x';
        $stm = $pdo->prepare($sql);
        if($stm->execute()){
            $data =  $stm->fetchAll();
            $db = '';
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $pdo2 = new PDO("mysql:host=$host;dbname=$db;charset=$charset", '', '', [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
            $sql = 'DELETE FROM n_order_x';
            var_dump($data);
            $drop = $pdo2->prepare($sql);
            if($drop->execute()){
                foreach($data as $item){
                    if($item['n_code_ord'] !== 'NULL' and $item['n_code_ord'] !== 'null' and $item['n_code_ord'] !== null){
                        $first = explode('.',$item['n_date_con']);
                        $second = explode('.', $item['n_mount']);
                        $n_con = $first[2].'-'.$first[1].'-'.$first[0];
                        $nmount = $second[2].'-'.$second[1].'-'.$second[0];
                        $sql = 'INSERT INTO `n_order_x`(order_id, n_order_se,  `n_order_ne`, `n_date_con`, `n_status`, `n_week`, `n_mount`, `n_code_ord`, `n_other`, `created_at`)
                VALUES
                                            (:id, :oreder_se, :oreder_ne, :date_con, :status, :week, :mount, :code_ord, :other, :creadet)';
                        $stm = $pdo2->prepare($sql);
                        $stm->bindValue(':id', $item['id']);
                        $stm->bindValue(':oreder_se', $item['n_order_se']);
                        $stm->bindValue(':oreder_ne', $item['n_order_ne']);
                        $stm->bindValue(':date_con', $n_con);
                        $stm->bindValue(':status', $item['n_status']);
                        $stm->bindValue(':week', $item['n_week']);
                        $stm->bindValue(':mount',$nmount);
                        $stm->bindValue(':code_ord', $item['n_code_ord']);
                        $stm->bindValue(':other', $item['n_other']);
                        $stm->bindValue(':creadet', $item['created_at']);
                        $stm->execute();
                    }
                }
            }
        }


        return ['error' => false];
    }
