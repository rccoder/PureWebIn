<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title>读书增加-读书管理系统</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/search.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/Modernizr.js"></script>
</head>
<body>
	<div class="content">
		<div class="top">
			<h1>欢迎进入读书管理系统</h1>
		</div>
		<?php 
			include_once("php/conn.php");
		 ?>
		<div class="bookadd">
			<table>
			<form action="php/add.php" method="post" name = "bookaddform">
			<h2>书名</h2>
			<div="border-lines">
			<input  type="text" value="" name="bookname" placeholder="书名" >
			</div>
				<div class="bookadd-content">
					<label>作者:</label>
					<input div="border-line" type="text" value="" name="bookauthor" placeholder="作者" >
				</div>
				<div class="bookadd-content" >
					<label>简介:</label>
					<input div="border-line" type="text" value="" name="bookdes" placeholder="简介" >
				</div>
				<div class="bookadd-content" >
					<label>类型:</label>
					<ol>
					<li>
					<input div="border-line" type="radio" value="computer" name="booktype" />计算机</li>
					<li><input div="border-line" type="radio" value="financial" name="booktype" />金融</li>
					<li><input div="border-line" type="radio" value="philosophy" name="booktype" />哲学</li>
					<li><input div="border-line" type="radio" value="literature" name="booktype" />文学</li>
					<li><input div="border-line" type="radio" value="other" name="booktype" />其他</li>
					</ol>
				</div>
				<div class="bookadd-content">
					<label>出版日期:</label>
					<input div="border-line" type="text" value="" name="bookdata" placeholder="2014-12-12">
				</div>
				<div class="bookadd-content">
					<label>定价:</label>
					<input div="border-line" type="text" value="" name="bookprice" placeholder="定价">
				</div>
				<div class="updatebutton">
					<button type="submit">添加</button>
					<button type="reset">重置</button>
				</div>
			</form>
		</table>
		</div>
	</div>
	<footer>
		<p div="copyright">
			CopyRight&nbsp;2014&nbsp;by&nbsp;<a href="http://www.rccoder.net">若兮为尘</a> and <a href="HTTP://www.pureweb.com">PureWeb</a>
		</p>
	</footer>
</body>
</html>