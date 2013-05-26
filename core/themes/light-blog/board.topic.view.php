<?php exit?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<meta name="author" content="<!--{$config.author|escape:html}-->" />
<meta name="keywords" content="<!--{$config.keywords|escape:html}-->" />
<meta name="description" content="<!--{$config.description|escape:html}-->" />
<meta name="copyright" content="Powered by YCKIT" />
<title><!--{$topic.title|escape:html}--> - <!--{$config.title|escape:html}--></title>
<!--{include file="static.php"}-->
<script type="text/javascript" src="<!--{$path}-->core/scripts/jquery.lightbox.js"></script>
<link rel="stylesheet" type="text/css" href="<!--{$path}-->core/styles/jquery.lightbox.css" />
<?php echo $this->hook('board_static');?>
<script type="text/javascript">
jQuery(function(){
	$("#menu-4").addClass("current");
	$('.content img').wrap(function(){return "<a href='"+$(this).attr('src')+"' rel='lightbox'></a>";});
	$('code').addClass('prettyprint');
	<?php echo $this->hook('onload');?>
});
function check_reply(){
	var reply_content=$('#reply_content').val();
	if($.trim(reply_content)==''){
		alert('内容不能为空');
		$('#reply_content').focus();
		return false;
	}
	if(reply_content.length<5){
		alert('内容长度不能小于5');
		$('#reply_content').focus();
		return false;
	}
	return true;
}

</script>
</head>
<body>
	<div id="page">
<!--{$header}-->
 
<h2 class="topic-view-title">
<div class="floatright"><!--{if $topic.view_count>0}-->已浏览<!--{$topic.view_count}-->次<!--{/if}--></div>
主题:<!--{$topic.title|escape:html}-->
</h2>

<div  class="topic-view-item">
	<div class="topic-view-left floatleft">
		<img src="<!--{$topic.avatar}-->" class="topic-view-avatar"/> 
	</div>
	<div class="topic-view-right">
		<div class="topic-view-meta">
			<div class="floatright topic-view-meta-button">楼主</div>
			<b><!--{$topic.author}--></b> 发表于<!--{$topic.start_time}-->
			来自<!--{$topic.ip_address}-->
			<!--{if $template.session.admin_id||$topic.user_id==$template.session.user_id||$board_info.admin==$template.session.user_nickname}-->
			 <a href="javascript:void(edit_topic(<!--{$topic.id}-->));">编辑</a>
			 <!--{/if}-->
			<!--{if $template.session.admin_id}-->
				 <a href="<!--{$path}-->board.php?action=topic_delete&topic_id=<!--{$topic.id}-->">删除</a>
				<!--{if $topic.status==1}-->
				<a href="<!--{$path}-->board.php?action=topic_top&topic_id=<!--{$topic.id}-->&mode=1">置顶</a>
				<!--{elseif $topic.status==2}-->
				 <a href="<!--{$path}-->board.php?action=topic_top&topic_id=<!--{$topic.id}-->" class="label">取消置顶</a>
				<!--{/if}-->
			<!--{/if}-->
		</div>
		<!--{if $config.board_front_view_login==1}-->
			<!--{if $template.session.user_id>0}-->
 				<div class="topic-view-content"><!--{$topic.content}--></div>
 			<!--{else}-->
 				<p class="alert">提示：您没有查看主题内容的权限！</p>
 			<!--{/if}-->
 		<!--{else}-->
 			<div class="topic-view-content"><!--{$topic.content}--></div>
 
 		<!--{/if}-->
		
</td>
	</div>
	<br class="clear" />
</div>

 
 
<!--{if $reply}-->
	<!--{foreach from=$reply item=reply}-->
<div  class="reply-view-item">
	<div class="topic-view-left floatleft">
		<img src="<!--{$reply.avatar}-->" class="topic-view-avatar"/> 
	</div>
	<div class="topic-view-right">
		<div class="topic-view-meta">
			<div class="floatright topic-view-meta-button">第<!--{$reply.no}-->楼</div>
			<b><!--{$reply.author}--></b> 发表于<!--{$reply.time}-->
			来自<!--{$reply.ip_address}-->
			<!--{if $template.session.admin_id||$reply.user_id==$template.session.user_id||$board_info.admin==$template.session.user_nickname}-->
				<a href="javascript:void(edit_reply({$reply.id}))">编辑</a>
			<!--{/if}-->
			<!--{if $template.session.admin_id}-->
				<a href="<!--{$path}-->board.php?action=reply_delete&reply_id=<!--{$reply.id}-->" >删除</a>
			<!--{/if}-->
		</div>
		<!--{if $config.board_front_view_login==1}-->
			<!--{if $template.session.user_id>0}-->
 				<div class="topic-view-content"><!--{$topic.content}--></div>
 			<!--{else}-->
				<p class="alert">提示：您没有查看主题内容的权限！</p>
			<!--{/if}-->
		<!--{else}-->
 			<div class="topic-view-content"><!--{$reply.content}--></div>
 		<!--{/if}-->
</td>
	</div>
	<br class="clear" />
</div>
<!--{/foreach}-->
 

<!--{/if}-->

<table  cellspacing="0" cellpadding="0" width="100%" class="table">
<tr>
<td>
<!--{if $pager}-->
<div class="pager">
<ul>
<!--{if $pager.begin}-->
<li><a href="<!--{if $config.board_rewrite==1}--><!--{$path}-->topic/<!--{$topic.id}-->/page/<!--{$pager.begin}-->/<!--{else}--><!--{$path}-->board.php?id=<!--{$topic.id}-->&page=<!--{$pager.begin}--><!--{/if}-->">&laquo;</a></li>
<!--{else}-->
	<li class="disabled"><a>&laquo;</a></li>
<!--{/if}-->

<!--{foreach from=$pager.no key=key item=href}-->
<!--{if $pager.current==$key}--><li class="active"><a><!--{$key}--></a></li>
<!--{else}-->
<li>
	<a href="<!--{if $config.board_rewrite==1}--><!--{$path}-->topic/<!--{$topic.id}-->/page/<!--{$href}-->/<!--{else}--><!--{$path}-->board.php?id=<!--{$topic.id}-->&page=<!--{$href}--><!--{/if}-->"><!--{$key}--></a></li>
<!--{/if}-->
<!--{/foreach}-->

<!--{if $pager.end}--><li>
	<a href="<!--{if $config.board_rewrite==1}--><!--{$path}-->topic/<!--{$topic.id}-->/<!--{$pager.end}-->/<!--{else}--><!--{$path}-->board.php?id=<!--{$topic.id}-->&page=<!--{$pager.end}--><!--{/if}-->">&raquo;</a>
	</li>
<!--{else}-->
	<li class="disabled"><a>&raquo;</a></li>
<!--{/if}-->
</ul>
</div>
<!--{/if}-->
</td>
<td width="300" align="right">
<!--{if $template.session.user_id&&$board_reply_status&&$template.session.user_login!='-'}-->
<a class="btn" href="javascript:void(add_reply({$topic.id}))">回复帖子</a>
<!--{/if}-->
<a class="btn" href="<!--{if $config.board_rewrite==1}--><!--{$path}-->board/<!--{$topic.board_id}-->/<!--{else}--><!--{$path}-->board.php?id=<!--{$topic.board_id}--><!--{/if}-->">返回列表</a>
</td>
</tr>
</table>
<!--{$footer}-->
</div>
</body>
</html>