<?php
if(!defined('ROOT'))exit('Access denied!');
$avatar_size=isset($this->config['user_front_avatar_size'])?$this->config['user_front_avatar_size']:10;
$array=array();
$result=$this->db->result("SELECT user_id,user_nickname,user_join_time FROM `db_user` WHERE user_status=1 ORDER BY user_join_time DESC LIMIT $avatar_size");
if($result){
	foreach($result as $row){
		if(!file_exists("data/user/".$row['user_id'].".jpg")||$row['user_id']==0){
			$array[$row['user_id']]['avatar']=PATH.'core/images/avatar.jpg';	
		}else{
			$array[$row['user_id']]['avatar']=PATH.'data/user/'.$row['user_id'].'.jpg';
		}
		$array[$row['user_id']]['nickname']=$row['user_nickname'];
		$array[$row['user_id']]['join_time']=$row['user_join_time'];
	}
}
$this->template->in('user_join',$array);