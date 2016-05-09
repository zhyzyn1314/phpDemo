<?php
$mysqli = @new mysqli("localhost:3306", "root", "root", "zhy");
if ($mysqli->connect_errno) {
    die("MYSQL CONNECT ERROR:" . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');

$sql = 'INSERT INTO user (name, age, description) VALUES (?,?,?)';

$mysqli_stmt = $mysqli->prepare($sql);
//print_r($mysqli_stmt);

for ($i = 0; $i < 5; $i++) {
    $name = 'prepare' . $i;
    $age = 25 + $i;
    $description = 'description' . $i;
    $mysqli_stmt->bind_param('sis', $name, $age, $description);
    if ($mysqli_stmt->execute()) {
        echo $mysqli_stmt->insert_id;
        echo '<br/>';
    } else {
        echo $mysqli_stmt->error;
    }
}

$mysqli_stmt->close();
$mysqli->close();



