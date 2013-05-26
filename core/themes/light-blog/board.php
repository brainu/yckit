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
 <div class="board-total">
	今日:<!--{$total.today}-->&nbsp;&nbsp;昨日:<!--{$total.yesterday}-->&nbsp;&nbsp;主题:<!--{$total.topic}-->&nbsp;&nbsp;帖子:<!--{$total.post}-->&nbsp;&nbsp;用户:<!--{$total.user}-->
</div>
<!--{foreach from=$board item=board}-->
	<div class="board-box">
		<div class="board-topic">
		<!--{if $board.topic}-->
			<p><a href="<!--{if $config.board_rewrite==1}--><!--{$path}-->topic/<!--{$board.topic.id}-->/<!--{else}-->board.php?tid=<!--{$board.topic.id}--><!--{/if}-->"><!--{$board.topic.title|escape:html}--></a></p>
			<p><b><!--{$board.topic.auchor|escape:html}--></b> 更新于 <!--{$board.topic.time}--></p>
			<!--{/if}-->
		</div>
		<div class="board-count"><!--{$board.topic_count}-->/<!--{$board.reply_count}--></div>
		
		<div class="board-icon">
		<a href="<!--{if $config.board_rewrite==1}--><!--{$path}-->board/<!--{$board.id}-->/<!--{else}-->board.php?id=<!--{$board.id}--><!--{/if}-->"><img src="<!--{$path}-->core/modules/board/templates/front/images/icon<!--{if $board.day_count==0}-->-gray<!--{/if}-->.gif" /></a>
		</div>
		<a href="<!--{if $config.board_rewrite==1}--><!--{$path}-->board/<!--{$board.id}-->/<!--{else}-->board.php?id=<!--{$board.id}--><!--{/if}-->"><h3><!--{$board.name}--></h3></a> <!--{if $board.day_count}--><span class="board-today">(今日:<em><!--{$board.day_count}--></em>)<!--{/if}-->
		<p class="board-description"><!--{$board.description}--></p>
		<p class="board-admin">版主：<!--{if $board.admin}--><!--{$board.admin}--><!--{else}-->-<!--{/if}--></p>
	</div>
<!--{/foreach}-->

<!--{$footer}-->
</div>
</body>
</html>