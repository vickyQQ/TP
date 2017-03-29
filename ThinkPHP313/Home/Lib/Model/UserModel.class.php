<?php
class UserModel extends Model{
	protected $patchValidate=true;
	protected $_validate = array(
	    array('uname','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
	    array('upwd','6-50','密码长度必须6位！',0,'length',1), // 密码验证
	    array('repassword','upwd','密码不一致！',0,'confirm',1), // 密码验证
	    //array('verify','require','验证码必须！'), 
	    array('verify','chkCode','验证码错误',0,'callback',1), // 密码验证
	);

	public function chkCode(){
		return md5(strtolower($_POST['verify']))==$_SESSION['verify'];
	}
}
?>