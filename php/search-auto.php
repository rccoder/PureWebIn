<?php 
	include_once("../php/conn.php");
	$v = $_POST["value"];
	$sql = "SELECT * FROM book where bookname like '%$v%' limit 10";
	//echo $sql;
	if($re = mysql_query($sql))
	{
	if(mysql_num_rows($re) == 0)
		{
			exit(0);
		}
	echo '<ul>';
	while($ro = mysql_fetch_array($re))
	{
		echo '<li><a href="">'.$ro['bookname'].'</a></li>';

	}
		echo '<li class="cls"><a href="javascript:;" onclick="$(this).parent().parent().fadeOut(100)">关闭</a></li>';
		echo '</ul>';
	}
	else
	{
		echo "222\n";
	}
 ?>