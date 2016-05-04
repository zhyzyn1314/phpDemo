<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>添加用户</h1>

<form action="doAction.php?act=addUser" method="post">
    <table cellspacing="0" cellpadding="0" border="1" bgcolor="#ffe4c4" width="350px">
        <tr>
            <td>姓名</td>
            <td><input type="text" name="name" placeholder="请输入用户名"></td>
        </tr>
        <tr>
            <td>年龄</td>
            <td><input type="number" min="1" max="150" name="age" placeholder="年龄"></td>
        </tr>
        <tr>
            <td>描述</td>
            <td><textarea placeholder="请输入描述" cols="30" rows="3" name="description"></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
</body>
</html>