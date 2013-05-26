<?php exit?>
<div id="side">
  <?php $this->hook('side_top');?>

<!--{if $user_join}-->
<h3 class="side-h3">最新加入</h3>
<div id="user_join">
<!--{foreach from=$user_join item=user}-->
 	<a href="#" title="{$user.nickname}在{$user.join_time|timestamp:Y年m月d日H时}加入"><img src="{$user.avatar}" alt="{$user.nickname}" /></a>
<!--{/foreach}-->
<br class="clear" />
</div>
<!--{/if}-->

<div id="side-fixed">
<!--{if $article_best}-->
	<h3 class="side-h3">推荐文章</h3>
	<ul class="list">
	<!--{foreach from=$article_best item=article}-->
	<li><a href="<!--{$article.uri}-->"  title="{$article.title|escape:html}" {if $article.is_nofollow eq 1}rel="nofollow"{/if}><!--{$article.title|truncate:20}--></a></li>
	<!--{/foreach}-->
	</ul>
<!--{/if}-->

<!--{if $article_click}--> 
	<h3 class="side-h3">热门文章</h3>
	<ul class="list">
	<!--{foreach from=$article_click item=article}-->
	<li><a href="<!--{$article.uri}-->"  title="{$article.title|escape:html}" {if $article.is_nofollow eq 1}rel="nofollow"{/if}><!--{$article.title|truncate:20}--></a></li>
	<!--{/foreach}-->
	</ul>
<!--{/if}-->
</div>
<!--{if $comment_list}-->
<h3 class="side-h3">最新评论</h3>
<ul>
<!--{foreach from=$comment_list item=comment}-->
<li class="side-comment">
<a href="<!--{$comment.uri}-->">
	<img class="side-avatar" alt="" src="<!--{$comment.avatar}-->" height="36" width="36"  onerror="this.src='{$path}core/images/avatar.jpg'">
	<p><!--{if $comment.site}--><strong><!--{$comment.name|truncate:8}--></strong><!--{else}--><strong><!--{$comment.name}--></strong><!--{/if}--></p>
	<p><!--{$comment.content|truncate:50}--></p>
</a>
</li>
<!--{/foreach}-->
</ul>
<!--{/if}-->



<!--{if $config.side==1}-->
<script>
$(document).ready(function (){
   var offset = $('.side-link').offset();   
   $(window).scroll(function () { 
    var scrollTop = $(window).scrollTop(); 
    if (offset.top < scrollTop) $('#side-fixed').addClass('fixed'); 
    else $('#side-fixed').removeClass('fixed');
     })
;});
</script>
<!--{/if}-->




<!--{if $link_list}-->
<h3 class="side-h3 side-link">友情链接</h3>
<div class="widget">
  <ul class="list">
	<!--{foreach from=$link_list item=link}-->
		<li class="left"><a href="<!--{$link.url}-->" target="_blank"><!--{$link.name|escape:html}--></a></li>
	<!--{/foreach}-->
  </ul>
	<br class="clear" />
</div>
<!--{/if}-->
 <?php $this->hook('side_bottom');?>
</div>