function search(thisform)
{
	with(thisform)
	{
	if(booksearch.value=="")
	{
		alert("你好像没有输入~");
		return false;
	}
	else
	{
		return true;
	}
	}
}