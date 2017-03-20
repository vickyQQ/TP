<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends Action {
    public function index(){
		$user=M('user');
		$rs=$user->select();
		$this->assign('row',$rs);
		$this->display();
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