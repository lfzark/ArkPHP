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
<div class="copyright">Copyright &copy; 2016 <a target="_blank" href="http://www.arkphp.com">www.arkphp.com</a> All Rights Reserved. </div>
