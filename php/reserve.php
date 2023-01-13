<?php
$date = "'".strval($_POST["date"])."'";
$email = "'".strval($_POST["email"])."'";
$time = "'".strval($_POST["time"])."'";
$fname = "'".strval($_POST["fname"])."'";

//连接数据库basic_info 并检查
$db = mysqli_connect("localhost:3306", "root", "star2003-0", "星哲摄影");
// if (!$db)
// {
//     die("连接数据库错误: " . mysqli_connect_error());
// } else{
// 	echo "连接数据库成功\n";
// }
// 插入数据
$sql = "INSERT INTO `星哲摄影`.`reserve` (`rdate`, `rtime`, `fname`, `email`, `reserve_statement`) VALUES ($date, $time, $fname, $email, '')";

if ($db->query($sql) === TRUE) {
    echo "预约成功！";
} else {
    echo "哦豁，崩溃了捏，都是你害的OvO。请尝试联系管理员并把后面这一串代码告诉他" . $sql . "<br>" . $db->error;
}
 
$db->close();
?>