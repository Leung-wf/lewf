<?php
header('Content-Type: text/html; charset=utf-8');
$username1 = $_POST['username'];
$userPwd1 = $_POST['userPwd'];
//！！接下来四个变量填写自己的数据库信息：
    $servername = "localhost:3306";
	$username = "root";
	$password = "123456";
	$dbname = "test";
//连接数据库：
	$conn = new mysqli($servername, $username, $password, $dbname);
//检测连接：
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$searchName = "select * from testtable where username='$username1'";
$searchNameResult = $conn->query($searchName);
$row = $searchNameResult->fetch_row();
$confirmPwd = "select userPwd from testtable where username='$username1'";
$confirmPwdResult = $conn->query($confirmPwd);
$rowPwd = $confirmPwdResult->fetch_row();
if ($username1 == "" or $userPwd1 == ""){
    echo '<script>alert("账号或密码不能留空");history.go(-1);</script>';
}
else if ($username1 === $row[0] and $userPwd1 === $rowPwd[0]){
    //echo "<script>alert('登录成功');</script>";
    header("Refresh:0;url=../content/content.html");
}
?>