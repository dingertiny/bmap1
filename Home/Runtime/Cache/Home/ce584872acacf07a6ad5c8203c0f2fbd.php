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
					<li><a>文件上传</a></li>
									
						
					<li><a href="#">信息查询</a></li>
					<li><a href="#">信息管理</a></li>
				</ul>
				<ul class="nav nav-sidebar">
					<li><a href="#">设置</a></li>
					<li><a href="#">帮助</a></li>
				</ul>
			</div>
			<div  id="projectContainer" class="col-md-10">
				<div class="panel panel-info" style="height:530px">
					<div class="panel-heading">
						<div class="panel-title">
							建议规划学校							
						</div>
						
					</div>
					<form style="display: inline-flex;position: relative;float: right;" method="post" action="/bmap1/index.php/Home/Suggestfile/dofileup" enctype="multipart/form-data">
						<input type="file" name="filename"/>
						<input type="submit" value="确定上传" style="right: 15px;position: absolute;" class="btn btn-success btn-xs" />
					</form>	
					<div class="panel-body">

						
						<table style="margin-top:-10px" class="table table-striped table-bordered table-hover">		 		
					 		<thead id="sugtitlecenter">
					 			<tr>
					 				<th>序号</th><th>名称</th><th>上传时间</th><th>管理</th>				
					 			</tr>
					 		</thead>
					 		<tbody id="sugtable">
					 			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
						 				<td><?php echo ($vo["id"]); ?></td>
										<td><?php echo ($vo["filename"]); ?></td>
										<td><?php echo (date('Y-m-d H:i',$vo["time"])); ?></td>
										<td><a href="">下载</a>&nbsp<a href="/bmap1/index.php/Home/Suggestfile/del/id/<?php echo ($vo["id"]); ?>">删除</a></td>
									</tr><?php endforeach; endif; ?>
					 		</tbody>

					 	</table>						
					</div>
						
				</div>

				<div class="pageDived"><?php echo ($page); ?></div>			
								
						 					
			</div>
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