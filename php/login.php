<?php 
	header("Content-type:text/html; charset=UTF-8");
	session_start();
	$username = $_POST["username"];
	$password = $_POST["password"];
	if($username=="admin" && $password=="12345678")
	{
		echo "<script>location.href='../book_list.php';</script>";
	}
	else
	{
		echo "<script>alert('账号不存在或密码错误');location.href='../index.php';</script>";
	}
 ?>