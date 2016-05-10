<?php
try{
    $dsn = 'zhydsn';
    $username = 'root';
    $password = 'root';
    $pdo = new pdo($dsn, $username, $password);
    print_r($pdo);
}catch (PDOException $e){
    echo $e->getMessage();
}