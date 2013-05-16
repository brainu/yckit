<?php
if(!defined('ROOT'))exit('Access denied!');
if($this->do=='login'){
	check_request();
	$this->template->template_dir='core/modules/user/templates/front';
	$this->template->out("user.login.php");
}
if($this->do=='login-check'){
	check_request();
	$user_login=empty($_POST['user_login'])?'':trim(addslashes($_POST['user_login']));
	$user_key=empty($_POST['user_key'])?'':md5($_POST['user_key']);
	if(empty($user_login))die('帐号不能为空');
	if(empty($user_key))die('密码不能为空');
	if(is_email($user_login)){
		$sql="SELECT * FROM ".DB_PREFIX."user WHERE user_login='".$user_login."' and user_key='".$user_key."'";
	}else{
		$sql="SELECT * FROM ".DB_PREFIX."user WHERE user_nickname='".$user_login."' and user_key='".$user_key."'";
	}
	$row=$this->db->row($sql);
	if($row){
		if(!empty($row['open_id']))echo('您不是网站注册会员，请使用第三方登陆！');
		if($row['user_status']==0)echo('账户可能锁定或者没有激活！');
		$_SESSION['user_id']=$row['user_id'];
		$_SESSION['user_login']=$row['user_login'];
		$_SESSION['user_nickname']=$row['user_nickname'];
		$_SESSION['role_id']=$row['role_id'];
		$update=array();
		$update['user_login_time']=time();
		$update['user_login_ip']=get_ip();
		$this->db->update(DB_PREFIX."user",$update,"user_id='".$row['user_id']."'");
	}else{
		die('账户登录失败');
	}
	exit;
}
if($this->do=='logout'){
	unset($_SESSION['user_id'],$_SESSION['user_login'],$_SESSION['user_nickname'],$_SESSION['role_id']);
}