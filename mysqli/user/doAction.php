<?php
header('content-type:text/html;charset=utf-8');
$mysqli = new mysqli();
$mysqli = @mysqli_connect('localhost:3306', 'root', 'root', 'zhy');
if ($mysqli->errno) {
    die('MYSQL CONNECT ERROR--' . $mysqli->connect_errno . ':' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');

$name = $mysqli->escape_string($_POST['name']);
$age = $_POST['age'];
$description = $mysqli->escape_string($_POST['description']);
$act = $_GET['act'];

switch($act){
    case 'addUser' :
//        echo 'addUser';

        break;
    default:
        echo '参数错误！';
}

