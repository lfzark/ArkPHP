<!DOCTYPE html>
<html>

{include file="header.tpl"}
<body>
<div class="install-box">
  <div class="head"> ArkCMS  安装向导 </div>
  <div class="install">
    <form  action="index.php?c=install&a=step3" method="post"  id="form_step2">

      <div class="formitm">
        <label class="lab" >数据库名称：</label>
        <input name="data[dbname]" type="text" value="" class="u-ipt" />
      </div>
      <div class="formitm">
        <label class="lab" >管理员帐号：</label>
        <input name="data[admin_name]" type="text" value="" class="u-ipt" />
      </div>
      <div class="formitm">
        <label class="lab" >管理员密码：</label>
        <input name="data[admin_pass]" type="password" value="" class="u-ipt" />
      </div>
      
      <div class="formitm">
        <label class="lab" >安装测试数据：</label>
        <label class="u-opt">
          <input name="data[import]" type="checkbox" value="1" checked align="bottom"/>
        </label>
      </div>
      
      <div id="tip" style="display: none;">
        <div class="formitm"  style="text-align: center;">安 装 中，请 稍 候 . . .</div>
      </div>
      
      <div class="install-button"><a id="submit" href="javascript:;" class="button">下一步</a></div>

      <div class="install-error">测试</div>

    </form>
  </div>
</div>
<div class="copyright">Copyright &copy; 2016 <a target="_blank" href="http://www.arkphp.com">www.arkphp.com</a> All Rights Reserved. </div>

<script>
$(function (){

  $("input[name$='data[dbname]']").focus();
  
	$('#submit').click(function (){
	  
		if(!$("input[name='data[dbname]']").val())
		{
			alert('请输入数据库名称');
			return $("input[name='data[dbname]']").focus();
		}
		if(!$("input[name='data[admin_name]']").val())
		{
			alert('请输入管理员账号');
			return $("input[name='data[admin_name]']").focus();
		}
		if(!$("input[name='data[admin_pass]']").val())
		{
			alert('请输入管理员密码');
			return $("input[name='data[admin_pass]']").focus();
		}
			
     document.getElementById("tip").style.display = '';
     document.getElementById("form_step2").submit();
	});
});
</script>

</body>
</html>