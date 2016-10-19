<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>ArkCMS 企业建站版安装向导</title>
<link rel="stylesheet" type="text/css" href="<!--{PUBLIC_PATH}-->/css/arkcms.css"/>
</head>
<body>
	
<div class="content">
					<br />
					<strong> 1、服务器环境检测</strong>
					<table width="100%" cellpadding="0" cellspacing="1" bgcolor="#DDDDDD" border="0">
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
							<td bgcolor="#FFFFFF" align="center"><img src="template/images/ok.png" /></td>
						</tr>
						<tr>
							<td bgcolor="#FFFFFF" align="center" height="28">PHP版本</td>
							<td bgcolor="#FFFFFF" align="center">5.3 +</td>
							<td bgcolor="#FFFFFF" align="center">5.3 +</td>
							<td bgcolor="#FFFFFF" align="center"><?php echo PHP_VERSION;?></td>
							<td bgcolor="#FFFFFF" align="center"><?php echo PHP_VERSION>=5.3?'<img src="template/images/ok.png" />':'<img src="template/images/not.png" />';?></td>
						</tr>
						<tr>
							<td bgcolor="#FFFFFF" align="center" height="28">附件上传</td>
							<td bgcolor="#FFFFFF" align="center">不限制</td>
							<td bgcolor="#FFFFFF" align="center">2M</td>
							<td bgcolor="#FFFFFF" align="center"><?php echo @ini_get('upload_max_filesize'); ?></td>
							<td bgcolor="#FFFFFF" align="center"><img src="template/images/ok.png" /></td>
						</tr>
						<tr>
							<td bgcolor="#FFFFFF" align="center" height="28">GD 库</td>
							<td bgcolor="#FFFFFF" align="center">2.0.1 +</td>
							<td bgcolor="#FFFFFF" align="center">2.1.0</td>
							<td bgcolor="#FFFFFF" align="center"><?php echo $gd_version ? $gd_version : '不支持';?></td>
							<td bgcolor="#FFFFFF" align="center"><?php echo round($gd_version)>=2?'<img src="template/images/ok.png" />':'<img src="template/images/not.png" />';?></td>
						</tr>
						<tr>
							<td bgcolor="#FFFFFF" align="center" height="28">函数依赖性检测</td>
							<td bgcolor="#FFFFFF" colspan="4">
							<?php
							foreach($func_items as $func)
							{
								if(disablefunc($func))
								{
									$cantsubmit='1';
								}
								echo !disablefunc($func)?$func.'()&nbsp;<img src="template/images/ok.png" />':$func.'()&nbsp;<img src="template/images/not.png" />';
								echo '&nbsp;&nbsp;&nbsp;&nbsp;';
							}
							?>
							</td>
						</tr>
						<tr>
							<td bgcolor="#FFFFFF" align="center" height="28">&nbsp;服务器禁用的函数&nbsp;</td>
							<td bgcolor="#FFFFFF" colspan="4" style="word-break:break-all; width:480px; padding:0 5px;"><?php $disFuns = ini_get('disable_functions'); echo empty($disFuns) ? '无' : $disFuns; ?></td>
						</tr>
					</table>
					<br />
					<strong>2、目录、文件权限检测</strong>
					<table width="100%" cellpadding="0" cellspacing="1" bgcolor="#DDDDDD" border="0">
						<tr>
							<th bgcolor="#EEEEEE" height="28">文件或目录</th>
							<th bgcolor="#EEEEEE">所需状态</th>
							<th bgcolor="#EEEEEE">当前状态</th>
						</tr>
						<?php
							foreach($folder_items as $folder)
							{
								if(!check_iswriteable($folder))
								{
									$cantsubmit='1';
								}
						?>
						<tr>
							<td bgcolor="#FFFFFF" height="28">&nbsp;&nbsp;&nbsp;<?php echo $folder?$folder:'/';?></td>
							<td bgcolor="#FFFFFF" align="center"><img src="template/images/ok.png" /> 可写</td>
							<td bgcolor="#FFFFFF" align="center"><?php echo check_iswriteable($folder)?'<img src="template/images/ok.png" /> 可写':'<img src="template/images/not.png" /> 不可写';?></td>
						</tr>
						<?php }?>
					</table>
					<form id="install" action="index.php?" method="post">
					<input type="hidden" id="step" name="step" value="3">
					<table width="100%"><tr>
					<td width="80" height="80">&nbsp;</td>
					<td align="right"><input type="button" onclick="document.getElementById('step').value='2';document.getElementById('install').submit();" value="重新检测" class="btn" /></td>
					<td align="left"><input type="submit" value="下一步"<?php echo $cantsubmit?' disabled="disabled"':'';?> class="btn" /></td>
					<td width="80">&nbsp;</td>
					</tr></table>
					</form>
					</div>
					
					
					</body>
</html>