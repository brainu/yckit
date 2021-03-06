<?php
if(!defined('ROOT'))exit('Access denied!');
if($this->do=='plugin'){
	$this->check_access('global_plugin');
	$array=array();
	if($handle=opendir("core/plugins/")){
		while(false!==($dir=readdir($handle))){
			if ($dir!="."&&$dir!=".."&&is_dir(ROOT.'/core/plugins/'.$dir)){
				$info=@include(ROOT.'/core/plugins/'.$dir.'/info.php');
				if(!empty($info)){
					$info['install']=in_array($dir,$this->get_plugins());
					$info['dir']=$dir;
					$info['config']=is_file(ROOT.'/core/plugins/'.$dir.'/config.php');
					$array[]=$info;
				}
			}
		}
		closedir($handle);
	}
	$this->template->in("plugin_list",$array);
	$this->template->out('global.plugin.php');
}
if($this->do=='plugin_config'){
	$this->check_access('global_plugin');
	$dir=empty($_REQUEST['dir'])?'':trim($_REQUEST['dir']);
	if($_POST){
		@include(ROOT.'/core/plugins/'.$dir.'/config.php');
		redirect('?action=global&do=plugin');
	}
	$this->template->template_dir=ROOT.'/core/plugins/'.$dir;
	$this->template->out("config.template.php");
}
if($this->do=='plugin_install'){
	$this->check_access('global_plugin');
	$dir=empty($_GET['dir'])?'':trim($_GET['dir']);
 	$plugins=$this->get_plugins();
	$plugins[]=$dir;
	$plugins=implode("|",$plugins);
 	$this->db->update(DB_PREFIX."config","config_value='".$plugins."'","config_type='plugins'");
	clear_cache();
}
if($this->do=='plugin_uninstall'){
	$this->check_access('global_plugin');
	$dir=empty($_GET['dir'])?'':trim($_GET['dir']);
  	$plugins=$this->get_plugins();
 	$plugins=array_diff($plugins,array($dir));
 	$plugins=implode("|",$plugins);
 	$this->db->update(DB_PREFIX."config","config_value='".$plugins."'","config_type='plugins'");
	clear_cache();
}