<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>学校布局信息管理系统</title>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=PGIKkG06BzEr6M7cGjvj0o0o"></script> 

<script src="/bmap/Public/Js/jquery-1.11.1.min.js"></script>
<script src="/bmap/Public/Js/bootstrap.min.js"></script>
<script type="text/javascript" src="/bmap/Public/Js/jquery.webui-popover.min.js"></script>

<link href="/bmap/Public/Css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="/bmap/Public/Css/main.css" />
<link rel="stylesheet" type="text/css" href="/bmap/Public/Css/jquery.webui-popover.min.css" />




<script type="text/javascript" src="/bmap/Public/Js/main.js"></script>

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
						<a href="#" id="shouye">首页</a>
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
					<li><a id="project" href="#">在建项目</a></li>
				</ul>

				<form action="/bmap/index.php/Home/Login/doLogin" method="post" id="myForm" class="navbar-form navbar-right">
					<div class="form-group">
						<input type="text" name="username" class="form-control input-sm" placeholder="用户名..."/>
						<input type="password" name="password" class="form-control input-sm" placeholder="密码..."/>
					</div>
					<!-- <button type="button" id="submit" class="btn btn-default btn-sm">登录</button> -->
					<button type="submit" class="btn btn-default btn-sm">登录</button>
					
					<button type="button" id="register" class="btn btn-default btn-sm">注册</button>
				</form>
				

				
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
					  	<form action="/bmap/index.php/Home/Register/doReg" method="post" id="registerForm">
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
					  			<img src="/bmap/index.php/Home/Public/verify" onclick="this.src=this.src+'?'+Math.random()"/>
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
			<div class="col-md-2 sidebar">			 	
		 		<ul class="nav nav-sidebar">
					<li class="active"><a>显示学校</a></li>
				</ul>
				
				<ul class="nav nav-sidebar">				 
					<li><a href="#">小学</a></li>
					 <li class="nav-divider leftnav-divide"></li>
					<li><a href="#">中学</a></li>
					<li class="nav-divider leftnav-divide"></li>
					<li id="schooldisplay"><a href="#">所有学校</a></li>
				</ul>
				<ul class="nav nav-sidebar">
					<li><a href="#">设置</a></li>
					 <li class="nav-divider leftnav-divide"></li>
					<li><a href="#">帮助</a></li>
				</ul>
				<ul class="nav nav-sidebar">
					<li class="active"><a>学校查询</a></li>
				</ul>
				<ul class="nav nav-sidebar">
					<li><a href="#" class="show-pop" data-placement="right">搜索查询<span class="glyphicon glyphicon-chevron-right"></span></a></li>
					 <div id="popover-content2" class="hide">
                     	<form class="form-inline" id="searchForm" action="/bmap/index.php/Home/School/searchSchool" method="post">
                     		<div class="form-group">
                     			<input type="text" onkeyup="noaction()"  name="suggestId" id="suggestId" style="width:125px" class="form-control input-sm test" placeholder="请输入关键词"/>
                     			
                       		 	<button onclick="findSearch()" class="btn btn-primary btn-sm" type="button">查找</button>
                     		</div>
                      </form>
                    </div>
					 <li class="nav-divider leftnav-divide"></li>
					<li><a href="#">分类查询</a></li>				
				</ul>
	
			</div>

					

			<div id="allmap" class="col-md-10"></div>
		</div>
	</div>
	<div class="container">
					
					
		</div>




</body>
</html>