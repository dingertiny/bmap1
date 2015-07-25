<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<body> 
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
			<div class="navbar-text navbar-right" style="display:inline-flex">
				<div style="margin-right:15px" id="currenttime"></div>
				<div style="margin-right:15px">当前用户：<?php echo (session('username')); ?></div>
				<div style="margin-right:15px"><a href="/bmap1/index.php/Home/Login/doLogout">退出</a></div>
			</div>

			</div>

		</div>

	</nav>
		
	<!--自适应布局-->
	<div class="container">
		<div class="row">
			<div class="col-md-2 sidebar">
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
			<div  id="projectContainer" class="col-md-10">
				<div class="panel panel-success" style="height:530px">
					<div class="panel-heading">
						<h3 class="panel-title">最新订单</h3>
					</div>
					<div class="panel-body">
						<table style="margin-top:-10px" class="table table-striped table-bordered table-hover">		 		
					 		<thead id="protitlecenter">
					 			<tr>
					 				<th>责任单位</th><th>项目名称</th><th>项目规模</th><th>项目内容</th><th>开工年份</th><th>竣工年份</th><th>总投资（万元）</th>				
					 			</tr>
					 		</thead>
					 		<tbody id="protable">
					 			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
						 				<td><?php echo ($vo["unit"]); ?></td>
										<td><?php echo ($vo["name"]); ?></td>
										<td><?php echo ($vo["scale"]); ?></td>
										<td><?php echo ($vo["content"]); ?></td>
										<td><?php echo ($vo["starttime"]); ?></td>
										<td><?php echo ($vo["endtime"]); ?></td>
										<td><?php echo ($vo["totalinvestment"]); ?></td>	
						 			</tr><?php endforeach; endif; ?>
					 		</tbody>

					 	</table>						
					</div>
						
				</div>

				<div class="pageDived"><?php echo ($page); ?></div>			
								
						 					
			</div><!--#projectContainer-->
		</div>
	</div>

<script type="text/javascript">
//显示当前时间
	function getNowtime(){
		var a=new Date();
		var x=new Array("日","一","二","三","四","五","六");
		day=x[a.getDay()];
		document.getElementById('currenttime').innerHTML=a.getFullYear()+"年"+(a.getMonth()+1)+"月"+a.getDate()+"日"+"&nbsp;"+"星期"+day+"&nbsp;"+a.getHours()+":"+a.getMinutes()+":"+a.getSeconds();
	}
	setInterval('getNowtime()',1000);
	getNowtime();



</script>
</body>
</html>