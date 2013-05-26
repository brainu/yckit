<?php exit?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<meta name="author" content="<!--{$config.author|escape:html}-->" />
<meta name="keywords" content="<!--{$config.keywords|escape:html}-->" />
<meta name="description" content="<!--{$config.description|escape:html}-->" />
<meta name="copyright" content="Powered by YCKIT" />
<title><!--{if $board_info.name}--><!--{$board_info.name}--> - <!--{/if}--><!--{$config.title|escape:html}--></title>
<!--{include file="static.php"}-->
<?php echo $this->hook('board_static');?>
<script>
$(function(){
	$("#menu-4").addClass("current");
	<?php echo $this->hook('onload');?>
});
</script>
</head>
<body>
	<div id="page">
<!--{$header}-->
<!--{if $topic||$topic_top}-->
<table id="topic-list" cellspacing="0" cellpadding="0">
<thead>
<tr>
<th class="avatar"></th>
<th class="title">主题</th>
<th class="count">回复/浏览</th>
<th class="update">最后发表</th>
</tr>
</thead>

<tbody class="top">

<!--{foreach from=$topic_top item=topic}-->
<tr id="topic-tr-<!--{$topic.id}-->">
<td class="avatar"><img src="<!--{$topic.avatar}-->"</td>
<td class="title">
	<a href="<!--{if $config.board_rewrite==1}--><!--{$path}-->topic/<!--{$topic.id}-->/<!--{else}--><!--{$path}-->board.php?tid=<!--{$topic.id}--><!--{/if}-->" class="topic-title"><!--{$topic.title|escape:html}--></a>
<!--{if $template.session.admin_id||$topic.user_id==$template.session.user_id||$board_info.admin==$template.session.user_nickname}-->
	<a href="javascript:void(edit_topic(<!--{$topic.id}-->));">编辑</a>
<!--{/if}-->
<!--{if $template.session.admin_id}-->
	<a href="javascript:void(delete_topic(<!--{$topic.id}-->))">删除</a>
<!--{/if}-->
<!--{if $template.session.admin_id||$board_info.admin==$template.session.user_nickname}-->
	<!--{if $topic.status==1}-->
	<a href="<!--{$path}-->board.php?action=topic_top&tid=<!--{$topic.id}-->&mode=1">设为置顶</a>
	<!--{elseif $topic.status==2}-->
	<a href="<!--{$path}-->board.php?action=topic_top&tid=<!--{$topic.id}-->" >取消置顶</a>
	<!--{/if}-->
<!--{/if}-->
	<br />
	[<!--{$topic.board_name}-->] <b><!--{$topic.author}--></b> 发表于<!--{$topic.start_time}--> 来自<!--{$topic.ip_address}-->
</td>
<td class="count"><!--{$topic.reply_count}-->/<!--{$topic.view_count}--></td>
<td class="update"><b><!--{$topic.update}--></b><br /><i><!--{$topic.time}--></i></td>
</tr>
<!--{/foreach}-->
</tbody>
<tbody>
<!--{foreach from=$topic item=topic}-->
<tr  bgcolor="{cycle values="#ffffff,#fbfbfb"}" id="topic-tr-<!--{$topic.id}-->">

<td class="avatar"><img src="<!--{$topic.avatar}-->"</td>
<td class="title">
	<a href="<!--{if $config.board_rewrite==1}--><!--{$path}-->topic/<!--{$topic.id}-->/<!--{else}--><!--{$path}-->board.php?tid=<!--{$topic.id}--><!--{/if}-->" class="topic-title"><!--{$topic.title|escape:html}--></a>
	<!--{if $topic.new}--><span class="new">NEW</span><!--{/if}-->

	<!--{if $template.session.admin_id||$topic.user_id==$template.session.user_id||$board_info.admin==$template.session.user_nickname}-->
	<a href="javascript:void(edit_topic(<!--{$topic.id}-->));">编辑</a>
<!--{/if}-->
<!--{if $template.session.admin_id}-->
	<a href="javascript:void(delete_topic(<!--{$topic.id}-->))">删除</a>
<!--{/if}-->
<!--{if $template.session.admin_id||$board_info.admin==$template.session.user_nickname}-->
	<!--{if $topic.status==1}-->
	<a href="<!--{$path}-->board.php?action=topic_top&tid=<!--{$topic.id}-->&mode=1">设为置顶</a>
	<!--{elseif $topic.status==2}-->
	<a href="<!--{$path}-->board.php?action=topic_top&tid=<!--{$topic.id}-->" >取消置顶</a>
	<!--{/if}-->
<!--{/if}-->
<br />
	[<!--{$topic.board_name}-->] <b><!--{$topic.author}--></b> 发表于<!--{$topic.start_time}--> 来自<!--{$topic.ip_address}-->
</td>
<td class="count"><!--{$topic.reply_count}-->/<!--{$topic.view_count}--></td>
<td class="update"><b><!--{$topic.update}--></b><br /><i><!--{$topic.time}--></i></td>
</tr>
<!--{/foreach}-->
</tbody>
</table>
<table  cellspacing="0" cellpadding="0" width="100%">
<tr>
<td>
<!--{if $pager}-->
<div class="pager">
<ul>
<!--{if $pager.begin}-->
<li>
<a href="<!--{if $config.board_rewrite==1}--><!--{$path}-->board/<!--{if $template.get.id}--><!--{$template.get.id}-->/<!--{/if}-->page/<!--{$pager.begin}-->/<!--{else}-->?<!--{if $template.get.id}-->id=<!--{$template.get.id}-->&<!--{/if}-->page=<!--{$pager.begin}--><!--{/if}-->">&laquo;</a>
</li>
<!--{else}-->
<li class="disabled"><a>&laquo;</a></li>
<!--{/if}-->
<!--{foreach from=$pager.no key=key item=href}-->
<!--{if $pager.current==$key}-->
<li class="active"><a><!--{$key}--></a></li>
<!--{else}-->
<li>
<a href="<!--{if $config.board_rewrite==1}--><!--{$path}-->board/<!--{if $template.get.id}--><!--{$template.get.id}-->/<!--{/if}-->page/<!--{$href}-->/<!--{else}-->?<!--{if $template.get.id}-->id=<!--{$template.get.id}-->&<!--{/if}-->page=<!--{$href}--><!--{/if}-->"><!--{$key}--></a>
</li>
<!--{/if}-->
<!--{/foreach}-->
<!--{if $pager.end}-->
<li>
<a href="<!--{if $config.board_rewrite==1}--><!--{$path}-->board/<!--{if $template.get.id}--><!--{$template.get.id}-->/<!--{/if}-->page/<!--{$pager.end}-->/<!--{else}-->?<!--{if $template.get.id}-->id=<!--{$template.get.id}-->&<!--{/if}-->page=<!--{$pager.end}--><!--{/if}-->">&raquo;</a>
</li>
<!--{else}-->
<li class="disabled"><a>&raquo;</a></li>
<!--{/if}-->
</ul>
</div>
<!--{/if}-->

			</td>
			<td width="100" align="right">
			<!--{if $template.session.user_id&&$config.board_front_topic_status==1&&$board_write_status&&$template.session.user_login!='-'}-->
			<input type="button" class="btn" id="topic-button"value="发表新帖" onclick="add_topic(<!--{$template.get.id}-->);"/>
			<!--{/if}-->
			</td>
			</tr>
			</table>
			<!--{else}-->
				<div style="text-align:center;padding:40px">没有数据
				<!--{if $template.session.user_id&&$config.board_front_topic_status==1&&$board_write_status&&$template.session.user_login!='-'}-->
				<br /><br />
				<input type="button" class="btn" id="topic-button" value="发表新帖" onclick="add_topic(<!--{$template.get.id}-->);"/>
				<!--{/if}-->
				</div>
			<!--{/if}-->

 
<!--{$footer}-->
</div>
</body>
</html>