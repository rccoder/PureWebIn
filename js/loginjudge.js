function login_submit(thisform)
{
	with(thisform)
	{
		if((username.value=="" || username.value==null) && (password.value=="" || password.value==null))
		{
			alert("Waring:用户名和密码不能为空");
			return false;
		}
		else if((username.value=="" || username.value==null))
		{
			alert("Waring:用户名不能为空");
			return false;
		}
		else if((password.value=="" || password.value==null))
		{
			alert("Waring:密码不能为空");
			return false;
		}
		else
		{
			return true;
		}
	}
}