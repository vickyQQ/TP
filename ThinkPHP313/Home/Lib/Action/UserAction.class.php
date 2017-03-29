<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends Action {
    public function index(){
		$user=M('user');
		$rs=$user->order('id desc')->field('id,uname,upwd')->where('1=1')->limit('0,100')->select();
		/*其他查询方法*/
		//$rs=$user->field('id',true)->select();//字段排除，除了id其他字段都查询出来
		//$rs=$user->order('id desc')->getField('id,uname,upwd');
		//$rs=$user->find();//查询单行
		//$rs=$user->count();//查询出总数
		$this->assign('row',$rs);
		$this->display();
    }

    public function add(){
    	//print_r($_SESSION); TP里面的方法已经默认开启了session
    	$this->display();
    }

    public function insert(){

    	$user=D('User'); //用D方法表名首字母需要大写
    	//var_dump($user->create());exit;
    	if($user->create()){
    		$user->add();
    		echo "添加成功";
    	}else{
    		print_r($user->getError());
    	}

    	/*if($user->add()){
    		//echo $user->getLastSql();
    		$this->success('添加成功',U('index'));
    	}*/
    }

    public function edit(){
    	$user=M('user');
    	$row=$user->find($_GET['id']);
    	$this->assign('row',$row);
    	$this->display();
    }

    public function update(){
    	$user=M('user');
    	$user->create();
    	if($user->save()){
    		$this->success('修改成功',U('index'));
    	}else{
    		$this->error('没有修改',U('index'));
    	}
    	//echo $user->getLastSql();
    }

    public function delete(){
    	$id=$_GET['id'];
    	$user=M('user');
    	//$num=$user->delete($id);
    	//事务机制
    	$user->startTrans();
    	$num=$user->delete(17);
    	$num=$user->delete(aa);
    	if($num){
    		$user->commit();
    		echo '删除成功';
    		//$this->success('删除成功',U('index'));
    		//重定向 直接跳转
    		//$this->redirct('index');
    	}else{
    		$user->rollback();
    		echo '删除失败';
    		//$this->error('删除失败',U('index'));
    		
    	}
    }
    //用于jquery数据返回
    public function drop(){
    	$id=$_GET['id'];
    	$user=M('user');
    	if($user->delete($id)){
    		echo 1;
    	}
    }

    public function vcode(){
    	import('ORG.Util.Image');
    	Image::buildImageVerify();
    }
}