<?php
try {
    $pdo = new PDO('mysql:host=localhost:3306;dbname=zhy', 'root', 'root');
    $sql = <<<EOF
        CREATE TABLE IF NOT EXISTS USERS(
            ID INTEGER AUTO_INCREMENT KEY,
            USERNAME VARCHAR(20) NOT NULL UNIQUE,
            PASSWORD CHAR(30) NOT NULL,
            EMAIL VARCHAR(30)
        )
EOF;
    $res = $pdo->exec($sql);
    var_dump($res);
    echo '<hr/>';
    $sql = 'INSERT INTO USERS (USERNAME, PASSWORD, EMAIL) VALUES ("ZYN", "'.md5('ZYN').'", "zyn@163.com");';
    $res = $pdo->exec($sql);
    echo '受影响的记录条数 ：'.$res.'<br/>';
    echo '最后插入的ID号为：'.$pdo->lastInsertId();
//    var_dump($res);
    echo '<hr/>';
} catch (PDOException $e) {
    echo $e->getMessage();
}
