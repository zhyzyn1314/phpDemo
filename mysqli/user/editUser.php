<?php
header('content-type:text/html;charset=utf-8');
$mysqli = new mysqli();
$mysqli = @mysqli_connect('localhost:3306', 'root', 'root', 'zhy');
if ($mysqli->errno) {
    die('MYSQL CONNECT ERROR--' . $mysqli->connect_errno . ':' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');

$id = $_GET['id'];
//echo $id;
$sql = "SELECT id, name, age, description FROM user WHERE id=$id";
//echo $sql;
$res = $mysqli->query($sql);

if ($res && $res->num_rows>0) {
    $user = $res->fetch_assoc();
} else{
    echo "<script type='text/javascript'>
                alert('该用户不存在！');
                location.href='userList.php';
          </script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>修改用户</h1>

<form action="doAction.php?act=editUser&id=<?php echo $user['id'] ?>" method="post">
<!--    <input type="hidden" value="--><?php //echo $user['id'] ?><!--" name="id" />-->
    <table cellspacing="0" cellpadding="0" border="1" bgcolor="#ffe4c4" width="350px">
        <tr>
            <td>姓名</td>
            <td><input type="text" name="name" placeholder="请输入用户名" value="<?php echo $user['name'] ?>"></td>
        </tr>
        <tr>
            <td>年龄</td>
            <td><input type="number" min="1" max="150" name="age" placeholder="年龄" value="<?php echo $user['age'] ?>"></td>
        </tr>
        <tr>
            <td>描述</td>
            <td><textarea placeholder="请输入描述" cols="30" rows="3" name="description"><?php echo $user['description'] ?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
</body>
</html>