<?php exit?>
<!--{if $template.session.user_id}-->
<ul id="user-menu">
	<li>你好！</li>
	<li class="down">
	<a href="javascript:;"><b><!--{$template.session.user_nickname|escape:html}--></b></a>
		<ul>
			<li><a href="javascript:user_box('头像设置',160,190,'avatar');"><img src="{$path}data/user/<!--{$template.session.user_id}-->.jpg" onerror="this.src='{$path}core/images/avatar.jpg'" align="absmiddle" width="60" style="margin:5px"/></a></li>
			<li><a href="javascript:user_box('修改密码',420,200,'password');">修改密码</a></li>
			<li><a href="javascript:user_box('头像设置',160,190,'avatar');">头像设置</a></li>
			<li><a href="{$path}front.php?action=user&do=qq"><!--{if $template.session.open_id}-->更新QQ<!--{else}-->绑定QQ<!--{/if}--></a></li>
		</ul>
	</li>
	<!--{if $template.session.user_login=='-'}-->
	<li><a href="javascript:user_box('完善帐号信息',340,200,'update');">完善帐号信息<span  style="font-weight:bold;color:red">(重要)</span></a></li>
	<!--{/if}-->
	<!--{if $config.content_draft_status==1}-->
	<li><a href="javascript:draft(700,{if $config.code_status==1}620{else}520{/if});">在线投稿</a></li>
	<!--{/if}-->
	<li><a href="javascript:logout();">退出</a></li>
</ul>
<script>
//fixed by IE6
$(function(){
	if(!window.XMLHttpRequest){
		$(".down").find("a:eq(0)").mouseover(function(){
			$(".down").find("ul").show();
		});
		$(".down").find("ul").mouseleave(function(){
			$(this).hide();
		});	
	}
});
</script>
<!--{else}-->
	<a href="javascript:user_box('会员登陆',400,{if $config.code_status==1}280{else}220{/if},'login');">登录</a>
	<a href="javascript:user_box('会员注册',400,{if $config.code_status==1}330{else}320{/if},'join');">注册</a>
<!--{/if}-->