<?php 
	include_once('php/conn.php');
	$id = $_GET["id"];
	$sql = "DELETE FROM book where id = '$id' ";
	if(mysql_query($sql))
	{
		if(mysql_affected_rows())
		{
			echo "<script>alert('删除成功！'); location.href='book_list.php';</script>";
		}
		else
		{
			echo "<script>alert('删除失败！'); location.href='book_list.php';</script>";
		}
	}
	else
	{
		echo mysql_error();
	}
 ?>