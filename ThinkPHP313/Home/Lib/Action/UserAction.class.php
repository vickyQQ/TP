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
    	$this->display();
    }

    public function insert(){
    	$user=M('user');
    	$user->create();
    	/*echo '<pre>';
    	print_r($user);
    	echo '</pre>';*/
    	if($user->add()){
    		//echo $user->getLastSql();
    		$this->success('添加成功',U('index'));
    	}
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
    	$num=$user->delete($id);
    	if($num){
    		$this->success('删除成功',U('index'));
    		//重定向 直接跳转
    		//$this->redirct('index');
    	}else{
    		$this->error('删除失败',U('index'));
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
}