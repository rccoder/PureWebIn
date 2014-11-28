<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title>读书展示-读书管理系统</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/search.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script>
	$(function()
	{

		$('#search-auto').css({'width':$('#search-content input[name="keyword"] ').width()+4});
		$('#search-content input[name="keyword"]').keyup(function()
		{
			$.post('php/search-auto.php', {'value':$(this).val()}, function(data)
			{
				if(data=='0')
					$('#search-auto').html('').css('display', 'none');
				else
					$('#search-auto').html(data).css('display', 'block');
			}
				);
		}
			);
	});
	</script>
</head>
<body>
	<?php 
include_once('php/conn.php');
	 ?>
	<div class="content">
		<div class="top">
			<h1><a href="book_list.php">欢迎进入读书管理系统</a></h1>
		</div>
		<div class="bookcontent">
			<div class="type">
				<li><a href="book_list.php">全部</a></li>
				<li><a href="?computer">计算机</a></li>
				<li><a href="?financial">金融</a></li>
				<li><a href="?philosophy">哲学</a></li>
				<li><a href="?literature">文学</a></li>
				<li><a href="book_list.php"></a></li>
				<li><a href="book_list.php"></a></li>
				<li><a href="book_list.php"></a></li>
				<li><a href="add.php">添书</a></li>
			</div>
			<div class="book">
				<li></li>
			</div>
			<div class="bookright">
				<div class="search">
					<div id="search-content">
						<input type="text" id="number" class="number" name="keyword" value="" placeholder="请输入关键字" />
					</div>
					<div id="search-auto"></div>
				</div>
				<div class="list">
					<table>
						<thead>
							<tr>
								<th width="6%">序号</th>
								<th width="30%">书名</th>
								<th width="18%">作者</th>
								<th width="25%">出版日期</th>
								<th width="15%">定价</th>
								<th width="8%"> 操作</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$whichpage="";
								if(!$whichpage)
								{
									$notepage = 1;
								}
								else
								{
									$notepage = $whichpage;
								}
								$noterecs = 0;
								$pagesize = 10;
							 ?>
							<?php
								
								//include_one('php/page.php'); 
								$type = $_SERVER["QUERY_STRING"];
								if($type=="computer")
								{
									$typeshow = 'booktype="computer"';
								}
								else if($type=="financial")
								{
									$typeshow = 'booktype="financial"';
								}
								else if($type=="philosophy")
								{
									$typeshow = 'booktype="philosophy"';
								}
								else if($type=="literature")
								{
									$typeshow = 'booktype="literature"';
								}
								else
								{
									$typeshow = '1=1';
								}
								$sql = "SELECT * FROM book where  1=1  and $typeshow";
								//echo $sql;
								$result = mysql_query($sql) or die(mysql_error());
								$numpage = mysql_num_rows($result);
								$pagecount = ceil($numpage/$pagesize);
								mysql_data_seek($result, ($notepage-1)*10);
								while($row = mysql_fetch_array($result))
								{
							 ?>
							<tr>
								<td><?php echo $row['id']?></td>
								<td><?php echo $row['bookname']?></td>
								<td><?php echo $row['bookauthor']?></td>
								<td><?php echo $row['bookdata']?></td>
								<td><?php echo $row['bookprice']?></td>
								<td>
									<button><a href="delete.php?id=<?php echo $row['id'] ?>">删除</a></button>
									<button><a href="update.php?id=<?php echo $row['id'] ?>">修改</a></button>
								</td>
							</tr>
							<?php 
								$noterecs = $noterecs + 1;
								}
							 ?>
							 <?php 
							 	$pad = 0;
							 	for($counter = 1; $counter<=$pagecount; $counter++)
							 	{
							 		if($counter >= 10)
							 		{
							 			$pad="";
							 		}
							 		echo("<font size=+1 color=red><a href='book_list.php?whichpage=$counter & type=$type'>".$pad.$counter."</a></font>&nbsp;&nbsp;"); 
							 	}
							  ?>
						</tbody>

					</table>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<p div="copyright">
			CopyRight&nbsp;2014&nbsp;by&nbsp;<a href="http://www.rccoder.net">若兮为尘</a> and <a href="HTTP://www.pureweb.com">PureWeb</a>
		</p>
	</footer>
</body>
</html>