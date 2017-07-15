Thinkphp3.1.3
一、文件
全局配置文件
Thinkphp/Conf/convention.php
全局函数文件
Thinkphp/Common/common.php
应用函数文件
Home/Common/common.php

二、控制器
1、跨模块调用
1)A	在类中调用自定义类(手册->控制器->跨模块调用)
A('Person');
2)R	在类中直接调用自定义类中的方法
R('Person/say')

2、URL生成 (U方法用于完成对URL地址的组装，特点在于可以自动根据当前的URL模式和设置生成对应的URL地址)
U('[分组/模块/操作]?参数' [,'参数','伪静态后缀','是否跳转','显示域名'])
<!--在控制器中使用U方法 -->
//比如操作成功跳转到Store模块下的Ump控制器中的lists方法
 $this->success('新增成功',U('Strore/Ump/lists'));
//跳转时带着参数的话
 $this->success('新增成功',U('Store/Ump/lists','type=1&id=1'));
<!--在模板中使用U方法 -->
{:U('Store/Ump/lists','type=1&id=1')}
{:U('Article/index','category='.$vo['name'])}
{:U('User/delete',array('id'=>$vo['id']))}

三、事务机制
$user->startTrans();
$num=$user->delete(17);
$num=$user->delete(aa);
if($num){
	$user->commit();
	echo '删除成功';	
}else{
	$user->rollback();
}

四、模板
(一)、包含文件
1、文件包含<include file='Public:header' />//包含Public文件夹下的header文件。特别注意a、这里的冒号只是目录的意思，不是使用函数
模板中使用函数前面要加冒号；b、TP模板采用XML语法标签，因此单标签要求要闭合，即在标签后面加斜线 '/>'。
2、js包含 
例<script src="../public/js/index.js"></script>
在index.js文件里面有模板变量，但是在tp模板里无法做解析，因此最好不要在外部js文件中写模板变量。
如果一定要写，有个解决办法
<script>color='<{$color}>';</script>
然后再在下面加载外部js文件。
(二)、冒号
使用函数的时候前面才加:
<{:U('Home/Index/index')}>
(三)、模板默认值输出
{$user.nickname|default="这家伙很懒，什么也没留下"}
(四)、三元运算
{$user.nickname?$user.nickname:"这家伙很懒，什么也没留下"}

五、空模块处理
防止输入不存在的控制器名称暴露出程序错误提示，可以根据TP的核心文件已有对empty的处理，新建控制器来调用
empty控制器和方法都会被自动调用
1、新建一个EmptyController.class.php
2、建立function _empty(){} 方法即可