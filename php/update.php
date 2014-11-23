<?php 
	include_once("../php/conn.php");
	$id = $_GET["id"];
	$bookname = $_POST["bookname"];
	$bookdes = $_POST["bookdes"];
	$booktype = $_POST["booktype"];
	$bookauthor = $_POST["bookauthor"];
	$bookdata = $_POST["bookdata"];
	$bookprice = $_POST["bookprice"];
	$sql = "UPDATE book SET 
		bookname='$bookname', 
		bookdes='$bookdes',
		booktype='$booktype',
		bookauthor='$bookauthor',
		bookdata='$bookdata',
		bookprice='$bookprice' where id='$id'
		";
	if(mysql_query($sql))
	{
		if(mysql_affected_rows())
			echo "<script>alert('更新成功！');location.href='../book_list.php';</script>";
	}
	else
	{
		die(mysql_error());
	}
 ?>