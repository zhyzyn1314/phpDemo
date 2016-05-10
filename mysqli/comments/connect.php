<?php
$mysqli = @new mysqli('localhost:3306', 'root' ,'root', 'zhy');
if($mysqli->connect_errno){
    die('mysql connect error : '.$mysqli->connect_error);
}else{
    $mysqli->set_charset('utf8');
}