<?php exit?>
<!--{include file="header.php"}-->
<div class="layout-box">
	<div class='layout-title'>讨论板块设置</div>
	<div class='layout-body'>

	<form action="?action=board&do=board_update" method="post">
	<!--{if $board}-->
	<!--{foreach from=$board item=board}-->
	<fieldset style="float:left;width:350px">
	<legend><!--{$board.name|escape:html}--></legend>
	<table cellspacing="5">

	<tr>
	<td width="40">名称:</td>
	<td><input x-webkit-speech class="input" type="text" name="board_name[<!--{$board.id}-->]" size="15" value="<!--{$board.name|escape:html}-->"  style="width:150px;"/>
	<input type="checkbox" name="board_status[<!--{$board.id}-->]" value="1" <!--{if $board.status==1}-->checked<!--{/if}--> /> 启用</lable>&nbsp;&nbsp;<input type="checkbox" name="delete_id[]" value="<!--{$board.id}-->" /> 删除</lable></td>
	</tr>
	<tr>
	<td width="40">描述:</td>
	<td width="40"><textarea class="textarea" style="width:260px;height:40px" name="board_description[<!--{$board.id}-->]"><!--{$board.description|escape:html}--></textarea></td>
	</tr>
	<tr>
	<td width="40">权限：</td>
	<td width="40"><select name="board_read[<!--{$board.id}-->]" class="input">
	<option value="0">访问权限</option>
	<option value="-1" <!--{if -1==$board.read}-->selected<!--{/if}-->>管理员</option>
	<!---{foreach from=$role item=role}---><option value="<!--{$role.id}-->" <!--{if $role.id==$board.read}-->selected<!--{/if}-->><!--{$role.name}--></option><!--{/foreach}-->
	</select>&nbsp;<select name="board_write[<!--{$board.id}-->]" class="input">
	<option value="0">发布权限</option>
	<option value="-1" <!--{if -1==$board.write}-->selected<!--{/if}-->>管理员</option>
	<!---{foreach from=$role item=role}---><option value="<!--{$role.id}-->" <!--{if $role.id==$board.write}-->selected<!--{/if}-->><!--{$role.name}--></option><!--{/foreach}-->
	</select>&nbsp;&nbsp;<select name="board_reply[<!--{$board.id}-->]" class="input">
	<option value="0">回复权限</option>
	<option value="-1" <!--{if -1==$board.reply}-->selected<!--{/if}-->>管理员</option>
	<!---{foreach from=$role item=role}---><option value="<!--{$role.id}-->" <!--{if $role.id==$board.reply}-->selected<!--{/if}-->><!--{$role.name}--></option><!--{/foreach}-->
	</select></td>
	</tr>
	<tr>
	<td width="40">版主：</td>
	<td width="40"><input  class="input" type="text" name="board_admin[<!--{$board.id}-->]" size="15" value="<!--{$board.admin|escape:html}-->"  style="width:260px;"/></td>
	</tr>
	<tr>
	<td width="40">排序：</td>
	<td width="40"><input  class="input" type="number" name="board_sort[<!--{$board.id}-->]" size="15" value="<!--{$board.sort|escape:html}-->"  style="width:50px;"/></td>
	</tr>
	</table>
	<input type="hidden" name="board_id[<!--{$board.id}-->]"  value="<!--{$board.id}-->" />
	
	</fieldset>
	
	<!--{/foreach}-->

	<!--{/if}-->

	<fieldset style="float:left;width:350px">
	<legend>添加板块</legend>
	<table cellspacing="5">
	<tr>
	<td width="40">名称:</td>
	<td>
	<input x-webkit-speech class="input" type="text" name="board_name_new" size="15" value=""  style="width:150px;"/>
	<label><input type="checkbox" name="board_status_new" size="15" value="1" checked/> 启用</lable>
	</td>
	</tr>
	<tr>
	<td width="40">描述:</td>
	<td width="40"><textarea class="textarea" style="width:260px;height:40px" name="board_description_new"></textarea></td>
	</tr>
	<tr>
	<td width="40">权限：</td>
	<td>
		<select name="board_read_new" class="input">
		<option value="0">访问权限</option><option value="-1">管理员</option>
		<!---{foreach from=$role item=role}---><option value="<!--{$role.id}-->"><!--{$role.name}--></option><!--{/foreach}-->
		</select>&nbsp;<select name="board_write_new" class="input">
		<option value="0">发布权限</option><option value="-1">管理员</option>
		<!---{foreach from=$role item=role}---><option value="<!--{$role.id}-->"><!--{$role.name}--></option><!--{/foreach}-->
		</select>&nbsp;<select name="board_reply_new" class="input">
		<option value="0">回复权限</option><option value="-1">管理员</option>
		<!---{foreach from=$role item=role}---><option value="<!--{$role.id}-->"><!--{$role.name}--></option><!--{/foreach}-->
		</select>
	</td>
	</tr>
	<tr>
	<td width="40">版主：</td>
	<td width="40"><input  class="input" type="text" name="board_admin_new" size="15" value=""  style="width:260px;"/></td>
	</tr>
	<tr>
	<td width="40">排序：</td>
	<td><input  class="input" type="number" name="board_sort_new" size="25"   style="width:50px;" value="0"/></td>
	</tr>
	</table>
	</fieldset>
		<div style="clear:left"></div>
	<input type="submit" value=" 提交 " class="button" style="margin-left:170px;"/>
		</form>
	</div>
</div>