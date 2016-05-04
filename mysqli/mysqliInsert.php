<?php
header('content-type:text/html;charset=utf-8');
$mysqli = @new mysqli('localhost:3306', 'root', 'root', 'zhy');
if($mysqli->connect_errno){
    die("MYSQL CONNECT ERROR:".$mysqli->connect_error);
}
$mysqli->set_charset('utf8');

/**************************************
 * 增
 * query:执行单条SQL语句,只能执行一条SQL语句
 * affected_rows值为3种：
 * 1.受影响的记录条数
 * 2.-1,代表SQL语句有问题
 * 3.0，代表没有受影响记录的条数
 **************************************/
$insertSql = 'INSERT INTO USER (name, age, description) VALUES ("赵2狗","25","马上要删掉你")';

$res = $mysqli->query($insertSql);
if($res){
    echo '有'.$mysqli->affected_rows.'条记录受影响';
}else{
    die("MYSQL QUERY ERROR:".$mysqli->errno.":".$mysqli->error);
}

echo '<hr color="red"/>';
/******************************
 * 删
 ******************************/
$deleteSql = 'DELETE FROM user WHERE name="赵2狗"';
$res = $mysqli->query($deleteSql);
if($res){
    echo '有'.$mysqli->affected_rows.'条记录受影响';
}else{
    die("MYSQL QUERY ERROR:".$mysqli->errno.":".$mysqli->error);
}

echo '<hr color="red"/>';
/******************************
 * 改
 ******************************/
$updateSql = 'UPDATE user SET age=age+5';
$res = $mysqli->query($updateSql);
if($res){
    echo '有'.$mysqli->affected_rows.'条记录受影响';
}else{
    die("MYSQL QUERY ERROR:".$mysqli->errno.":".$mysqli->error);
}
$mysqli->close();




