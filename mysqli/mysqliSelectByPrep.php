<?php
$mysqli = @new mysqli("localhost:3306", "root", "root", "zhy");
if ($mysqli->connect_errno) {
    die("MYSQL CONNECT ERROR:" . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');

$sql = 'SELECT id,age,description FROM user WHERE id<?';

$mysqli_stmt = $mysqli->prepare($sql);

$paramId = 20;
$mysqli_stmt->bind_param('i', $paramId);
if($mysqli_stmt->execute()){
    $mysqli_stmt->bind_result($id, $age, $description);
    while($mysqli_stmt->fetch()){
        echo 'id:'.$id.' ,$age'.$age.' ,$description='.$description;
        echo '<hr/>';
    }
}
$mysqli_stmt->close();
$mysqli->close();
