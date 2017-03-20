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
	<h1 class="page-header">第一个boot表格</h1>
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>编号</th>
			<th>姓名</th>
			<th>密码</th>
			<th></th>
		</tr>
		<?php if(is_array($row)): $i = 0; $__LIST__ = $row;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($vo["id"]); ?></td>
			<td><?php echo ($vo["uname"]); ?></td>
			<td><?php echo ($vo["upwd"]); ?></td>
			<!-- <td><a id='del' href="<?php echo U('User/delete',array('id'=>$vo['id']));?>">删除</a></td> -->
			<td><a id='<?php echo ($vo['id']); ?>' href="javascript:;" class="btn btn-danger del">删除</a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	
	
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