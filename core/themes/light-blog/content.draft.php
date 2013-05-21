<?php exit?>
<script type="text/javascript">
function check(){
	var code_status=$('#code_status').val();
	if(code_status==1){
		var code=$('#draft_code').val();
		if($.trim(code)==''){
			alert('验证码不能为空');
			$('#draft_code').focus();
			return false;
		}
		if(code.length!=4){
			alert('验证码长度不正确');
			$('#draft_code').focus();
			return false;
		}		
	}
	var title=$('#draft_title').val();
	var content=$('#draft_content').val();
	var author=$('#draft_author').val();
	if($.trim(title)==''){
		alert('标题不能为空');
		$('#draft_title').focus();
		return false;
	}
	if($.trim(content)==''){
		alert('内容不能为空');
		$('#draft_content').focus();
		return false;
	}
	if($.trim(author)==''){
		alert('作者不能为空');
		$('#draft_content').focus();
		return false;
	}
	return true;
}
</script>
<form action="front.php?action=content&do=draft_insert" method="post" onsubmit="return check()" id="draft_info">
<table cellspacing="10" cellpadding="10" class="table">
	<tr>
		<td>栏目：</td>
		<td><select name="category_id" id="category_id" class="select" ><!--{$category_option}--></select></td>
	</tr>
	<tr>
		<td>标题：</td>
		<td><input x-webkit-speech type="text" name="draft_title" id="draft_title" class="input" style="width:400px;" placeholder="请输入标题"/></td>
	</tr>

	<tr>
		<td valign="top">内容：</td>
		<td><textarea class="textarea" name="draft_content" id="draft_content"  style="width:620px;height:260px"></textarea></td>
	</tr>

	<tr>
		<td>作者：</td>
		<td><input type="text" name="draft_author" id="draft_author" class="input" style="width:100px;" placeholder="请输入作者"/></td>
	</tr>
	    {if $config.code_status==1}
 
    <tr><td width="60" height="50">&nbsp;</td><td><input type="text" class="input" id="draft_code" name="code"/> 请参照下图输入验证码</td></tr>
    <tr><td>&nbsp;</td><td><img src="{$path}code.php" onclick="this.src='{$path}code.php?'+Number(new Date())" style="cursor:pointer" /></td></tr>
 
    {/if}
    <input type="hidden" id="code_status" value="{$config.code_status}"/>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" class="btn" value=" 提 交 "/></td>
	</tr>
</table>
</form>