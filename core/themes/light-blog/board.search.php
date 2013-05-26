<?php exit?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<meta name="author" content="<!--{$config.author|escape:html}-->" />
<meta name="keywords" content="<!--{$config.keywords|escape:html}-->" />
<meta name="description" content="<!--{$config.description|escape:html}-->" />
<meta name="copyright" content="Powered by YCKIT" />
<title>帖子搜索 - <!--{$config.title|escape:html}--></title>
<!--{include file="static.php"}-->
<?php echo $this->hook('board_static');?>
<script type="text/javascript">
jQuery(function(){

	<!--{if !@$template.get.id}-->
	$('#menu-home').addClass("current");
	<!--{else}-->
	$('#menu-board-<!--{$template.get.id}-->').addClass("current");
	<!--{/if}-->
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
<th class="count">浏览</th>
<th class="title">主题</th>
<th class="count">回复</th>
<th class="update">最后发表</th>
</tr>
</thead>

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

<!--{if $pager}-->
<div class="pager">
<ul>
<!--{if $pager.begin}-->
<li>
<a href="<!--{$path}-->search.php?action=board&keyword=<!--{$keyword}-->&page=<!--{$pager.begin}-->">&laquo;</a>
</li>
<!--{else}-->
<li class="disabled"><a>&laquo;</a></li>
<!--{/if}-->
<!--{foreach from=$pager.no key=key item=href}-->
<!--{if $pager.current==$key}-->
<li class="active"><a><!--{$key}--></a></li>
<!--{else}-->
<li><a href="<!--{$path}-->search.php?action=board&keyword=<!--{$keyword}-->&page=<!--{$href}-->"><!--{$key}--></a></li>
<!--{/if}-->
<!--{/foreach}-->
<!--{if $pager.end}-->
<li>
<a href="<!--{$path}-->search.php?action=board&keyword=<!--{$keyword}-->&page=<!--{$pager.end}-->">&raquo;</a>
</li>
<!--{else}-->
<li class="disabled"><a>&raquo;</a></li>
<!--{/if}-->
</ul>
</div>
<!--{/if}-->
<!--{else}-->
	<div style="text-align:center;padding:40px">没有数据</div>
<!--{/if}-->
		 
<!--{$footer}-->
</div>
</body>
</html>