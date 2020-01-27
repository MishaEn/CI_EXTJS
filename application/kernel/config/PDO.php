<?php
    function pdo_connect($host, $db){
        $charset = 'utf8';
        return  "mysql:host=$host;dbname=$db;charset=$charset";

    }
    function get_pdo(){
        $user = 'cl279370_admpnl';
        $pass = 'GzBR8KeJ';
        $dsn = pdo_connect( 'bitrix312.timeweb.ru', 'cl279370_admpnl');
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        return $pdo = new PDO($dsn, $user, $pass, $opt);
    }
