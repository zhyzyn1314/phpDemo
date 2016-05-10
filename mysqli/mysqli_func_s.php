<?php
header('content-type:text/html;charset=utf-8');
$link = mysqli_connect('localhost:3306', 'root', 'root', 'zhy') or die('mysqli connect error ' . mysqli_connect_errno() . ':' . mysqli_connect_error());
mysqli_set_charset($link, 'utf8');

$sql = 'SELECT name, age, description FROM user';
$res = mysqli_query($link, $sql);
if($res && mysqli_num_rows($res) > 0){
    while($rows = mysqli_fetch_assoc($res)){
        $users[] = $rows;
    }
}

var_dump($users);

foreach ($users as $user) {
    if(!empty($user)){
        echo 'name : '.$user['name'].'<br/>';
        echo 'age : '.$user['age'].'<br/>';
        echo 'description : '.$user['description'].'<hr/>';
    }
}

mysqli_free_result($res);
mysqli_close($link);








