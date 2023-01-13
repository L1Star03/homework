<?php

$email = "'".strval($_POST["email"])."'"; //记得要加开头结尾的引号
//连接数据库basic_info 并检查
$db = mysqli_connect("localhost:3306", "root", "star2003-0", "星哲摄影");
if (!$db)
{
    die("连接数据库错误: " . mysqli_connect_error());
} 
// 插入数据

$sql = "SELECT * FROM reserve where email=$email";
$result = $db->query($sql);
if ($result) {
    $action = $result;
    while($row = $result->fetch_assoc()) {
        $no = "订单号：" . $row["rno"] ."\\n"; // 需要俩 会先转义
        $time = "预定日期：" . $row["rdate"] . $row["rtime"] ."\\n";
        $name = "预定服务："  . $row["fname"] ."\\n";
        echo "<script>alert('$no$time$name');history.go(-1);</script>";
        
    }

} else {
    echo "哦豁，崩溃了捏，都是你害的OvO。请尝试联系管理员并把后面这一串代码告诉他" . $sql . "<br>" . $db->error;
}

$db->close();
?>