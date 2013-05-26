<?php exit?>
<!--{include file="header.php"}-->
<div class="layout-box">
	<div class='layout-title'>讨论模块设置</div>
	<div class='layout-body'>
	<div class="blank"></div>
	<form action="?action=board&do=config_update" method="post" enctype="multipart/form-data">

	<fieldset>
	<legend>开关控制</legend>
	<table cellspacing="10">
	<tr>
	<td width="120">Rewrite路径优化:</td>
	<td>
	<label><input  onclick="$('#rewrite').toggle()" type="checkbox" name="board_rewrite" size="15" value="1" {if $config.board_rewrite==1}checked{/if}/> 启用</lable>
	</td>
	</tr>
<tr id="rewrite" {if $config.board_rewrite!=1}style="display:none"{/if}>
	<td width="120"></td>
	<td>
 
		<fieldset>
	<legend>Apache的规则：保存为.htaccess后放到根目录</legend>	
		<pre>
RewriteEngine on
Options All -Indexes

RewriteRule ^board/$ /board.php
RewriteRule ^board/([0-9]+)/$ /board.php?id=$1
RewriteRule ^board/page/([0-9]+)/$ /board.php?page=$1
RewriteRule ^board/([0-9]+)/page/([0-9]+)/$ /board.php?id=$1&page=$2
RewriteRule ^topic/([0-9]+)/$ /board.php?tid=$1
RewriteRule ^topic/([0-9]+)/page/([0-9]+)/$ /board.php?tid=$1&page=$2
		</pre>
		</fieldset>

		<fieldset>
	<legend>Nginx的规则：请插入到Nginx配置文件</legend>	
		<pre>
rewrite ^/board/$ /board.php;
rewrite ^/board/([0-9]+)/$ /board.php?id=$1;
rewrite ^/board/page/([0-9]+)/$ /board.php?page=$1;
rewrite ^/board/([0-9]+)/page/([0-9]+)/$ /board.php?id=$1&page=$2;
rewrite ^/topic/([0-9]+)/$ /board.php?tid=$1;
rewrite ^/topic/([0-9]+)/page/([0-9]+)/$ /board.php?tid=$1&page=$2;
		</pre>
		</fieldset>


		<fieldset>
	<legend>IISrewrite的规则：请保存为httpd.ini</legend>	
		<pre>
[ISAPI_Rewrite]
CacheClockRate 3600
RepeatLimit 32

RewriteRule ^board/$ /board.php [L]
RewriteRule ^board/([0-9]+)/$ /board\.php\?id=$1 [L]
RewriteRule ^board/page/([0-9]+)/$ /board\.php\?page=$1 [L]
RewriteRule ^board/([0-9]+)/page/([0-9]+)/$ /board\.php\?id=$1&amppage=$2 [L]
RewriteRule ^topic/([0-9]+)/$ /board.php?tid=$1
RewriteRule ^topic/([0-9]+)/page/([0-9]+)/$ /board\.php\?tid=$1&page=$2 [L]
		</pre>
		</fieldset>
	</td>
	</tr>
	<tr>
	<td width="120">主题发布状态:</td>
	<td>
	<label><input type="checkbox" name="board_front_topic_status" size="15" value="1" {if $config.board_front_topic_status==1}checked{/if}/> 启用</lable>
	</td>
	</tr>

	<tr>
	<td width="120">登陆查看主题:</td>
	<td>
	<label><input type="checkbox" name="board_front_view_login" size="15" value="1" {if $config.board_front_view_login==1}checked{/if}/> 启用</lable>
	</td>
	</tr>

	<tr>
	<td width="120">登陆查看附件:</td>
	<td>
	<label><input type="checkbox" name="board_front_attachment_login" size="15" value="1" {if $config.board_front_attachment_login==1}checked{/if}/> 启用</lable>
	</td>
	</tr>

	</table>
	</fieldset>
	<fieldset>
	<legend>前台设置</legend>
	<table cellspacing="10">
	<tr>
	<td width="120">主题显示条数:</td>
	<td><input x-webkit-speech class="input" type="number" name="board_front_topic_size" size="15" value="{$config.board_front_topic_size}"/></td>
	</tr>
	<tr>
	<td width="120">回复显示条数:</td>
	<td><input x-webkit-speech class="input" type="number" name="board_front_reply_size" size="15" value="{$config.board_front_reply_size}"/></td>
	</tr>
	<tr>
	<td width="120">附件上传大小:</td>
	<td><input x-webkit-speech class="input" type="number" name="board_front_attachment_size" size="15" value="{$config.board_front_attachment_size}"/> MB</td>
	</tr>

	<tr>
	<td width="120">附件上传格式:</td>
	<td><input x-webkit-speech class="input" type="text" name="board_front_attachment_ext" size="40" value="{$config.board_front_attachment_ext}"/></td>
	</tr>
	<tr>
	<td width="120">发帖时间间隔:</td>
	<td><input x-webkit-speech class="input" type="number" name="board_front_topic_interval" size="15" value="{$config.board_front_topic_interval|default:10}"/> 分钟</td>
	</tr>

	<tr>
	<td width="120">注册多久后可发帖:</td>
	<td><input x-webkit-speech class="input" type="number" name="board_front_join_interval" size="15" value="{$config.board_front_join_interval|default:30}"/> 分钟</td>
	</tr>
	<!--
	<tr>
	<td width="120">非法字符串过滤:</td>
	<td><textarea class="textarea"  name="board_front_badchars" style="width:300px;height:80px;">{$config.board_front_reply_size}</textarea></td>
	</tr>
	-->

	</table>
	</fieldset>


	<fieldset>
	<legend>积分设置</legend>
	<table cellspacing="10">
	<tr>
	<td width="120">发布主题获得积分:</td>
	<td>
	<label><input x-webkit-speech class="input" type="number" name="board_topic_post_point" size="15" value="{$config.board_topic_post_point|default:2}"/></lable>
	</td>
	</tr>
	<tr>
	<td width="120">删除主题扣除积分:</td>
	<td>
	<label><input x-webkit-speech class="input" type="number" name="board_topic_delete_point" size="15" value="{$config.board_topic_delete_point|default:2}"/></lable>
	</td>
	</tr>
	<tr>
	<td width="120">发布回帖获得积分:</td>
	<td>
	<label><input x-webkit-speech class="input" type="number" name="board_reply_post_point" size="15" value="{$config.board_reply_post_point|default:1}"/></lable>
	</td>
	</tr>
	<tr>
	<td width="120">删除回帖扣除积分:</td>
	<td>
	<label><input x-webkit-speech class="input" type="number" name="board_reply_delete_point" size="15" value="{$config.board_reply_delete_point|default:1}"/></lable>
	</td>
	</tr>
	</table>
	</fieldset>
	<input type="submit" value=" 更新设置 " class="button" style="margin-left:170px;"/>
		</form>
	</div>
</div>