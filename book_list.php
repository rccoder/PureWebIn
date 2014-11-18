<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title>读书展示-读书管理系统</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/search.js"></script>
</head>
<body>
	<div class="content">
		<div class="top">
			<h1>欢迎进入读书管理系统</h1>
		</div>
		<div class="bookcontent">
			<div class="type">
				<li><a href="#">全部</a></li>
				<li><a href="#">计算机</a></li>
				<li><a href="#">金融</a></li>
				<li><a href="#">哲学</a></li>
				<li><a href="#">文学</a></li>
			</div>
			<div class="book">
				<li></li>
			</div>
			<div class="bookright">
				<div class="search">
					<form action="" method="post" onsubmit="return search(this)">
						<input type="text" class="booksearchInput" name="keyword" value="search.." />
					</form>
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
								include_once('php/conn.php');
								//include_one('php/page.php'); 

								$sql = "SELECT * FROM book where  1=1";
								$result = mysql_query($sql) or die(mysql_error());
								$result = mysql_query($sql);
								while($row = mysql_fetch_array($result))
								{
							 ?>
							<tr>
								<td><?php echo $row['id']?></td>
								<td><?php echo $row['bookname']?></td>
								<td><?php echo $row['bookauthor']?></td>
								<td><?php echo $row['bookdata']?></td>
								<td><?php echo $row['bookprice']?></td>
								<td>详情</td>
							</tr>
							<?php 
								}
							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<p>
			CopyRight&nbsp;2014&nbsp;by&nbsp;<a href="http://www.rccoder.net">若兮为尘</a> and <a href="HTTP://www.pureweb.com">PureWeb</a>
		</p>
	</footer>
</body>
</html>