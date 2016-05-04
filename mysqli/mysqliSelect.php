<?php
header('content-type:text/html;charset=utf-8');
$mysqli = new mysqli();
$mysqli = @mysqli_connect('localhost:3306', 'root', 'root', 'zhy');
if($mysqli->errno){
    die('MYSQL CONNECT ERROR--'.$mysqli->connect_errno.':'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');

$sql = 'select * from user';
$mysqli_result = $mysqli->query($sql);
if($mysqli_result && $mysqli_result->num_rows>0){
    /********************************************************************
     * 查询所有记录
     * $rows=$mysqli_result->fetch_all(MYSQLI_NUM); 默认 返回索引数组
     * $rows=$mysqli_result->fetch_all(MYSQLI_ASSOC); 返回关联数组
     * $rows=$mysqli_result->fetch_all(MYSQLI_BOTH); 返回索引数组和关联数组
     ********************************************************************/
//    $rows = $mysqli_result->fetch_all();
//    var_dump($rows);

    /**
     * 查询一条 返回索引数组
     */
    $rows = $mysqli_result->fetch_row();
    var_dump($rows);
    echo '<hr/>';

    /**
     * 查询一条 返回关联数组
     */
    $rows = $mysqli_result->fetch_assoc();
    var_dump($rows);
    echo '<hr/>';

    /**
     * 查询一条 返回对象形式
     */
    $rows = $mysqli_result->fetch_object();
    var_dump($rows);
    echo '<hr/>';

    /**
     * 查询一条 返回关联数组 方法包含三种属性
     * MYSQLI_NUM
     * MYSQLI_ASSOC
     * MYSQLI_BOTH
     */
    $rows = $mysqli_result->fetch_array(MYSQLI_ASSOC);
    var_dump($rows);
    echo '<hr/>';
    /**
     * 移动结果集内部指针
     */
    $mysqli_result->data_seek(0);

    while($rows = $mysqli_result->fetch_assoc()){
        var_dump($rows);
        echo '<br/?';
    }

    $mysqli_result->free();
}else{
    die('MYSQL QUERY ERROR--'.$mysqli->errno.':'.$mysqli->error);
}
$mysqli->close();

