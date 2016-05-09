<?php
$mysqli = @new mysqli("localhost:3306", "root", "root", "zhy");
if ($mysqli->connect_errno) {
    die("MYSQL CONNECT ERROR:" . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');

$sql = "SELECT id, name FROM user WHERE id=1;";
$sql .= "SELECT * FROM mysql.user;";
$sql .= "SELECT NOW();";
//针对多条SQL语句的查询
if ($mysqli->multi_query($sql)) {
    do {
        //use_result()/store_result():获取第一条查询产生的结果集
        if($mysqli_result = $mysqli->store_result()){
            $rows[] = $mysqli_result->fetch_all(MYSQLI_ASSOC);
        }
        //more_results():检测是否有更多的结果集
        //next_result():将结果集指针向下移动一位
    } while ($mysqli->more_results() && $mysqli->next_result());
} else {
    echo "ERROR:" . $mysqli->error;
}

var_dump($rows);
$mysqli->close();