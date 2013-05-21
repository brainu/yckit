<?php exit?>



<dl id="comments">
 
<dt>发布评论</dt>
 
<dd class="comments-form">
    <div class="avatar"><img onerror="this.src='{$path}core/images/avatar.jpg'"  src="{if $template.session.user_id>0}
    	{$path}data/user/{$template.session.user_id}.jpg
    	{else}
    	{$path}core/images/avatar-comment.png
    	{/if}" align="absmiddle"/></div>
    <div class="main" style="margin-right:0">
    	<div class="textbox">

        <textarea id="comment_content"  {if $config.user_comment} {if !$template.session.user_id}disabled{/if} {/if} onclick="$('.comments-form-item').slideDown()"></textarea>
        <input type="hidden" id="parent_id" value="0"/>
        <div class="textbox-bottom">
        	<div class="textbox-info">欢迎您，{$template.session.user_nickname|default:游客}</div>
        	<div class="textbox-submit" id="comment_insert">发送提交</div>
        </div>
        {if $config.user_comment}
        {if !$template.session.user_id}
        <div class="textbox-tip">请<a href="javascript:void(user_box('会员登陆',400,{if $config.code_status==1}340{else}220{/if},'login'))">登录</a>后操作</div>
        {/if}
         {/if}
        </div>

    </div>
    <div class="comments-form-item" style="display:none">
    <table>
    <tr><td width="60" height="50">&nbsp;</td>
        <td width="300"><input type="text" class="input" id="comment_name" size="30" value="{$template.session.user_nickname|default:游客}"/> 输入昵称</td>
        <td rowspan="2">
            {if $config.code_status==1}
            <input type="text" class="input" id="code"/> 请参照下图输入验证码
            <br /> <br />
            <img src="{$path}code.php" onclick="this.src='{$path}code.php?'+Number(new Date())" style="cursor:pointer" />
            {/if}
            <input type="hidden" id="code_status" value="{$config.code_status}"/>
        </td>
    </tr>
    <tr><td width="60" height="50">&nbsp;</td><td><input type="text" class="input" id="comment_email" size="30" value="{$template.session.user_login}"/> 输入邮箱</td></tr>
    <tr><td width="60" height="50">&nbsp;</td><td><input type="text" class="input" id="comment_site" size="30" value=""/> 输入网站</td></tr>
    </table>
    </div>
    <div class="clear"></div>
</dd>
 <!--{if $comment}-->
<dt>网友评论 <!--{$count}--> 条</dt>
<!--{foreach from=$comment item=comment}-->
<dd class="{cycle values='odd,even'}">
	<a name="comment-<!--{$comment.no}-->" href="#comment-<!--{$comment.no}-->" class="floor">#<!--{$comment.no}--></a>
    <div class="avatar" data-id="1"><img src="<!--{$comment.avatar}-->" align="absmiddle"/></div>
    <div class="main">
    	<p class="main-content"><!--{$comment.content}--></p>
    	<p class="main-meta"><strong><!--{$comment.name}--></strong> <!--{$comment.time}--> <!--{$comment.ip_address}--> 
    		<!--{if $template.session.user_id>0}-->
    			<a href="javascript:void(reply_comment(<!--{$comment.id}-->))">回复</a>
    		<!--{/if}-->
    	</p>
		  <!--{if $comment.reply}-->
		  <p class="main-admin">管理员：<!--{$comment.reply}--></p>
		  <!--{/if}-->
    	 <!--{if $comment.children}-->
	        <dl class="comments-reply">
	        <!--{foreach from=$comment.children item=child}-->
	        <dd>
			    <div class="avatar" data-id="1"><img src="<!--{$child.avatar}-->" align="absmiddle"/></div>
			    <div class="main">
			    	<p class="main-content"><!--{$child.content}--></p>
			    	<p class="main-meta"><strong><!--{$child.name}--></strong> <!--{$comment.time}--> <!--{$comment.ip_address}-->  
    		<!--{if $template.session.user_id>0}-->
    			<a href="javascript:void(reply_comment(<!--{$comment.id}-->))">回复</a>
    		<!--{/if}-->
			    	</p>
  <!--{if $child.reply}-->
  <p class="main-admin">管理员：<!--{$child.reply}--></p>
  <!--{/if}-->
			    </div>
			    <div class="clear"></div>
	        </dd>
	        <!--{/foreach}-->
	        </dl>
        <!--{/if}-->
    </div>
    <div class="clear"></div>
</dd>
<!--{/foreach}-->
	<!--{/if}-->
</dl>
<!--{if $pager.page_count>1}-->
<div class="pager">
<ul>
<!--{if $pager.begin}-->
	<li><a href="javascript:get_comment('content',<!--{$article_id}-->,<!--{$pager.begin}-->)">&laquo;</a></li>
<!--{else}-->
	<li class="disabled"><a>&laquo;</a></li>
<!--{/if}-->

<!--{foreach from=$pager.no key=key item=href}-->
<!--{if $pager.current==$key}-->
	<li class="active"><a><!--{$key}--></a></li>
<!--{else}-->
	<li><a href="javascript:get_comment('content',<!--{$article_id}-->,<!--{$href}-->)"><!--{$key}--></a></li>
<!--{/if}-->
<!--{/foreach}-->

<!--{if $pager.end}-->
	<li><a href="javascript:get_comment('content',<!--{$article_id}-->,<!--{$pager.end}-->)">&raquo;</a></li>
<!--{else}-->
	<li class="disabled"><a>&raquo;</a></li>
<!--{/if}-->
</ul>
</div>
<!--{/if}-->
