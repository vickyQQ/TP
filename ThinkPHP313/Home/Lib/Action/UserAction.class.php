<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends Action {
    public function index(){
		$user=M('user');
		$rs=$user->order('id desc')->field('id,uname,upwd')->where('1=1')->limit('0,100')->select();
		//$rs=$user->order('id desc')->getField('id,uname,upwd');
		//$rs=$user->find();
		$this->assign('row',$rs);
		$this->display();
    }

    public function add(){
    	$this->display();
    }

    public function insert(){
    	$user=M('user');
    	$user->create();
    	echo '<pre>';
    	print_r($user);
    	echo '</pre>';
    	if($user->add()){
    		echo $user->getlastSQL();
    		//$this->success('添加成功',U('index'));
    	}
    }

    public function edit(){

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

    public function drop(){
    	$id=$_GET['id'];
    	$user=M('user');
    	if($user->delete($id)){
    		echo 1;
    	}
    }
}