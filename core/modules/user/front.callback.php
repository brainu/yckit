<?php
if(!defined('ROOT'))exit('Access denied!');
if($this->do=='callback'){
    $user->qq_callback();
    $user->qq_openid();
    $user->qq_info();
    $row=$this->db->row("SELECT * FROM ".DB_PREFIX."user WHERE open_id='".$_SESSION['qq_openid']."'");
    if($row){
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['user_login']=$row['user_login'];
        $_SESSION['user_nickname']=$row['user_nickname'];
        $_SESSION['role_id']=$row['role_id'];
        $_SESSION['open_id']=$_SESSION['qq_openid'];
        //$user->qq_avatar($_SESSION['user_id']);
        redirect(isset($_SESSION['REFERER'])?$_SESSION['REFERER']:PATH); 
    }else{
        $array=array();
        $array['user_login']='';
        $array['user_key']='';
        $array['user_nickname']=$_SESSION['qq_nickname'];
        $array['user_join_time']=$_SERVER['REQUEST_TIME'];
        $array['user_status']=1;
        $array['user_login_time']=$_SERVER['REQUEST_TIME'];
        $array['user_login_ip']=get_ip();
        $array['role_id']=0;
        $array['open_id']=$_SESSION['qq_openid'];
        $this->db->insert(DB_PREFIX."user",$array);
        $user_id=$this->db->id();
        $_SESSION['user_id']=$user_id;
        $_SESSION['user_login']='';
        $_SESSION['user_nickname']=$_SESSION['qq_nickname'];
        $_SESSION['role_id']=0;
        $_SESSION['open_id']=$_SESSION['qq_openid'];
        $user->qq_avatar($user_id);
        redirect(isset($_SESSION['REFERER'])?$_SESSION['REFERER']:PATH); 
    }
}