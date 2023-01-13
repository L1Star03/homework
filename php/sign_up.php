<?php
//从html接收数据
$email = "'".strval($_POST["email"])."'";
$pwd = "'".strval($_POST["password"])."'";
$uname = "'".strval($_POST["name"])."'";


//连接数据库basic_info 并检查
$db = mysqli_connect("localhost:3306", "root", "star2003-0", "星哲摄影");
// if (!$db)
// {
//     die("连接数据库错误: " . mysqli_connect_error());
// } else{
// 	echo "连接数据库成功\n";
// }
// 插入数据
$sql = "INSERT INTO `user` (`uname`, `email`, `password`) VALUES ($uname, $email, $pwd)";

if ($db->query($sql) === TRUE) {
    echo "注册成功，请返回主界面登陆";
} else {
    echo "哦豁，崩溃了捏，都是你害的OvO。请尝试联系管理员并把后面这一串代码告诉他" . $sql . "<br>" . $db->error;
}
 
$db->close();
?>