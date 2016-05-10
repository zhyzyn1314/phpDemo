<?php
$link = mysqli_connect('localhost:3306', 'root', 'root', 'zhy') or die('mysqli connect error ' . mysqli_connect_errno() . ':' . mysqli_connect_error());
mysqli_set_charset($link, 'utf8');

$sql = "INSERT INTO user (name, age, description) VALUES(?,?,?);";
$stmt = mysqli_prepare($link, $sql);
$name = '小龙女';
$age = 18;
$description = '人间仙子小龙女';
mysqli_stmt_bind_param($stmt, 'sis', $name, $age, $description);
$res = mysqli_stmt_execute($stmt);

var_dump($res);
mysqli_close($link);