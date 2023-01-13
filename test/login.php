<?php
//从html接收数据
$name = $_POST["username"];
$pwd = $_POST["password"];

//连接数据库basic_info 并检查
$db = mysqli_connect("localhost:3306", "star", "star2003-0", "星哲摄影");
if (!$con)
{
    die("连接错误: " . mysqli_connect_error());
}
//查找此用户名的数据
$sql = "SELECT * FROM user WHERE username=$name AND password=$pwd";
$rs = mysqli_query($db, $sql);

if(mysqli_num_rows($rs) > 0){
	header("location:bilibili.com");//匹配成功，登录
}
else{
	echo "<script>alert('用户名或密码错误！'); location.href='localhost:80'</script>";//匹配失败返回登录页
}

?>