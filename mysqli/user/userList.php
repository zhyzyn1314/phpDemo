<?php
header('content-type:text/html;charset=utf-8');
$mysqli = new mysqli();
$mysqli = @mysqli_connect('localhost:3306', 'root', 'root', 'zhy');
if ($mysqli->errno) {
    die('MYSQL CONNECT ERROR--' . $mysqli->connect_errno . ':' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');

$sql = 'SELECT id, name, age, description FROM user';
$query = $mysqli->query($sql);
//$rows = $query->fetch_all(MYSQLI_ASSOC);
if ($query && $query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $rows[] = $row;
    }
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<h1>用户列表</h1>

<p><a href="addUser.php">添加用户</a></p>
<table border="1" cellpadding="0" cellspacing="0" bgcolor="#f8f8ff" width="60%">
    <tr>
        <th>编号</th>
        <th>姓名</th>
        <th>年龄</th>
        <th>描述</th>
        <th>操作</th>
    </tr>
    <?php $i = 1;
    foreach ($rows as $row): ?>
        <tr align="center">
            <td><?php echo $i ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['age'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><a href="editUser.php">编辑</a>|<a href="doAction.php">删除</a></td>
        </tr>
        <?php $i++; endforeach ?>
</table>
</body>
</html>