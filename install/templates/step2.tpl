<!DOCTYPE html>
<html>

{include file="header.tpl"}
<body>
<!DOCTYPE html>
<html>

{include file="header.tpl"}
<div class="main">
<div class="title"> ArkCMS  安装向导 </div>
{include file="siderbar.tpl"}
<div class="head">环境以及文件目录权限</div>	
<div class="install">

<strong> 1、服务器环境检测</strong>
					<table width="90%" cellpadding="0" cellspacing="1" bgcolor="#DDDDDD" border="0">
						<tr>
							<th bgcolor="#EEEEEE" height="28">检测项目</th>
							<th bgcolor="#EEEEEE">最低要求</th>
							<th bgcolor="#EEEEEE">推荐配置</th>
							<th bgcolor="#EEEEEE">当前服务器</th>
							<th bgcolor="#EEEEEE">结果</th>
						</tr>
						<tr>
							<td bgcolor="#FFFFFF" align="center" height="28">操作系统</td>
							<td bgcolor="#FFFFFF" align="center">不限制</td>
							<td bgcolor="#FFFFFF" align="center">类Unix</td>
							<td bgcolor="#FFFFFF" align="center"><?php echo PHP_OS;?></td>
							<td bgcolor="#FFFFFF" align="center"><span class='blue'>√</span></td>
						</tr>
						<tr>
							<td bgcolor="#FFFFFF" align="center" height="28">PHP版本</td>
							<td bgcolor="#FFFFFF" align="center">5.3 +</td>
							<td bgcolor="#FFFFFF" align="center">5.3 +</td>
							<td bgcolor="#FFFFFF" align="center">{$check_php_version}</td>
							<td bgcolor="#FFFFFF" align="center">{if $check_php_version > 5.3}<span class='blue'>√</span>{else}<span class='red'>×</span>{/if}</td>
						</tr>
						<tr>
							<td bgcolor="#FFFFFF" align="center" height="28">附件上传</td>
							<td bgcolor="#FFFFFF" align="center">不限制</td>
							<td bgcolor="#FFFFFF" align="center">2M</td>
							<td bgcolor="#FFFFFF" align="center">{$check_upload_max}M</td>
							<td bgcolor="#FFFFFF" align="center">{if $check_upload_max >= 2}<span class='blue'>√</span>{else}<span class='red'>×</span>{/if}</td>
						</tr>
						<tr>
							<td bgcolor="#FFFFFF" align="center" height="28">GD 库</td>
							<td bgcolor="#FFFFFF" align="center">2.0.1 +</td>
							<td bgcolor="#FFFFFF" align="center">2.1.0</td>
							<td bgcolor="#FFFFFF" align="center">{$check_gd}</td>
							<td bgcolor="#FFFFFF" align="center">{if $check_gd > 2}<span class='blue'>√</span>{else}<span class='red'>×</span>{/if}</td>
						</tr>
							<tr>
							<td bgcolor="#FFFFFF" align="center" height="28">PDO支持</td>
							<td bgcolor="#FFFFFF" align="center">支持</td>
							<td bgcolor="#FFFFFF" align="center">支持</td>
							<td bgcolor="#FFFFFF" align="center">{if $check_pdo}支持{else}不支持{/if}</td>
							<td bgcolor="#FFFFFF" align="center">{if $check_pdo}<span class='blue'>√</span>{else}<span class='red'>×</span>{/if}</td>
						</tr>
						<tr>
							<td bgcolor="#FFFFFF" align="center" height="28">函数依赖性检测</td>
							<td bgcolor="#FFFFFF" colspan="4">

{foreach $available_func_list(key,value)} 
{if @value == 1}
<span class='blue'>{@key}</span>
{else}
<span class='red'>{@key}</span>
{/if} 
&nbsp;      
{/foreach}
							</td>
						</tr>
						<tr>
							<td bgcolor="#FFFFFF" align="center" height="28">&nbsp;服务器禁用的函数&nbsp;</td>
							<td bgcolor="#FFFFFF" colspan="4" style="word-break:break-all; width:480px; padding:0 5px;"><?php $disFuns = ini_get('disable_functions'); echo empty($disFuns) ? '无' : $disFuns; ?></td>
						</tr>
					</table>
					<br />
					<strong>2、目录、文件权限检测</strong>
					<table width="90%" cellpadding="0" cellspacing="1" bgcolor="#DDDDDD" border="0">
						<tr>
							<th bgcolor="#EEEEEE" height="28">文件或目录</th>
							<th bgcolor="#EEEEEE">所需状态</th>
							<th bgcolor="#EEEEEE">当前状态</th>
						</tr>
						

{foreach $writable_list(key,value)} 

		<tr>
							<td bgcolor="#FFFFFF" height="28">{@key}</td>
							<td bgcolor="#FFFFFF" align="center">可写</td>
							<td bgcolor="#FFFFFF" align="center">
{if @value == 1}
<span class='blue'>
可写
</span>
{else}
<span class='red'>
不可写
</span>
{/if}
</td>
		</tr>
       
{/foreach}

				
						<?php// }?>
					</table>

</div>
<div class='install-button-group'>

<div class="install-button"><a id="submit" href="<!--{ACTION_URL}-->/index/step3" class="button">下一步</a></div>

</div>
{include file="footer.tpl"}
</body>
</html>

