<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--  用IE使用最新渲染模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--  响应式宽度，初始缩放为1 -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--  <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <!-- 以上三个meta标签必须放在头部 -->

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>API 测试平台</title>

    <!-- Bootstrap -->
    <link href="<?php echo $this->_config['PUBLIC_PATH'];?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- 如果低于IE9 引入HTML标签支持和媒体查询 -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo $this->_config['PUBLIC_PATH'];?>/pace/pace.js"></script>
    <link href="<?php echo $this->_config['PUBLIC_PATH'];?>/pace/pace-theme-loading-bar.css" rel="stylesheet" />
     <script type="text/javascript">
 
    
    function getTime()
    {
      var now=new Date();
      var year=now.getYear();
      var month=now.getMonth();
      var day=now.getDate();
      var hours=now.getHours();
      var minutes=now.getMinutes();
      var seconds=now.getSeconds();
      return ""+(1900+year)+"年"+(month+1)+"月"+day+"日 "+hours+":"+minutes+":"+seconds+"";
    }


</script>
    </head>
    <body>
    <h1>分布式漏扫架构API测试</h1>
    <hr>
    <h3>插件API测试</h3>
    <hr>
    <h4>NmapAPI测试</h4>
		 <hr>
    <form class='form-inline' >

    <div class="form-group" display:inline-block>
    <button type="button" class="btn btn-default btn-lrg port_scan" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; 端口扫描
    </button>

        <input class="form-control" id="port_scan_iplist" placeholder="IP List" type="text">
        <input class="form-control" id="port_scan_black_list" placeholder="Black List" type="text">
        <input class="form-control" id="port_scan_agent_id" placeholder="agent ID" type="text">

    </div>

     
		<hr>

    <div class="form-group" display:inline-block>
    
    <button type="button" class="btn btn-default btn-lrg cron_plugins" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; 计划扫描任务
    </button>
        <input class="form-control" id="cron_plugins_iplist" placeholder="IP List" type="text">
        <input class="form-control" id="cron_plugins_list" placeholder="Black List" type="text">
        <input class="form-control" id="cron_plugins_agent_id" placeholder="agent ID" type="text">
        <input class="form-control" id="cron_plugins_cron" placeholder="CRON表达式" type="text">
   </div>
   
    <hr>
    <div class="form-group" display:inline-block>

    <button type="button" class="btn btn-default btn-lrg unregister_cron_plugins" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; 注销CRON任务
    </button>
    
    <input class="form-control" id="unregister_cron_plugins_task_id" placeholder="任务 ID" type="text">
   </div>
    <hr>
    <h4>AWVS-API测试</h4>
		 <hr>
		     <div class="form-group" display:inline-block>
    <button type="button" class="btn btn-default btn-lrg awvs_scan" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; Web扫描
    </button>

        <input class="form-control" id="awvs_scan_scan_target" placeholder="扫描目标:URL" type="text">

			<input class="form-control" id="awvs_scan_agent_id" placeholder="agent ID" type="text">
    </div>

     
		<hr>

    <div class="form-group" display:inline-block>
    
    <button type="button" class="btn btn-default btn-lrg awvs_scan_cron_plugins" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; 计划扫描任务
    </button>
        <input class="form-control" id="awvs_scan_cron_plugins_scan_target" placeholder="扫描目标" type="text">
        <input class="form-control" id="awvs_scan_cron_plugins_agent_id" placeholder="agent ID" type="text">
        <input class="form-control" id="awvs_scan_cron_plugins_cron" placeholder="CRON表达式" type="text">
   </div>
   
    <hr>
    <div class="form-group" display:inline-block>

    <button type="button" class="btn btn-default btn-lrg unregister_cron_plugins" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; 注销CRON任务
    </button>
    
    <input class="form-control" id="unregister_cron_plugins_task_id" placeholder="任务 ID" type="text">
   </div>
   
    <hr>
    <div class="form-group" display:inline-block>

    <button type="button" class="btn btn-default btn-lrg  awvs_get_report" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; 获取报告
    </button>
    <input class="form-control" id="awvs_get_report_agent_id" placeholder="Agent ID" type="text">
 
   </div>

    <hr>
      <h4>PocScanner-API测试</h4>
		 <hr>
		 
		 <div class="form-group" display:inline-block>
    <button type="button" class="btn btn-default btn-lrg sync_poc_file" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; PoC下发
    </button>

			<input class="form-control" id="sync_poc_file_poc_file_content" placeholder="PoC代码" type="text">
			<input class="form-control" id="sync_poc_file_poc_type" placeholder="PoC框架类型" type="text">
     <input class="form-control" id="sync_poc_file_poc_file_name" placeholder="PoC文件名" type="text">
			<input class="form-control" id="sync_poc_file_agent_id" placeholder="agent ID" type="text">
    </div>

     
		<hr>

    <div class="form-group" display:inline-block>
    
    <button type="button" class="btn btn-default btn-lrg batch_execute_poc" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; PoC执行
    </button>
    
        <input class="form-control" id="batch_execute_poc_target_list" placeholder="http://172.16.204.12:668" type="text">
        <input class="form-control" id="batch_execute_poc_agent_id" placeholder="agent ID" type="text">
 
     
   </div>
   
    <hr>
   <div class="form-group" display:inline-block>
    
    <button type="button" class="btn btn-default btn-lrg batch_execute_poc_cron_plugins" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; 计划PoC扫描任务
    </button>
        <input class="form-control" id="batch_execute_poc_cron_plugins_scan_target" placeholder="http://172.16.204.12:668" type="text">
        <input class="form-control" id="batch_execute_poc_cron_plugins_agent_id" placeholder="agent ID" type="text">
        <input class="form-control" id="batch_execute_poc_cron_plugins_cron" placeholder="CRON表达式" type="text">
   </div>
   
    <hr>
    
    <div class="form-group" display:inline-block>

    <button type="button" class="btn btn-default btn-lrg unregister_cron_plugins" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; 注销CRON任务
    </button>
    
    <input class="form-control" id="unregister_cron_plugins_task_id" placeholder="任务 ID" type="text">
   </div>
   
    <hr>
 
   
      </form>
    <div class="ajax-content">
    </div>
    
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 改成百度的资源-->
    <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $this->_config['PUBLIC_PATH'];?>/js/bootstrap.min.js"></script>
    <script type="text/javascript">

   // To make Pace works on Ajax calls
    $(document).ajaxStart(function() { Pace.restart(); });
////////////////////////////////////////////////////////////////////////

    $('.port_scan').click(function(){
　
        $.ajax({url: '<?php echo $this->_config['ACTION_URL'];?>/plugin_api/port_scan?agent_id='+$('#port_scan_agent_id').val()+'&ip_list='+$('#port_scan_iplist').val()	, success: function(result){
            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
        }});
     });
     
    $('.cron_plugins').click(function(){

        $.ajax({url: '<?php echo $this->_config['ACTION_URL'];?>/plugin_api/cron_plugins?agent_id='
        		+$('#cron_plugins_agent_id').val()+'&ip_list='+$('#cron_plugins_iplist').val()
        		+'&cron='+$('#cron_plugins_cron').val(), 
        		success: function(result){
      
            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
        }});
     });
     
    $('.unregister_cron_plugins').click(function(){
　
        $.ajax({url: '<?php echo $this->_config['ACTION_URL'];?>/plugin_api/unregister_cron_plugins?task_id='+$('#unregister_cron_plugins_task_id').val()	, success: function(result){
            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
        }});
     });
    
    $('.awvs_scan').click(function(){
 	        $.ajax({url: '<?php echo $this->_config['ACTION_URL'];?>/plugin_api/awvs_scan?agent_id='+$('#awvs_scan_agent_id').val()+'&scan_target='+$('#awvs_scan_scan_target').val()	, success: function(result){
    	            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
    	        }});
    	});
    
    $('.awvs_get_report').click(function(){
 	        $.ajax({url: '<?php echo $this->_config['ACTION_URL'];?>/plugin_api/awvs_get_report?agent_id='+$('#awvs_get_report_agent_id').val()	, success: function(result){
    	            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
    	        }});
    	});

    $('.awvs_scan_cron_plugins').click(function(){
	        $.ajax({url: '<?php echo $this->_config['ACTION_URL'];?>/plugin_api/awvs_task_cron_plugins?agent_id='+$('#awvs_scan_cron_plugins_agent_id').val()+'&scan_target='+$('#awvs_scan_cron_plugins_scan_target').val()	+'&cron='+$('#awvs_scan_cron_plugins_cron').val(), success: function(result){
	            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
	        }});
	});
    
    $('.sync_poc_file').click(function(){
       	var q_url = '<?php echo $this->_config['ACTION_URL'];?>/plugin_api/sync_poc_file?agent_id='+$('#sync_poc_file_agent_id').val()+'&poc_file_name='+$('#sync_poc_file_poc_file_name').val()+'&poc_type='+$('#sync_poc_file_poc_type').val()+'&poc_file_content='+$('#sync_poc_file_poc_file_content').val();
 
           $.ajax({url: q_url
       		, success: function(result){

            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
       		 }});
           
           });
    
    $('.batch_execute_poc').click(function(){
       	   var q_url = '<?php echo $this->_config['ACTION_URL'];?>/plugin_api/batch_execute_poc?agent_id='+$('#batch_execute_poc_agent_id').val();
 
           $.ajax({url: q_url
       		, success: function(result){

            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
       		 }});
           
           });
    
    $('.batch_execute_poc_cron_plugins').click(function(){
        $.ajax({url: '<?php echo $this->_config['ACTION_URL'];?>/plugin_api/batch_execute_poc_cron_plugins?agent_id='+$('#batch_execute_poc_cron_plugins_agent_id').val()+'&cron='+$('#batch_execute_poc_cron_plugins_cron').val(), success: function(result){
            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
        }});
});
</script>
  </body>
</html>