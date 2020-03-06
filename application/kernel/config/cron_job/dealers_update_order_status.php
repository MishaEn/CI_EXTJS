<?php
    $charset = 'utf8';
    $host = 'localhost';
    $db = 'cl279370_nwdedal';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $old_dealers = new PDO("mysql:host=$host;dbname=$db;charset=$charset", 'cl279370_nwdedal', 'dedalhost1', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
    $db = 'cl279370_admpnl';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $new_dealers = new PDO("mysql:host=$host;dbname=$db;charset=$charset", 'cl279370_admpnl', 'GzBR8KeJ', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);

    $sql = "SELECT id, n_status FROM n_order_x WHERE n_status != 'work' and n_status !='default' ";
    $old_stm = $old_dealers->prepare($sql);
    $old_stm->execute();
    $old = $old_stm->fetchAll();
    foreach($old as $item){
        $sql = "SELECT n_status FROM n_order_x WHERE order_id=:id";
        $new_stm = $new_dealers->prepare($sql);
        $new_stm->bindValue(':id', $item['id']);
        $new_stm->execute();
        $data = $new_stm->fetch();
        if($data['n_status'] !== $item['n_status']){
            $sql = "UPDATE n_order_x SET n_status = :status WHERE order_id=:id";
            $new_stm = $new_dealers->prepare($sql);
            $new_stm->bindValue(':status', $item['n_status']);
            $new_stm->bindValue(':id', $item['id']);
            $new_stm->execute();
        }
    }