<?php
header('content-type:text/html;charset=utf-8');
try {
    $pdo = new PDO('mysql:host=localhost:3306;dbname=zhy', 'root', 'root');
    $sql = 'UPDATE USERS SET USERNAME = "ZHY3" WHERE ID=1';
    $res = $pdo->exec($sql);
    echo $res.'条记录被影响';
} catch (PDOException $e) {
    echo $e->getMessage();
}
