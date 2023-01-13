<?php



//从html接收数据
$email = "'".strval($_POST["email"])."'";
$pwd = $_POST["password"];
$npwd = $_POST["new_password"];

//连接数据库basic_info 并检查
$db = mysqli_connect("localhost:3306", "root", "star2003-0", "星哲摄影");
// if (!$db)
// {
//     die("连接数据库错误: " . mysqli_connect_error());
// } else{
// 	echo "连接数据库成功\n";
// }
//查找此用户名的数据
$sql = "UPDATE user SET password = $npwd WHERE (email = $email AND password = $pwd)";
$result = $db->query($sql);

if ($result) {
        echo "<script>alert('修改成功，新密码$npwd');history.go(-2);</script>";
} else {
    echo "修改失败，错误原因：" . $sql . "<br>" . $db->error;
    echo "<br>请检查原账号密码是否匹配";
}

$db->close();




?>