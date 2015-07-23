function G(id) {
	return document.getElementById(id);
}



	


/*
*加载页面
*/

function onLoad(){

	var map = new BMap.Map("allmap");
	map.centerAndZoom(new BMap.Point(114.025974, 22.546054),11);
	map.addControl(new BMap.MapTypeControl());
	map.setCurrentCity("深圳");
	map.enableScrollWheelZoom(true);

	var top_left_navigation = new BMap.NavigationControl();	//左上角添加默认缩放平移控件
	var bottom_right_control = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT});//右下角，添加比例尺
	map.addControl(top_left_navigation);
	map.addControl(bottom_right_control);

	var marker = new Array();
	var infoWindow = new Array();

	$(function(){
		//创建查询弹出窗

		var settings = {
			trigger:'click',
			title:'<b>查询</b>',
			content:function(){
				return $("#popover-content2").html();
			},
			width:210,
			
			multi:false,						
			closeable:true,
			
			padding:true
		};
		$("[data-placement='right']").webuiPopover(settings);



		$("#register").click(function(){
			//window.location='/bmap/index.php/Home/Register/reg';
			
	     	$("#mymodal").modal("toggle");		
		});


		var error=new Array();//定义一个条件数组

		//注册时，用户名失去焦点AJAX判断用户名是否已被注册
		$("#usernamezc").blur(function(){
			var usernamezc=$(this).val();
			//引入到外部js文件时就不要用 __URL__了

			$.get('/bmap/index.php/Home/Register/checkName',{'usernamezc':usernamezc},function(data){
				if(data=='0'){
					error['usernamezc']=1;
					
					$("#umessage1").css("display","block").html("该用户名已存在");

					$("#umessage2").css("display","block").addClass("glyphicon-warning-sign").removeClass("glyphicon-ok");
					//$("#umessage2").addClass("glyphicon-warning-sign").removeClass("glyphicon-ok");

					$("#divusernamezc").addClass("has-warning").removeClass("has-success");

				}else if(data=='1'){
					if(usernamezc!=""){
						error['usernamezc']=0;
						//$("#umessage1,#umessage2").remove();
						$("#umessage1").css("display","block").html("");
						
						$("#umessage2").css("display","block").addClass("glyphicon-ok").removeClass("glyphicon-warning-sign");
						//$("#umessage2").addClass("glyphicon-ok").removeClass("glyphicon-warning-sign");

						$("#divusernamezc").addClass("has-success").removeClass("has-warning");

					}else{
						$("#umessage1").css("display","none");
						$("#umessage2").css("display","none");
						$("#divusernamezc").removeClass("has-success has-warning");

					}
					

				}
			
			})
		})

		//确定密码
		$("#repasswordzc").blur(function(){
			var passwordzc=$("#passwordzc").val();
			var repasswordzc=$('#repasswordzc').val();

			if(passwordzc!=""){
				if(passwordzc!=repasswordzc){
					error['passwordzc']=1;
					//$("#repasswordzc").after('<p id="pmessage" style="color:red">两次输入密码不一致</p>');
					$("#rpmessage1").css("display","block").html("两次输入密码不一致");
					$("#pmessage2,#rpmessage2").css("display","block").addClass("glyphicon-remove").removeClass("glyphicon-ok");
					$("#divpasswordzc,#divrepasswordzc").addClass("has-error").removeClass("has-success");

				}else{
					error['passwordzc']=0;
					$("#rpmessage1").css("display","none").html("");
					$("#pmessage2,#rpmessage2").css("display","block").addClass("glyphicon-ok").removeClass("glyphicon-remove");
					$("#divpasswordzc,#divrepasswordzc").addClass("has-success").removeClass("has-error");
				}
			}else{
				$("#passwordzc").blur(function(){
					$("#rpmessage1").css("display","none");
					//$("#pmessage2,#rpmessage2").css("display","none");
					$("#pmessage2,#rpmessage2").removeClass("glyphicon-ok glyphicon-remove");
					$("#divpasswordzc,#divrepasswordzc").removeClass("has-success has-error");
				});
				
			}
		})

		//检验验证码


		//提交注册表单
		$("#submitZc").click(function(){
			if(error['usernamezc']==0&&error['passwordzc']==0){

				if($("#code").val()==""){
					
					$("#cmessage1").css("display","block").html("验证码必填");
					$("#cmessage2").css("display","block").addClass("glyphicon-warning-sign");
					$("#divcode").addClass("has-warning");

				}else{
					$("#registerForm").submit();
				}

			}else{
				return false;
			}
			
		})

		//显示学校信息
		$("#schooldisplay").click(function(){

			var map = new BMap.Map("allmap");
			map.centerAndZoom(new BMap.Point(114.025974, 22.546054),11);
			map.addControl(new BMap.MapTypeControl());
			map.setCurrentCity("深圳");
			map.enableScrollWheelZoom(true);

			var top_left_navigation = new BMap.NavigationControl();	//左上角添加默认缩放平移控件
			var bottom_right_control = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT});//右下角，添加比例尺
			map.addControl(top_left_navigation);
			map.addControl(bottom_right_control);

			$.get('/bmap1/index.php/Home/School/schoolInfo',function(data){
		
				var obj=eval("("+data+")");				
				for(var i=0;i<obj.length;i++){
					var location=obj[i].location[0].st_astext;
					var x=location.substring(location.indexOf("(")+1,location.indexOf(" "));
					var y=location.substring(location.indexOf(" ")+1,location.indexOf(")"));
					marker[i]=new BMap.Marker(new BMap.Point(x,y));

					map.addOverlay(marker[i]);

					var schoolname=obj[i].schoolname;
					var schooltype=obj[i].schooltype;
					var address=obj[i].address;
					var district=obj[i].district;
					var hostedtype=obj[i].hostedtype;
					var tel=obj[i].tel;
					var website=obj[i].website;
					
					var title=obj[i].schoolname;

					var content="<p>"+schoolname+"</p><p>"+schooltype+'/'+hostedtype+"</p><span class='glyphicon glyphicon-map-marker'></span><p>"+address+"</p><span class='glyphicon glyphicon-phone-alt'></span><p>"+tel+"</p><p><span class='glyphicon glyphicon-home'></span><a onclick=window.location.href=this.innerHTML>"+website+"</a></p>";
					
						//window.location.href=this.innerHTML;

					var opts={
						width:200,						
						/*title:'学校基本信息',*/
						panel : "panel", //检索结果面板
						enableAutoPan:true,
						enableCloseOnClick:true,						
					};


					infoWindow[i] = new BMap.InfoWindow(content,opts);

					marker[i].addEventListener("mouseover", (function(k){

						// js 闭包

						return function(){
							marker[k].openInfoWindow(infoWindow[k]);

						}

					})(i));


				}
			
			})
			

		})

		//回到首页
		$("#shouye").click(function(){
			var map = new BMap.Map("allmap");
			map.centerAndZoom(new BMap.Point(114.025974, 22.546054),11);

			map.addControl(new BMap.MapTypeControl());
			map.setCurrentCity("深圳");
			map.enableScrollWheelZoom(true);

			var top_left_navigation = new BMap.NavigationControl();	//左上角添加默认缩放平移控件
			var bottom_right_control = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT});//右下角，添加比例尺
			map.addControl(top_left_navigation);
			map.addControl(bottom_right_control);
			
			map.clearOverlays();
			map.reset();

		})


		//点击切换到在建项目
		/*$("#project").click(function(){
			window.location='/bmap/index.php/Home/Projects/index';
		})*/

		//点击切换到建议规划学校
		/*$("#suggest").click(function(){
			alert(123);
		})*/

		//鼠标移到在建项目每行的高亮变换
	/*	$("#protable").children("tr").click(function(){
			alert(123);
		})*/


	})//$(function(){

}

$(function(){
	$("#protable").children("tr").hover(function(){
		$(this).addClass("info");
	},function(){
		$(this).removeClass("info");
	})

	/*表头高宽会随分页跳动，直接固定死*/
	$("#protitlecenter").children("tr").children("th").css({
		"text-align":"center",
		"width":"80px",
		"height":"60px",
	});

	$("#protable").children("tr").children("td").css("height","80px");





})


/**
*自定义搜索提交
**/
function findSearch(){
	//alert($(".test")[1].value);
	//ajax get

	var searchInfo=$(".test")[1].value;
	if(searchInfo!=""){
		
		$.get('/bmap1/index.php/Home/School/searchSchool',{'searchInfo':searchInfo},function(data){
			if(data==0){
				return false;
			}else{
				var map = new BMap.Map("allmap");
				map.centerAndZoom(new BMap.Point(114.025974, 22.546054),11);

				map.addControl(new BMap.MapTypeControl());
				map.setCurrentCity("深圳");
				map.enableScrollWheelZoom(true);

				var top_left_navigation = new BMap.NavigationControl();	//左上角添加默认缩放平移控件
				var bottom_right_control = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT});//右下角，添加比例尺
				map.addControl(top_left_navigation);
				map.addControl(bottom_right_control);


									
				var marker = new Array();
				var infoWindow = new Array();
				var obj=eval("("+data+")");
				
				for(var i=0;i<obj.length;i++){

					var location=obj[i].location[0].st_astext;
					var x=location.substring(location.indexOf("(")+1,location.indexOf(" "));
					var y=location.substring(location.indexOf(" ")+1,location.indexOf(")"));
					marker[i]=new BMap.Marker(new BMap.Point(x,y));

					
					map.addOverlay(marker[i]);

					var schoolname=obj[i].schoolname;
					var schooltype=obj[i].schooltype;
					var address=obj[i].address;
					var district=obj[i].district;
					var hostedtype=obj[i].hostedtype;
					var tel=obj[i].tel;
					var website=obj[i].website;

					
					var title=obj[i].schoolname;

					var content="<p>"+schoolname+"</p><p>"+schooltype+'/'+hostedtype+"</p><span class='glyphicon glyphicon-map-marker'></span><p>"+address+"</p><span class='glyphicon glyphicon-phone-alt'></span><p>"+tel+"</p><p><span class='glyphicon glyphicon-home'></span><a onclick=window.location.href=this.innerHTML>"+website+"</a></p>";
					

					var opts={
						width:200,			
						/*title:'学校基本信息',*/
						panel : "panel", //检索结果面板
						enableAutoPan:true,
						enableCloseOnClick:true,
						
					};


					infoWindow[i] = new BMap.InfoWindow(content,opts);


					marker[i].addEventListener("mouseover", (function(k){

						// js 闭包

						return function(){
							marker[k].openInfoWindow(infoWindow[k]);

						}

					})(i));
				
				}

			}





		})
	}else{
		return false;
	}

}


//禁用回车键查询
function noaction(){
	if(window.event.keyCode==13){
		//alert(11);
		window.location.href="/bmap1/index.php/Home/Login/loginbefore";
	}
	
}

