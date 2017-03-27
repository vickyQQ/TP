<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.min.css">
	<script src="__PUBLIC__/js/jquery.js"></script>
	<title>Document</title>
</head>
<body>
<div class="container">
	<h1 class="page-header">添加用户</h1>
	<form action="__URL__/insert" method="post">
		<div class="form-group">
			<label>用户名：</label>
			<input type="text" name="uname" class="form-control">
		</div>
		<div class="form-group">
			<label>密码：</label>
			<input type="password" name="upwd" class="form-control">
		</div>
		<div class="form-group">
		</div>
		<div class="form-group">
			<input type="submit" value="提交" class="btn btn-primary">
			<input type="reset" value="取消" class="btn btn-danger">
		</div>
	</form>
	
	
</div>	
<script type="text/javascript">
	$('.del').click(function(){
		id=$(this).attr('id');
		obj=$(this);
		$.get('__URL__/drop',{'id':id},function(data){
			if(data==1){
				obj.parent().parent().hide(500);
			}
		})
	})
</script>
</body>
</html>