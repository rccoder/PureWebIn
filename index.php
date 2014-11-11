<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title>登录界面-读书管理系统</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/loginjudge.js"></script>
</head>
<body>
	<div class="content">
		<div class="top">
			<h1>欢迎进入读书管理系统</h1>
		</div>
		<div class="login">
			<form action="php/login.php" method="post" name="booklogin" onsubmit="return login_submit(this)">
				<p>
					<label>用户名：&nbsp;&nbsp;&nbsp;</label>
					<input class="input" name="username" size="30" value="请输入常用邮箱" type="text" />
				</p>
				<p>
					<label>密&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input class="input" name="password" size="30" value="仅支持数字，字母，下划线" type="text" />
				</p>
				<p class="submit">
					<input class="button-login" name="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;登&nbsp;&nbsp;&nbsp;录&nbsp;&nbsp;&nbsp;&nbsp;" type="submit" />
				</p>
			</form>
		</div>
	</div>
	<footer>
		<p>
			CopyRight&nbsp;2014&nbsp;by&nbsp;<a href="http://www.rccoder.net">若兮为尘</a> and <a href="HTTP://www.pureweb.com">PureWeb</a>
		</p>
	</footer>
</body>
</html>