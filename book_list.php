<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title>读书展示-读书管理系统</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/search.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
  		$("input").keydown(function(){
    	$("input").css("background-color","#FFFFCC");
  		});
  		var t="";
  		$("input").keyup(function(){
  			last=event.timeStamp;
  			setTimeout(function(){
  				if(last-event.timeStamp==0)
  				{
  						alert("ssss");
  				}
}, 500
  				);
    		
  		}
  		);

		});
	</script>
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
						<input type="text" id="number" class="booksearchInput" name="keyword" value="" />
					</form>
					<!--
					<?php 
						if($_POST['keyword'] && $_POST['keyword'] != "search..")
						{
							$search .= "and name like '%$_POST[keyword]%'";
						}
					 ?>
					-->
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
									<option value="">详情</option>
									<a href="delete.php?id=<?php echo $row['id'] ?>">删除</a>
									<a href="update.php?id=<?php echo $row['id'] ?>">修改</a>
								</td>
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
		<p div="copyright">
			CopyRight&nbsp;2014&nbsp;by&nbsp;<a href="http://www.rccoder.net">若兮为尘</a> and <a href="HTTP://www.pureweb.com">PureWeb</a>
		</p>
	</footer>
</body>
</html>