<?php


function add_querystring_var($url, $key, $value) {
    // 追加url用于传递姓名等参数到html
    $url=preg_replace('/(.*)(?|&)'.$key.'=[^&]+?(&)(.*)/i','$1$2$4',$url.'&');
    $url=substr($url,0,-1);
    if(strpos($url,'?') === false){
    return ($url.'?'.$key.'='.$value);
    } else {
    return ($url.'&'.$key.'='.$value);
    }
    }


//从html接收数据
$email = "'".strval($_POST["email"])."'";
$pwd = $_POST["password"];

//连接数据库basic_info 并检查
$db = mysqli_connect("localhost:3306", "root", "star2003-0", "星哲摄影");
// if (!$db)
// {
//     die("连接数据库错误: " . mysqli_connect_error());
// } else{
// 	echo "连接数据库成功\n";
// }
//查找此用户名的数据
$sql = "SELECT * FROM user WHERE email=$email AND password=$pwd";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        $message = "您好" . ", " . $row["posts"] . $row["uname"] . "!";
        echo "<script>alert('$message')'</script>";
        $url_this = "../user.html";
        if ($row["posts"] != "user") {
            // 如果是管理员则进入管理员界面 同时跳出循环
            $url = add_querystring_var($url_this,'admin',$row["uname"]);
        } else {
            $url = add_querystring_var($url_this,'user',$row["uname"]);
        }
        header('Location: '.$url);
        $title = "您好" . $row["uname"];
        echo "<title>$title</title>";
    }
} else {
    echo '<script>alert("密码或账号错误"); location.href="../login_page.html"</script>';
    // 登陆失败会回到登陆界面
}
$db->close();




?>