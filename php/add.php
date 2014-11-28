<?php 
	include_once("../php/conn.php");
	mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=utf8");
	$bookname = $_POST["bookname"];
	$bookdes = $_POST["bookdes"];
	$booktype = $_POST["booktype"];
	$bookauthor = $_POST["bookauthor"];
	$bookdata = $_POST["bookdata"];
	$bookprice = $_POST["bookprice"];
	$sql = "INSERT INTO book
		(
    bookname, bookdes, bookauthor, booktype, bookdata, bookprice
    )VALUES('$bookname', '$bookdes', '$bookauthor', '$booktype', '$bookdata', $bookprice)";
	if(mysql_query($sql))
	{
		if(mysql_affected_rows())
			echo "<script>alert('更新成功！');location.href='../book_list.php';</script>";
		else
		{
			echo "<script>alert('好像你没修改什么东西');location.href='../book_list.php';</script>";
		}
	}
	else
	{
		die(mysql_error());
	}
 ?>