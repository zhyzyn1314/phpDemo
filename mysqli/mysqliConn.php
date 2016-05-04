<?php
header('content-type:text/html;charset=utf-8');
/***********************************
 * 方式一                           *
 ***********************************/
//$mysqli = new mysqli("localhost:3306", "root", "root");
//$mysqli->select_db("zhy");
//print_r($mysqli);

/***********************************
 * 方式二                           *
 ***********************************/
//$mysqli = new mysqli("localhost:3306", "root", "root", "zhy");
//print_r($mysqli);

/***********************************
 * 方式三                           *
 ***********************************/
//$mysqli = new mysqli();
//$mysqli->connect("localhost:3306", "root", "root", "zhy");

/********************************************
 * 方式四 打印错误信息
 * $mysqli->connect_errno:得到连接产生的错误编号
 * $mysqli->connect_error:得到连接产生的错误信息
 ********************************************/
$mysqli = @new mysqli("localhost:3306", "root", "root", "zhy");
if ($mysqli->connect_errno) {
    die('Connect Error:' . $mysqli->connect_error);
}
/***********************************
 * 设置默认的客户端编码方式utf8
 ***********************************/
$mysqli->set_charset("utf8");

/*******************************************************************************
 * 执行SQL查询
 *
 * SELECT/DESC/DESCRIBE/SHOW/EXPLAIN执行成功返回mysqli_result对象，执行失败返回false
 * 对于其它SQL语句的执行，执行成功返回true，否则返回false（如create、update、insert）
 *******************************************************************************/
$sql = <<<EOF
    CREATE TABLE IF NOT EXISTS mysqli(
        id TINYINT UNSIGNED AUTO_INCREMENT KEY,
        username VARCHAR(20) NOT NULL
    );
EOF;
$res = $mysqli->query($sql);
var_dump($res);

/***********************************
 * 关闭数据库
 ***********************************/
$mysqli->close();

