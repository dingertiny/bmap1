<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>学校布局信息管理系统</title>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=PGIKkG06BzEr6M7cGjvj0o0o"></script> 

<script src="/bmap1/Public/Js/jquery-1.11.1.min.js"></script>
<script src="/bmap1/Public/Js/bootstrap.min.js"></script>
<script type="text/javascript" src="/bmap1/Public/Js/jquery.webui-popover.min.js"></script>

<link href="/bmap1/Public/Css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="/bmap1/Public/Css/main.css" />
<link rel="stylesheet" type="text/css" href="/bmap1/Public/Css/jquery.webui-popover.min.css" />




<script type="text/javascript" src="/bmap1/Public/Js/main.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body onload="onLoad()"> 
<!-- <body> -->
	<!--下面是顶部导航栏的代码 -->
	<nav class="navbar navbar-default navbar-inverse  navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">学校布局信息管理系统</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="/bmap1/index.php/Home/Login/Loginafter" id="shouye">首页</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">功能<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header">业务功能</li>
							<li><a href="#">信息建立</a></li>
							<li><a href="#">信息查询</a></li>
							<li><a href="#">信息管理</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">系统功能</li>
							<li><a href="#">设置</a></li>
						</ul>
					</li>
					<li><a id="project" href="/bmap1/index.php/Home/Projects/index">在建项目</a></li>
					<li><a id="suggestfile" href="/bmap1/index.php/Home/Suggestfile/index">建议规划学校</a></li>
				</ul>



<!-- 	<div class="navbar-text" id="currenttime"></div>
	<div class="navbar-text">当前用户：<?php echo (session('username')); ?></div>
	<div class="navbar-text"><a href="/bmap1/index.php/Home/Login/doLogout">退出</a></div> -->
	<div class="navbar-text navbar-right" style="display:inline-flex">
		<div style="margin-right:15px" id="currenttime"></div>
		<div style="margin-right:15px">当前用户：<?php echo (session('username')); ?></div>
		<div style="margin-right:15px"><a href="/bmap1/index.php/Home/Login/doLogout">退出</a></div>
	</div>

			</div>

		</div>

	</nav>
		<div class="modal" id="mymodal">
			<div class="modal-dialog">
				<div class="modal-content" style="position:absolute;width:400px;left:20%">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">用户注册</h4>
					</div>
					<div class="modal-body">
					  	<form action="/bmap1/index.php/Home/Register/doReg" method="post" id="registerForm">
					  		<div id="divusernamezc" class="form-group has-feedback">
					  			<span class="glyphicon glyphicon-user"></span>
					  			<label class="control-label">用户名：</label><input type="text" class="form-control" name="usernamezc" id="usernamezc"/>
					  			<span id="umessage1" style="display:none" class="help-block"></span>
					  			<span id="umessage2" style="display:none" class="glyphicon form-control-feedback"></span>
					  		</div>

					  		<div id="divpasswordzc" class="form-group has-feedback">
					  			<span class="glyphicon glyphicon-lock"></span>
					  			<label class="control-label">密　码：</label><input type="password" name="passwordzc" id="passwordzc" class="form-control"/>
					  			
					  			<span id="pmessage2" style="display:none" class="glyphicon form-control-feedback"></span>
					  		</div>

					  		<div id="divrepasswordzc" class="form-group has-feedback">
					  			<span class="glyphicon glyphicon-lock"></span>
					  			<label class="control-label">确认密码：</label><input type="password" name="repasswordzc" id="repasswordzc" class="form-control"/>
					  			<span id="rpmessage1" style="display:none" class="help-block"></span>
					  			<span id="rpmessage2" style="display:none" class="glyphicon form-control-feedback"></span>
					  		</div>

					  		<div id="divcode" class="form-group has-feedback">
					  			<span class="glyphicon glyphicon-qrcode"></span>
					  			<label class="control-label">验证码：</label><input type="text" class="form-control" name="code" id="code"/>
					  			<span id="cmessage1" style="display:none" class="help-block"></span>
					  			<span id="cmessage2" style="display:none" class="glyphicon form-control-feedback"></span>
					  			<img src="/bmap1/index.php/Home/Public/verify" onclick="this.src=this.src+'?'+Math.random()"/>
					  		</div>
					  		
					  		
							
						 						 					  		
					  	</form>					
					</div>
					<div class="modal-footer">
		
						<button type="button" id="submitZc" class="btn btn-primary">提交</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

	<!--自适应布局-->
	<div class="container">
		<div class="row">
			<div class="col-md-1 sidebar">
				<ul class="nav nav-sidebar">
					<li class="active"><a href="#">首页</a></li>
				</ul>
				<ul class="nav nav-sidebar">
					<li><a href="#">信息建立</a></li>
					<li><a href="#">信息查询</a></li>
					<li><a href="#">信息管理</a></li>
				</ul>
				<ul class="nav nav-sidebar">
					<li><a href="#">设置</a></li>
					<li><a href="#">帮助</a></li>
				</ul>
			</div>
			<div id="allmap" class="col-md-11"></div>
		</div>
	</div>

<script type="text/javascript">
//显示当前时间
	function time(){
		var a=new Date();
		var x=new Array("日","一","二","三","四","五","六");
		day=x[a.getDay()];
		document.getElementById('currenttime').innerHTML=a.getFullYear()+"年"+(a.getMonth()+1)+"月"+a.getDate()+"日"+"&nbsp;"+"星期"+day+"&nbsp;"+a.getHours()+":"+a.getMinutes()+":"+a.getSeconds();
	}
	setInterval('time()',1000);
	time();
</script>
</body>
</html>