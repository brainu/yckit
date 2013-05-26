<?php exit?>
<script>
function check_topic(){
	var code_status=$('#code_status').val();
	if(code_status==1){
		var code=$('#topic_code').val();
		if($.trim(code)==''){
			alert('验证码不能为空');
			$('#topic_code').focus();
			return false;
		}
		if(code.length!=3){
			alert('验证码长度不正确');
			$('#topic_code').focus();
			return false;
		}
	}
	var topic_title=$('#topic_title').val();
	var topic_content=$('#topic_content').val();
	if($.trim(topic_title)==''){
		alert('主题不能为空');
		$('#topic_title').focus();
		return false;
	}
	if(topic_title.length<5){
		alert('主题长度不能小于5');
		$('#topic_title').focus();
		return false;
	}
	if(topic_title.length>50){
		alert('主题长度不能大于50');
		$('#topic_title').focus();
		return false;
	}
	if($.trim(topic_content)==''){
		alert('内容不能为空');
		$('#topic_content').focus();
		return false;
	}
	if(topic_content.length<5){
		alert('内容长度不能小于5');
		$('#topic_content').focus();
		return false;
	}
	$.ajax({
		url:PATH+'board.php?action=topic_{$mode}',
		data:$(".board-form").serialize(),
		type: 'POST',
		success:function(e){
			if(e==''){
				window.location.reload();
			}else{
				alert(e);
				if(e=='验证码错误'){
					$('#code').focus();
				}else{
					$('#topic_title').focus();
				}

				
			}
		}
	})
	return false;
}
</script>
<form id="topic-form" class="board-form" method="post" onsubmit="return check_topic()">
	<label class="text">主题：最多可输入50个字</label>
	<input type="text" name="topic_title" id="topic_title" value="<!--{$topic.title|escape:html}-->" class="input" maxlength="100"/>
	<!--{if !$template.session.admin_id}-->
		<!--{if $template.get.id||$topic.board_id}-->
		<input name="board_id" type="hidden" value="<!--{if $template.get.id}--><!--{$template.get.id}--><!--{else}--><!--{$topic.board_id}--><!--{/if}-->"/>
		<!--{else}-->
		<select name="board_id" class="input">
		<!--{foreach from=$board item=board name=board}-->
		<!--{if $board.write!=-1}-->
		<option value="<!--{$board.id}-->" {if $template.foreach.board.index==0}selected{/if}><!--{$board.name|escape:html}--></option>
		<!--{/if}-->
		<!--{/foreach}-->
		</select>
		<!--{/if}-->
	<!--{else}-->
		<select name="board_id" class="input">
		<!--{foreach from=$board item=board name=board}-->
		<option value="<!--{$board.id}-->" {if $topic.board_id==$board.id}selected{/if}><!--{$board.name|escape:html}--></option>
		<!--{/foreach}-->
		</select>
	<!--{/if}-->
	<label class="text">内容：至少输入5个字</label>
	<textarea name="topic_content" id="topic_content" class="textarea" {if $config.code_status==0}style="height:330px"{/if}><!--{$topic.content|escape:html}--></textarea>
	
	{if $config.code_status==1}
	<label class="text">验证码：请输入3个汉字</label>
     <input type="text" class="input" id="topic_code" style="width:80px" name="code"/>  
     <img src="{$path}code.php" onclick="this.src='{$path}code.php?'+Number(new Date())" style="cursor:pointer" align="absmiddle"/>
    {/if}
    <input type="hidden" id="code_status" value="{$config.code_status}"/>
    <div class="br"></div>
	<table width="100%">
	<tr>
	<td>
	<input type="submit" value="<!--{if $mode=='insert'}-->发布帖子<!--{else}-->编辑保存<!--{/if}-->" class="btn" /> 
	</td>
	<td align="right">
	提示：支持上传<span style="color:red"><!--{$config.board_front_attachment_ext}--></span>等格式,且最大单个文件为<!--{$config.board_front_attachment_size}-->MB。
	</td>
	</tr>
	</table>
	<input type="hidden" name="topic_file" id="topic_file" value="<!--{$topic.file}-->"/>
	<input type="hidden" name="topic_id" value="<!--{$topic.id}-->"/>
</form>
