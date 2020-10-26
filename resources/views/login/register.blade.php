<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>个人注册</title>


    <link rel="stylesheet" type="text/css" href="/reception/css/webbase.css" />
	<link rel="stylesheet" type="text/css" href="/reception/css/pages-register.css" />
	<script src="./jquery.js"></script>
</head>

<body>
	<div class="register py-container ">
		<!--head-->
		<div class="logoArea">
			<a href="" class="logo"></a>
		</div>
		<!--register-->
		<div class="registerArea">
			<h3>注册新用户<span class="go">我有账号，去<a href="login.html" target="_blank">登陆</a></span></h3>
			<div class="info">
				<form class="sui-form form-horizontal" action="{{url('registeradd')}}" method="POST" >
					@csrf
					<div class="control-group">
						<label class="control-label">用户名：</label>
						<div class="controls">
							<input type="text" placeholder="用户名/手机号/email" name="user_name" class="input-xfat input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">登录密码：</label>
						<div class="controls">
							<input type="password" placeholder="设置登录密码" name="password" class="input-xfat input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">确认密码：</label>
						<div class="controls">
							<input type="password" placeholder="再次确认密码" name="passwords" class="input-xfat input-xlarge">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">手机号：</label>
						<div class="controls">
							<input type="text" placeholder="请输入你的手机号" name="user_tel" class="input-xfat input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">email：</label>
						<div class="controls">
							<input type="text" placeholder="请输入你的email" id="email" name="email" class="input-xfat input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">短信验证码：</label>
						<div class="controls">
							<input type="text" placeholder="短信验证码" name="note" class="input-xfat input-xlarge">  <a href="#">获取短信验证码</a>
						</div>
					</div>
					
					<div class="control-group">
						<label for="inputPassword" class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<div class="controls">
							<input name="m1" type="checkbox" value="2" checked=""><span>同意协议并注册《品优购用户协议》</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls btn-reg">
							<button class="sui-btn btn-block btn-xlarge btn-danger" href="submit" target="_blank">完成注册</button>
						</div>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
		<!--foot-->
		<div class="py-container copyright">
			<ul>
				<li>关于我们</li>
				<li>联系我们</li>
				<li>联系客服</li>
				<li>商家入驻</li>
				<li>营销中心</li>
				<li>手机品优购</li>
				<li>销售联盟</li>
				<li>品优购社区</li>
			</ul>
			<div class="address">地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</div>
			<div class="beian">京ICP备08001421号京公网安备110108007702
			</div>
		</div>
	</div>


<script type="text/javascript" src="/reception/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/reception/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/reception/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/reception/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/reception/js/pages/register.js"></script>
</body>
<script>
	$(function(){
        $(document).on("blur","#email",function(){
			var _this = $(this)
			_email = _this.val()
			var reg = /^[0-9a-z]{6,16}@[a-z0-9]$/
			if(_email == ''){
				alert('邮箱必填')
			}else if(!reg.test(_email)){
				alert('邮箱格式有误')
			}
		})
    })
</script>
</html>