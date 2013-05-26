<?php exit?>
<script type="text/javascript">
function check_reply(){
	var code_status=$('#code_status').val();
	if(code_status==1){
		var code=$('#reply_code').val();
		if($.trim(code)==''){
			alert('验证码不能为空');
			$('#reply_code').focus();
			return false;
		}
		if(code.length!=3){
			alert('验证码长度不正确');
			$('#reply_code').focus();
			return false;
		}
	}
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
	$.ajax({
		url:PATH+'board.php?action=reply_{$mode}',
		data:$(".board-form").serialize(),
		type: 'POST',
		success:function(e){
			if(e==''){
				window.location.reload();
			}else{
				alert(e);
				if(e=='验证码错误'){
					$('#code').focus();
				}
			}
		}
	})
	return false;
}
</script>
<form  id="reply-form"  class="board-form" method="post" onsubmit="return check_reply()">
<input type="hidden" name="reply_id" value="<!--{$reply.id}-->"/>
<input type="hidden" name="topic_id" value="<!--{$topic_id}-->" /> 
<input type="hidden" name="reply_file" id="reply_file" value="<!--{$reply.file}-->"/>
<label class="text">内容：至少输入5字</label>
<textarea name="reply_content" id="reply_content" class="textarea" {if $config.code_status==0}style="height:280px"{/if}><!--{$reply.content|escape:html}--></textarea>
{if $config.code_status==1}
	<label class="text">验证码：请输入三个汉字</label>
     <input type="text" class="input" id="reply_code" style="width:80px" name="code"/>  
     <img src="{$path}code.php" onclick="this.src='{$path}code.php?'+Number(new Date())" style="cursor:pointer" align="absmiddle"/>
{/if}
<input type="hidden" id="code_status" value="{$config.code_status}"/>
<div class="br"></div>
<table width="100%">
<tr>
<td>
<input type="submit" value="{if $template.get.action=='reply_add'}发布提交{else}修改保存{/if}" class="btn" /> 
</td>
<td align="right">
提示：支持上传<span style="color:red"><!--{$config.board_front_attachment_ext}--></span>等格式,且最大单个文件为<!--{$config.board_front_attachment_size}-->MB。
</td>
</tr>
</table>
</form>