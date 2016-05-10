<?php
// mysqli 面向过程方式

// step1 连接数据库
$link = mysqli_connect('localhost:3306', 'root', 'root', 'zhy') or die('mysqli connect error ' . mysqli_connect_errno() . ':' . mysqli_connect_error());

// step2 设置字符集
mysqli_set_charset($link, 'utf8');

// step3 执行sql
$sql = 'INSERT INTO user (name, age, description) VALUES ("周芷若", "20", "为情所困的女子！");';
if($res = mysqli_query($link, $sql)){
    echo 'INSERT_ID : '.mysqli_insert_id($link);
    echo '<br/>';
    echo 'AFFECT_ROWS : '.mysqli_affected_rows($link);
}else{
    echo 'insert error '.mysqli_error($link).':'.mysqli_errno($link);
}
echo '<hr color="red"/>';
$sql = 'UPDATE user SET age = age + 10 WHERE name="周芷若";';
$sql .= 'DELETE FROM user WHERE id = "20";';

$res = mysqli_multi_query($link, $sql);
var_dump($res);

// step4 关闭连接
mysqli_close($link);
