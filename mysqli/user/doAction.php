<?php
header('content-type:text/html;charset=utf-8');
$mysqli = new mysqli();
$mysqli = @mysqli_connect('localhost:3306', 'root', 'root', 'zhy');
if ($mysqli->errno) {
    die('MYSQL CONNECT ERROR--' . $mysqli->connect_errno . ':' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');

$name = @$mysqli->escape_string($_POST['name']);
$age = @$_POST['age'];
$description = @$mysqli->escape_string($_POST['description']);
$act = @$_GET['act'];
$id = @$_GET['id'];

switch ($act) {
    case 'addUser' :
//        echo 'addUser';
        $sql = "insert into user (name, age, description) VALUES ('{$name}','{$age}','{$description}')";
        $res = $mysqli->query($sql);
        if ($res) {
            $insertNum = $mysqli->insert_id;
            echo "<script type='text/javascript'>
                alert('插入成功！您是网站的第{$insertNum}位用户。');
                location.href='userList.php';
            </script>";
            exit;
        } else {
            echo "<script type='text/javascript'>
                alert('插入失败！');
                location.href='addUser.php';
            </script>";
            exit;
        }
    case 'delUser' :
        $sql = "DELETE FROM USER WHERE id = '{$id}'";
        $res = $mysqli->query($sql);
        if ($res) {
            $msg = '删除成功！';
        } else {
            $msg = '删除失败！';
        }
        $url = 'userList.php';
        echo "<script type='text/javascript'>
                alert('{$msg}');
                location.href='{$url}';
            </script>";
        exit;
    case 'editUser' :
        $sql = "update user set name='{$name}', age='{$age}', description='{$description}' WHERE id=$id";
//        echo $sql;
        $res = $mysqli->query($sql);
        if ($res) {
            $msg = '更新成功！';
        } else {
            $msg = '更新失败！';
        }

        $url = 'userList.php';
        echo "<script type='text/javascript'>
                alert('{$msg}');
                location.href='{$url}';
            </script>";
        exit;
    default:
        echo "<script type='text/javascript'>
                alert('参数错误！');
                location.href='userList.php';
            </script>";
        exit;
}

