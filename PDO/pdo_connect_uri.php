<?php
try{
    $dsn = 'uri:file://E:\ZHY\php\study\demo\PDO\dsn.txt';
    $username = 'root';
    $password = 'root';
    $pdo = new pdo($dsn, $username, $password);
    print_r($pdo);
}catch (PDOException $e){
    echo $e->getMessage();
}