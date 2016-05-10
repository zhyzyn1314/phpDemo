<?php
try{
    $dsn = "mysql:host=localhost:3306;dbname=zhy";
    $username = 'root';
    $password = 'root';
    $pdo = new pdo($dsn, $username, $password);
    print_r($pdo);
}catch (PDOException $e){
    echo $e->getMessage();
}