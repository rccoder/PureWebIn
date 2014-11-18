<?php 
	header("Content-type:text/html; charset=utf-8");
	$con = mysql_connect("localhost", "root", "");
	if(!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("bookmanage", $con);
	mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=utf8", $con);
	mysql_query("SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO'", $con);
 ?>