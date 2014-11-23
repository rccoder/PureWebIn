<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title>读书修改-读书管理系统</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/search.js"></script>
</head>
<body>
	<div class="content">
		<div class="top">
			<h1>欢迎进入读书管理系统</h1>
		</div>
		<?php 
			include_once("php/conn.php");
			$id = $_GET["id"];
			$sql = "SELECT * FROM book where id='$id'";
			if($result = mysql_query($sql))
			{
				while($row = mysql_fetch_object($result))
				{
		 ?>
		<div class="image-content">
			xxxxxxxx
		</div>
		<div class="bookupdate">
			<table>
			<form action="php/update.php?id=<?php echo $row->id ?>" method="post" name = "bookupdateform">
			<h2>书名</h2>
			<input div="border-line" type="text" value="<?php echo $row->bookname ?>" name="bookname">
			
				<div class="bookupdate-content">
					<label>作者:</label>
					<input div="border-line" type="text" value="<?php echo $row->bookauthor ?>" name="bookauthor">
				</div>
				<div class="bookupdate-content" >
					<label>简介:</label>
					<input div="border-line" type="text" value="<?php echo $row->bookdes ?>" name="bookdes">
				</div>
				<div class="bookupdate-content" >
					<label>类型:</label>
					<?php 
					if($row->booktype == "computer")
					{
						$computer='checked="checked"';
						$financial="";
						$philosophy="";
						$literature="";
						$other="";
					}
					 if($row->booktype == "financial")
						{
							$financial='checked="checked"';
							$computer="";
							$philosophy="";
							$literature="";
							$other="";
						}
						if($row->booktype == "philosophy")
							{
								$philosophy='checked="checked"';
								$computer="";
								$financial="";
								$literature="";
								$other="";
							}
							if($row->booktype == "literature")
								{
									$literature='checked="checked"';
									$computer="";
									$financial="";
									$philosophy="";
									$other="";
								}
									else{
										$other='checked="checked"';
										$computer="";
										$financial="";
										$philosophy="";
										$literature="";

									}
				 ?>
					<input div="border-line" type="radio" <?php echo $computer ?> value="computer" name="booktype" />计算机
					<input div="border-line" type="radio" <?php  echo $financial ?> value="financial" name="booktype" />金融
					<input div="border-line" type="radio" <?php  echo $philosophy ?> value="philosophy" name="booktype" />哲学
					<input div="border-line" type="radio" <?php  echo $literature ?> value="literature" name="booktype" />文学
					<input div="border-line" type="radio" <?php  echo $other ?> value="other" name="booktype" />其他
				</div>
				<div class="bookupdate-content">
					<label>出版日期:</label>
					<input div="border-line" type="text" value="<?php echo $row->bookdata ?>" name="bookdata">
				</div>
				<div class="bookupdate-content">
					<label>定价:</label>
					<input div="border-line" type="text" value="<?php echo $row->bookprice ?>" name="bookprice">
				</div>
				<div class="updatebutton">
					<button type="submit">修改</button>
					<button type="reset">重置</button>
				</div>
			</form>
		</table>
		</div>
		<?php 
			}
		}
			else
			{
				die(mysql_error());
			}
		 ?>
	</div>
	<footer>
		<p div="copyright">
			CopyRight&nbsp;2014&nbsp;by&nbsp;<a href="http://www.rccoder.net">若兮为尘</a> and <a href="HTTP://www.pureweb.com">PureWeb</a>
		</p>
	</footer>
</body>
</html>