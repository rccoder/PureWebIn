<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title>读书修改-读书管理系统</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/search.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/Modernizr.js"></script>
	<script type="text/javascript">
var fx  = {
	buffer : function(obj, cur, target, fnDo, fnEnd, fs){
		if(!fs)fs=6;
		var now={};
		var x=0;
		var v=0;
		
		if(!obj.__last_timer)obj.__last_timer=0;
		var t=new Date().getTime();
		if(t-obj.__last_timer>20)
		{
			fnMove();
			obj.__last_timer=t;
		}
		
		clearInterval(obj.timer);
		obj.timer=setInterval(fnMove, 20);
		function fnMove(){
			v=Math.ceil((100-x)/fs);			
			x+=v;			
			for(var i in cur)
			{
				now[i]=(target[i]-cur[i])*x/100+cur[i];
			}						
			if(fnDo)fnDo.call(obj, now);
			
			if(Math.abs(v)<1 && Math.abs(100-x)<1)
			{
				clearInterval(obj.timer);
				if(fnEnd)fnEnd.call(obj, target);
			}
		}
	},
	
	flex : function(obj, cur, target, fnDo, fnEnd, fs, ms){
		var MAX_SPEED=16;
		
		if(!fs)fs=6;
		if(!ms)ms=0.75;
		var now={};
		var x=0;	//0-100
		
		if(!obj.__flex_v)obj.__flex_v=0;
		
		if(!obj.__last_timer)obj.__last_timer=0;
		var t=new Date().getTime();
		if(t-obj.__last_timer>20)
		{
			fnMove();
			obj.__last_timer=t;
		}
		
		clearInterval(obj.timer);
		obj.timer=setInterval(fnMove, 20);
		
		function fnMove(){
			obj.__flex_v+=(100-x)/fs;
			obj.__flex_v*=ms;

			if(Math.abs(obj.__flex_v)>MAX_SPEED)obj.__flex_v=obj.__flex_v>0?MAX_SPEED:-MAX_SPEED;
			
			x+=obj.__flex_v;
			
			for(var i in cur)
			{
				now[i]=(target[i]-cur[i])*x/100+cur[i];
			}
			
			
			if(fnDo)fnDo.call(obj, now);
			
			if(Math.abs(obj.__flex_v)<1 && Math.abs(100-x)<1)
			{
				clearInterval(obj.timer);
				if(fnEnd)fnEnd.call(obj, target);
				obj.__flex_v=0;
			}
		}
	},
	linear : function (obj, cur, target, fnDo, fnEnd, fs){
		if(!fs)fs=50;
		var now={};
		var x=0;
		var v=0;
		
		if(!obj.__last_timer)obj.__last_timer=0;
		var t=new Date().getTime();
		if(t-obj.__last_timer>20)
		{
			fnMove();
			obj.__last_timer=t;
		}
		
		clearInterval(obj.timer);
		obj.timer=setInterval(fnMove, 20);
		
		v=100/fs;
		function fnMove(){
			x+=v;
			
			for(var i in cur)
			{
				now[i]=(target[i]-cur[i])*x/100+cur[i];
			}
			
			if(fnDo)fnDo.call(obj, now);
			
			if(Math.abs(100-x)<1)
			{
				clearInterval(obj.timer);
				if(fnEnd)fnEnd.call(obj, target);
			}
		}
	},
	
	stop:function (obj){
		clearInterval(obj.timer);
	},
	
	move3 : function(obj, json, fnEnd, fTime, sType){
		var addEnd=fx.addEnd;
		
		fTime||(fTime=1);
		sType||(sType='ease');
		
		setTimeout(function (){
			Utils.setStyle3(obj, 'transition', sprintf('%1s all %2', fTime, sType));
			addEnd(obj, function (){
				Utils.setStyle3(obj, 'transition', 'none');
				if(fnEnd)fnEnd.apply(obj, arguments);
			}, json);
			
			setTimeout(function (){
				if(typeof json=='function')
					json.call(obj);
				else
					Utils.setStyle(obj, json);
			}, 0);
		}, 0);
	
	}

};

//监听css3运动终止
(function (){
	var aListener=[];	//{obj, fn, arg}
	if(!Modernizr.csstransitions)return;	
	if(window.navigator.userAgent.toLowerCase().search('webkit')!=-1)
	{
		document.addEventListener('webkitTransitionEnd', endListrner, false);
	}
	else
	{
		document.addEventListener('transitionend', endListrner, false);
	}
	
	function endListrner(ev)
	{
		var oEvObj=ev.srcElement||ev.target;
		//alert(aListener.length);
		for(var i=0;i<aListener.length;i++)
		{
			if(oEvObj==aListener[i].obj)
			{
				aListener[i].fn.call(aListener[i].obj, aListener[i].arg);
				aListener.remove(aListener[i--]);
			}
		}
	}
	
	fx.addEnd=function (obj, fn, arg)
	{
		if(!obj || !fn)return;
		aListener.push({obj: obj, fn: fn, arg: arg});
	}
})();

$(function(){
	var now=0;
	var ready=true;
	var W=700;
	var H=400;	
	var $img = $("#img");	
	var oDiv = $img.get(0);
	var next =function(){
		return (now+1)%3;
	}
	//爆炸
    $("#btn_explode").on("click",function(){
		
		if(!ready)return;
		ready=false;
			
		var R=4;
		var C=7;		
		var cw=W/2;
		var ch=H/2;
		
		oDiv.innerHTML='';
		oDiv.style.background='url(image/'+(next()+1)+'.jpg) center no-repeat';
		var aData=[];
		
		var wait=R*C;
		
		for(var i=0;i<R;i++){
			for(var j=0,k=0;j<C;j++,k++)
			{
				aData[i]={left: W*j/C, top: H*i/R};
				var oNewDiv=$('<div>');
				oNewDiv.css({
					position: 'absolute',					
					width:Math.ceil(W/C)+'px', 
					height: Math.ceil(H/R)+'px',
					background: 'url(image/'+(now+1)+'.jpg) '+-aData[i].left+'px '+-aData[i].top+'px no-repeat',					
					left: aData[i].left+'px',
					top: aData[i].top+'px'	
				});

								
				oDiv.appendChild(oNewDiv[0]);
				
				var l=((aData[i].left+W/(2*C))-cw)*Utils.rnd(2,3)+cw-W/(2*C);
				var t=((aData[i].top+H/(2*R))-ch)*Utils.rnd(2,3)+ch-H/(2*R);
				
				setTimeout((function (oNewDiv,l,t){
					return function ()
					{
						fx.buffer(
							oNewDiv,
							{	left: oNewDiv.offsetLeft, 
								top: oNewDiv.offsetTop	,
								opacity: 100,
								x:0,
								y:0,
								z:0,
								scale:1,
								a:0
							},
							{	left: l,
								top: t,
								opacity: 0,
								x:Utils.rnd(-180, 180),
								y:Utils.rnd(-180, 180),
								z:Utils.rnd(-180, 180),
								scale:Utils.rnd(1.5, 3),
								a:1
							},
							function (now){								
								this.style.left=now.left+'px';
								this.style.top=now.top+'px';
								this.style.opacity=now.opacity/100;
								Utils.setStyle3(oNewDiv, 'transform', 'perspective(500px) rotateX('+now.x+'deg) rotateY('+now.y+'deg) rotateZ('+now.z+'deg) scale('+now.scale+')');
							}, function (){
								setTimeout(function (){
									oDiv.removeChild(oNewDiv);
								}, 200);
								if(--wait==0)
								{
									ready=true;
									now=next();
								}
							}, 10
						);
					};
				})(oNewDiv[0],l,t), Utils.rnd(0, 200));
			}
		}
	
	
	});
	
	var setStyle3 =function(obj, name, value)
	{
		obj.style['Webkit'+name.charAt(0).toUpperCase()+name.substring(1)]=value;
		obj.style['Moz'+name.charAt(0).toUpperCase()+name.substring(1)]=value;
		obj.style['ms'+name.charAt(0).toUpperCase()+name.substring(1)]=value;
		obj.style['O'+name.charAt(0).toUpperCase()+name.substring(1)]=value;
		obj.style[name]=value;
	};
	
	var  setStyle = function(obj, json){
		
	};

	var rnd = function (n, m){
		return Math.random()*(m-n)+n;
	};



});

var Utils = {
	setStyle :function(obj,json){
		if(obj.length)
			for(var i=0;i<obj.length;i++) Utils.setStyle(obj[i], json);
		else
		{
			if(arguments.length==2)
				for(var i in json) obj.style[i]=json[i];
			else
				obj.style[arguments[1]]=arguments[2];
		}
	},
	setStyle3 : function(obj, name, value){
		obj.style['Webkit'+name.charAt(0).toUpperCase()+name.substring(1)]=value;
		obj.style['Moz'+name.charAt(0).toUpperCase()+name.substring(1)]=value;
		obj.style['ms'+name.charAt(0).toUpperCase()+name.substring(1)]=value;
		obj.style['O'+name.charAt(0).toUpperCase()+name.substring(1)]=value;
		obj.style[name]=value;
	},
	rnd  : function(n,m){
	   return Math.random()*(m-n) + n ;
	}
}
</script>
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
					if(strcmp($row->booktype, "computer") == 0)
					{
						$computer='checked="checked"';
						$financial="";
						$philosophy="";
						$literature="";
						$other="";
					}
					else
					{
					 if($row->booktype == "financial")
						{
							$financial='checked="checked"';
							$computer="";
							$philosophy="";
							$literature="";
							$other="";
						}
						else
						{
						if($row->booktype == "philosophy")
							{
								$philosophy='checked="checked"';
								$computer="";
								$financial="";
								$literature="";
								$other="";
							}else
							{
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

					}		}	}	}
		 ?>
		<div class="image-content">
			<div id="img"></div>
			<div class="bookthu">
				<img src="image/2.jpg"  width="40" height="60px" alt="">
				<img src="image/3.jpg"  width="40" height="60px" alt="">
				<img src="image/4.jpg"  width="40" height="60px" alt="">
				<img src="image/5.jpg"  width="40" height="60px" alt="">
				<input id="btn_explode" type="button" value="爆炸" class="btn_01" />
			</div>
		</div>
		<div class="bookupdate">
			<table>
			<form action="php/update.php?id=<?php echo $row->id ?>" method="post" name = "bookupdateform">
			<h2>书名</h2>
			<div="border-lines">
			<input  type="text" value="<?php echo $row->bookname ?>" name="bookname">
			</div>
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
					<ol></ol>
					<li>
					<input div="border-line" type="radio" <?php echo $computer ?> value="computer" name="booktype" />计算机</li>
					<li><input div="border-line" type="radio" <?php  echo $financial ?> value="financial" name="booktype" />金融</li>
					<li><input div="border-line" type="radio" <?php  echo $philosophy ?> value="philosophy" name="booktype" />哲学</li>
					<li><input div="border-line" type="radio" <?php  echo $literature ?> value="literature" name="booktype" />文学</li>
					<li><input div="border-line" type="radio" <?php  echo $other ?> value="other" name="booktype" />其他</li>
					</ol>
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