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

    $sql = "SELECT order_id FROM n_order_x WHERE n_mount='0000-00-00'";

    $new_stm = $new_dealers->prepare($sql);
    $new_stm->execute();
    foreach($new_stm->fetchAll() as $item){
        $second = explode('.', $item['n_mount']);
        $nmount = $second[2].'-'.$second[1].'-'.$second[0];
        $sql = "SELECT n_week, n_mount FROM n_order_x WHERE id=:id";
        $old_stm = $old_dealers->prepare($sql);
        $old_stm->bindValue(':id', $item['order_id']);
        $old_stm->execute();
        $data = $old_stm->fetch();
        if(!empty($data['n_mount']) and !empty($data['n_week'])){
            $sql = "UPDATE n_order_x SET n_status='work', n_week=:n_week, n_mount=:n_mount  WHERE order_id=:id";
            $new_stm = $new_dealers->prepare($sql);
            $new_stm->bindValue(':id', $item['order_id']);
            $new_stm->bindValue(':n_mount', $nmount);
            $new_stm->bindValue(':n_week', $data['n_week']);
            $new_stm->execute();
        }
    }
