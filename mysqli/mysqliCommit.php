<?php
header('content-type:text/html;charset=utf-8');
$mysqli = @new mysqli('localhost:3306', 'root', 'root', 'zhy');
if ($mysqli->connect_errno) {
    echo 'mysqli connect error : ' . $mysqli->connect_error;
}
$mysqli->set_charset('utf8');

$mysqli->autocommit(FALSE);

$sql_add = 'update account set money = money + 100 WHERE username = "user1"';
$sql_reduce = 'update account set money = money - 100 WHERE username = "user2"';

$res_add = $mysqli->query($sql_add);
$rows_add = $mysqli->affected_rows;
$res_reduce = $mysqli->query($sql_reduce);
$rows_reduce = $mysqli->affected_rows;

if($res_add && $res_reduce && $rows_add>0 && $rows_reduce>0){
    $mysqli->commit();
    echo '转账成功<br/>';
    $mysqli->autocommit(TRUE);
}else{
    $mysqli->rollback();
    echo '转账失败<br/>';
}

$mysqli->close();

