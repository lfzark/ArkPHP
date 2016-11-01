<!DOCTYPE html>
<html>

{include file="header.tpl"}
<div class="main">
<div class="title"> ArkCMS  安装向导 </div>
{include file="siderbar.tpl"}
<div class="head">数据库配置</div>	
<div class="install">


<form id='form_exe_install' action='<!--{ACTION_URL}-->/index/step4' method = 'POST'>
      <div class="formitm">
        <label class="lab" >数据库名称：</label>
        <input name="data[db_name]" type="text" value="arkcms" class="u-ipt" />
      </div>
      <div class="formitm">
        <label class="lab" >数据库帐号：</label>
        <input name="data[db_user]" type="text" value="root" class="u-ipt" />
      </div>
      <div class="formitm">
        <label class="lab" >数据库密码：</label>
        <input name="data[db_pass]" type="password" value="" class="u-ipt" />
      </div>
      <div class="formitm">
        <label class="lab" >后台帐号：</label>
        <input name="data[admin_name]" type="text" value="admin" class="u-ipt" />
      </div>
      <div class="formitm">
        <label class="lab" >后台密码：</label>
        <input name="data[admin_pass]" type="password" value="" class="u-ipt" />
      </div>
      <div class="formitm">
        <label class="lab" >安装测试数据：</label>
        <label class="u-opt">
          <input name="data[import]" type="checkbox" value="1" checked align="bottom"/>
        </label>
      </div>
      
      <div class="formitm">
      
      </div>
      <div id="tip" style="display: none;"></div>
</form>

<a  id='install' href="javascript:install()" class="form_button ">执行安装</a>
<p class='copyright'>版权所有 (c) 2016 www.arkphp.com</p>
  
</div>
</div>
</div>
<script type="text/javascript">
function install(){
document.getElementById('form_exe_install').submit();
}
</script>
{include file="footer.tpl"}

</body>
</html>
