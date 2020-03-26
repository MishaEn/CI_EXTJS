<?php
    function get_orders($id = null){
        $pdo = get_pdo();
        if(is_null($id)){
            $stm = $pdo->prepare('SELECT u.code, nox.*
                                                FROM n_order_x nox
                                                INNER join users u on nox.n_code_ord = u.id
                                                WHERE YEAR(nox.n_date_con)=:date AND MONTH(nox.n_date_con)=:month ORDER BY nox.n_order_ne DESC LIMIT 20');
            $stm->bindValue(':date', date('Y'));
            $stm->bindValue(':month', date('m'));
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
    function get_all_order($year = null, $month = null){
        $pdo = get_pdo();

        if(!is_null($year)){
            $stm = $pdo->prepare('SELECT u.code, nox.*
                                            FROM n_order_x nox
                                            INNER join users u on nox.n_code_ord = u.id
                                            WHERE YEAR(nox.n_date_con)=:year AND MONTH(nox.n_date_con)=:month
                                            ORDER BY nox.n_order_ne DESC 
                                       ');
            $stm->bindValue(':year', $year);
            $stm->bindValue(':month', $month);
        }
        else{
            $stm = $pdo->prepare('SELECT u.code, nox.*
                                            FROM n_order_x nox
                                            INNER join users u on nox.n_code_ord = u.id
                                            WHERE YEAR(nox.n_date_con)=:year AND MONTH(nox.n_date_con)=:month
                                            ORDER BY nox.n_order_ne DESC 
                                            LIMIT 20, 999999999
                                       ');
            $stm->bindValue(':year', date('Y'));
            $stm->bindValue(':month', date('m'));
        }
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
        $sql = 'UPDATE n_order_x SET n_status=:status, updated_at = :date WHERE order_id=:id';
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':id', $id);
        $stm->bindValue(':status', $status);
        $stm->bindValue(':date',  date('Y-m-d H:i:s'));
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
        $host = 'localhost';
        $db = 'cl279370_nwdedal';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", 'cl279370_nwdedal', 'dedalhost1', [
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
            $db = 'cl279370_admpnl';
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $pdo2 = new PDO("mysql:host=$host;dbname=$db;charset=$charset", 'cl279370_admpnl', 'GzBR8KeJ', [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
            $sql = 'DELETE FROM n_order_x';
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

                        try {
                            $stm->execute();
                        }
                        catch (\PDOException $e) {
                            if ($e->errorInfo[1] == 1062) {
                                //The INSERT query failed due to a key constraint violation.
                            }
                        }
                    }
                }
            }
        }


        return ['error' => false];
    }

    function update_shipping_order($id, $date, $week){
        $pdo = get_pdo();
        $sql = 'UPDATE n_order_x SET n_week=:week, n_mount=:mount, updated_at = :date WHERE order_id=:id';
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':id', $id);
        $stm->bindValue(':mount', $date);
        $stm->bindValue(':week', $week);
        $stm->bindValue(':date',  date('Y-m-d H:i:s'));
        if($stm->execute()){
            $response = ['error' => false, 'status' => 'success'];
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function get_new_order($now, $past){
        $pdo = get_pdo();
        $sql = 'SELECT order_id FROM n_order_x WHERE created_at BETWEEN :past and :now';
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':past', $past);
        $stm->bindValue(':now', $now);
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

    function get_updated_order(){
        $pdo = get_pdo();
        $sql = 'SELECT order_id, n_status, n_week, n_mount FROM n_order_x WHERE updated_at is not null ';
        $stm = $pdo->prepare($sql);
        if($stm->execute()){
            $data = $stm->fetchAll();
            if(empty($data)){
                $response = ['error' => true, 'status' => 'fetch error'];
            }
            else{
                $response = ['error' => false, 'status' => 'success','data' => $data];
                foreach($data as $item){
                    $sql = 'UPDATE n_order_x SET updated_at = null WHERE order_id=:id';
                    $update = $pdo->prepare($sql);
                    $update->bindValue(':id', $item['order_id']);
                    $update->execute();
                }
            }
        }
        else{
            $response = ['error' => true, 'status' => 'execute error'];
        }
        return $response;
    }

    function get_new_order_by_id($list){
        $pdo = get_pdo();
        $id_list = explode(',' , $list);
        $inKeys = array_map(function($key){return ':var_'.$key;}, array_keys($id_list));
        $placeholders = str_repeat ('?, ',  count ($id_list) - 1) . '?';
        $stm = $pdo->prepare( 'SELECT u.code, nox.*
                FROM n_order_x nox
                INNER join users u on nox.n_code_ord = u.id
                WHERE nox.order_id in ('.$placeholders.')
                ORDER BY nox.n_order_ne DESC');
        if($stm->execute($id_list)){
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