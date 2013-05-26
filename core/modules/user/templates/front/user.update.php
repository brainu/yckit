<?php exit?>
<script>
function check_update(){
	var user_login=$('#user_login').val();
	var user_nickname=$('#user_nickname').val();
	if($.trim(user_login)==''){
		alert('帐号不能为空');
		$('#user_login').focus();
		return false;
	}
 
	if($.trim(user_nickname)==''){
		alert('昵称不能为空');
		$('#user_nickname').focus();
		return false;
	}
	$.ajax({
		url:PATH+'front.php?action=user&do=update-check',
		data:$(".user_form").serialize(),
		type: 'POST',
		success:function(e){
			if(e=='SUCCESS'){
				window.location.href=window.location.toString();
			}else{
				alert(e);
				$('#user_login').focus();
			}
		}
	})
	return false;
}
</script>
<form method="post" class="user_form" onsubmit="return check_update()">
<table cellspacing="0" cellpadding="0">
<tr>
<td align="right">邮箱：</td>
<td><input type="text" name="user_login" id="user_login" class="input" size="30"  tabindex="1"/></td>
 
</tr>
 
<tr>
<td align="right">昵称：</td>
<td><input type="text" name="user_nickname" id="user_nickname" value="{$template.session.qq_nickname}" class="input" size="30" maxlength="10"  tabindex="4"/></td>
<td></td>
</tr>
 
<tr>
<td>&nbsp;</td>
<td colspan="2"><input type="submit" value=" 完成绑定 " id="user_submit" class="btn"/>
 
</td>
</tr>
</table>
</form>