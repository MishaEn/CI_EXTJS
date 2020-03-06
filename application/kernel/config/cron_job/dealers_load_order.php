<?php
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
    $sql = 'SELECT * FROM n_order_x WHERE created_at BETWEEN :past and :now';
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':now', $now);
    $stm->bindValue(':past', $past);
    $stm->execute();
    $data =  $stm->fetchAll();
    $db = 'cl279370_admpnl';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo2 = new PDO("mysql:host=$host;dbname=$db;charset=$charset", 'cl279370_admpnl', 'GzBR8KeJ', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
    foreach($data as $item){
        if($item['n_code_ord'] !== 'NULL' and $item['n_code_ord'] !== 'null' and $item['n_code_ord'] !== null){
            $first = explode('.',$item['n_date_con']);
            $second = explode('.', $item['n_mount']);
            $n_con = $first[2].'-'.$first[1].'-'.$first[0];
            $nmount = $second[2].'-'.$second[1].'-'.$second[0];
            $sql = 'INSERT INTO `n_order_x`( order_id, n_order_se,  `n_order_ne`, `n_date_con`, `n_status`, `n_week`, `n_mount`, `n_code_ord`, `n_other`, `created_at`)
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