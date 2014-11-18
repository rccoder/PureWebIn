<?php 
class page
{
	var $page_name = "pageNum";
	var $next_page = '>';
	var $pre_page = '<';
	var $first_page = "First";
	var $last_page = "Last";
	var $pre_bar = "<<";
	var $next_bar = ">>";

	var $pagebarnum = 10;
	var $totalpage = 0;
	var $nowindex = 1;
	var $url = "";
	var $offset = 0;

	function page($array)
	{
		if(is_array($array))
		{
			if(!array_key_exists('total', $array))
			{
				$this -> error(__FUNCTION__, 'need a param of total');
			}
			$total = intval($array['total']);
			$perpage = (array_key_exists('perpage', $array))?intval($array['perpage']):10;
			$nowindex = (array_key_exists('nowindex', $array))?intval($array['nowindex']):'';
			$url = (array_key_exists('url', $array))?$array['url']:'';
		}
		else
		{
			$total = $array;
			$perpage = 10;
			$nowindex = '';
			$url = '';
		}
		if((!is_int($total)) || ($total < 0))
		{
			$this -> error(__FUNCTION__, total.'is not a positive' );
		}
		if(!is_int($perpage) || ($perpage <= 0))
		{
			$this -> error(__FUNCTION__, $prepage.'is not a positiv int');	
		} 
		if(!empty($array['page_name']))
		{
			$this -> set('page_name', $array['page_name']);
		}
		$this -> _set_ nowindex($nowindex);
		$this -> _set_ url($url);
		$this -> totalpage = ceil($total/$perpage);
	}
}
 ?>