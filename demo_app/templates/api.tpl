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
    <link href="<!--{PUBLIC_PATH}-->/css/bootstrap.min.css" rel="stylesheet">
    <!-- 如果低于IE9 引入HTML标签支持和媒体查询 -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="<!--{PUBLIC_PATH}-->/pace/pace.js"></script>
    <link href="<!--{PUBLIC_PATH}-->/pace/pace-theme-loading-bar.css" rel="stylesheet" />
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
    <h3>通用API测试</h3>
    <hr>
    <form class='form-inline' >
    <button type="button" class="btn btn-default btn-lrg ajax" title="Ajax Request">
            <i class="fa fa-spin fa-refresh"></i>&nbsp; get_results
    </button>
    <hr>
    <button type="button" class="btn btn-default btn-lrg get_agent_list" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; get_agent_list
    </button>
    <hr>
    <div class="form-group" display:inline-block>
    <button type="button" class="btn btn-default btn-lrg register_agent" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; register_agent
    </button>

        <input class="form-control" id="register_agent_agent_name" placeholder="agent 名称" type="text">
        <input class="form-control" id="register_agent_agent_ip" placeholder="agent IP" type="text">
        <input class="form-control" id="register_agent_agent_port" placeholder="agent 端口" type="text">
        <input class="form-control" id="register_agent_agent_position" placeholder="agent 位置 0,1" type="text">
      </div>
<hr>
    <div class="form-group" display:inline-block>
    <button type="button" class="btn btn-default btn-lrg unregister_agent" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; unregister_agent
    </button>

        <input class="form-control" id="unregister_agent_agent_id" placeholder="agent ID" type="text">

      </div>
     
<hr>
    <div class="form-group" display:inline-block>
    
    <button type="button" class="btn btn-default btn-lrg update_agent_status" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; update_agent_status
    </button>
    
      </div>

      <hr>
      
    <div class="form-group" display:inline-block>
    
    <button type="button" class="btn btn-default btn-lrg plugin_running_status" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; plugin_running_status
    </button>
    <input class="form-control" id="plugin_running_status_agent_id" placeholder="agent ID" type="text">
   </div>
    <hr>
    
          <div class="form-group" display:inline-block>
    <button type="button" class="btn btn-default btn-lrg is_alive" title="Ajax Request">
            <i class="	fa fa-spin fa-refresh"></i>&nbsp; is_alive
    </button>

        <input class="form-control" id="is_alive_agent_id" placeholder="agent ID" type="text">

      </div>
     
<hr>
      </form>
    <div class="ajax-content">
    </div>
    
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 改成百度的资源-->
    <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<!--{PUBLIC_PATH}-->/js/bootstrap.min.js"></script>
    <script type="text/javascript">

   // To make Pace works on Ajax calls
    $(document).ajaxStart(function() { Pace.restart(); });

    $('.ajax').click(function(){
        $.ajax({url: '<!--{ACTION_URL}-->/index/get_results', success: function(result){
            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
        }});
     });
    $('.get_agent_list').click(function(){
        $.ajax({url: '<!--{ACTION_URL}-->/index/get_agent_list', success: function(result){
            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
        }});
     });
     
     
    $('.register_agent').click(function(){
        $.ajax({url: '<!--{ACTION_URL}-->/index/register_agent?agent_name='+$('#register_agent_agent_name').val()+'&agent_ip='+$('#register_agent_agent_ip').val(), success: function(result){
            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
        }});
     });
    $('.unregister_agent').click(function(){
        $.ajax({url: '<!--{ACTION_URL}-->/index/unregister_agent?agent_id='+$('#unregister_agent_agent_id').val(), success: function(result){
            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
        }});
     });
     $('.update_agent_status').click(function(){
        $.ajax({url: '<!--{ACTION_URL}-->/index/update_agent_status', success: function(result){
            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
        }});
     });
     
     $('.plugin_running_status').click(function(){
        $.ajax({url: '<!--{ACTION_URL}-->/index/plugin_running_status?agent_id='+$('#plugin_running_status_agent_id').val(), success: function(result){
            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
        }});
     });
     
     $('.is_alive').click(function(){
        $.ajax({url: '<!--{ACTION_URL}-->/index/is_alive?agent_id='+$('#is_alive_agent_id').val(), success: function(result){
            $('.ajax-content').html('<h4>返回结果</h4><hr>'+getTime()+'<hr>'+result);
        }});
     });
     
</script>
  </body>
</html>