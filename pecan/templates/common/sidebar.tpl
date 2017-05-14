 <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<!--{PUBLIC_PATH}-->/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{$username}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="搜索...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">后台管理</li>
        <!-- Optionally, you can add icons to the links -->

        <li><a href="<!--{ACTION_URL}-->/dashboard"><i class="fa fa fa-dashboard"></i> <span>面板</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-user"></i> <span>用户</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
            <li><a href="<!--{ACTION_URL}-->/user"><i class="fa fa-circle-o text-green"></i> <span>帐号管理</span></a></li>
            <li><a href="<!--{ACTION_URL}-->/user/role"><i class="fa fa-circle-o text-green"></i> <span>角色管理</span></a></li>
            <li><a href="<!--{ACTION_URL}-->/user/permission"><i class="fa fa-circle-o text-green"></i> <span>权限管理</span></a></li>
          </ul>
        </li>
        
        <li class="treeview " >
          <a href="#"><i class="fa fa-file-o "></i> <span>文章</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
          
            <li><a href="<!--{ACTION_URL}-->/post/add"><i class="fa fa-circle-o text-green"></i> <span>编写</span></a></li>
            <li><a href="<!--{ACTION_URL}-->/post/postlist"><i class="fa fa-circle-o text-green"></i> <span>文章</span></a></li>
            <li><a href="<!--{ACTION_URL}-->/post/category"><i class="fa fa-circle-o text-green"></i> <span>分类</span></a></li>
            <li><a href="<!--{ACTION_URL}-->/post/draft"><i class="fa fa-circle-o text-green"></i> <span>草稿箱</span></a></li>
            <li><a href="<!--{ACTION_URL}-->/post/recycle"><i class="fa fa-circle-o text-green"></i> <span>回收站</span></a></li>
          </ul>
        </li>
        

        <li class="treeview">
          <a href="#"><i class="fa fa-archive"></i> <span>资产</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">待定</small>
            </span>
          </a>
          <ul class="treeview-menu">
  <li><a href="<!--{ACTION_URL}-->/asset/asset_ip"><i class="fa fa-circle-o text-green"></i> <span>IP资产</span></a></li>
  <li><a href="<!--{ACTION_URL}-->/asset/asset_url"><i class="fa fa-circle-o text-green"></i> <span>域名资产</span></a></li>
  <li><a href="<!--{ACTION_URL}-->/asset/asset_discover"><i class="fa fa-circle-o text-green"></i> <span>资产发现</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-wrench"></i> <span>Agent管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
  <li><a href="<!--{ACTION_URL}-->/agent/agent_manage" ><i class="fa fa-circle-o text-green"></i> <span>Agent管理</span></a></li>
    <li><a href="<!--{ACTION_URL}-->/agent/agent_api"><i class="fa fa-circle-o text-green"></i> <span>Agent API授权管理</span></a></li>
      <li><a href="<!--{ACTION_URL}-->/agent/agent_plugin_manage" ><i class="fa fa-circle-o text-green"></i> <span>Agent插件管理</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-search"></i> <span>Web扫描</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
  <li><a href="<!--{ACTION_URL}-->/webscan/scan"><i class="fa fa-circle-o text-green"></i> <span>扫描</span></a></li>
  <li><a href="<!--{ACTION_URL}-->/webscan/report"><i class="fa fa-circle-o text-green"></i> <span>报告</span></a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-search"></i> <span>主机扫描</span>
            <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
  <li><a href="<!--{ACTION_URL}-->/hostscan/scan"><i class="fa fa-circle-o text-green"></i> <span>扫描</span></a></li>
  <li><a href="<!--{ACTION_URL}-->/hostscan/report"><i class="fa fa-circle-o text-green"></i> <span>报告</span></a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-search"></i> <span>端口扫描</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
  <li><a href="<!--{ACTION_URL}-->/portscan/scan"><i class="fa fa-circle-o text-green"></i> <span>扫描</span></a></li>
  <li><a href="<!--{ACTION_URL}-->/portscan/report"><i class="fa fa-circle-o text-green"></i> <span>报告</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-search"></i> <span>指纹扫描</span> 	   
          <span class="pull-right-container">
          <small class="label pull-right bg-green">待定</small>
     
            </span>
          </a>
          <ul class="treeview-menu">
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>扫描</span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>报告</span></a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#"><i class="fa fa-search"></i> <span>PoC扫描</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
  <li><a href="<!--{ACTION_URL}-->/pocscan/manage"><i class="fa fa-circle-o text-green"></i> <span>PoC管理</span></a></li>
  <li><a href="<!--{ACTION_URL}-->/pocscan/scan"><i class="fa fa-circle-o text-green"></i> <span>扫描</span></a></li>
  <li><a href="<!--{ACTION_URL}-->/pocscan/report"><i class="fa fa-circle-o text-green"></i> <span>报告</span></a></li>
          </ul>
        </li>
      <li class="treeview">
          <a href="#"><i class="fa fa-plug"></i> <span>安全扫描插件</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">待定</small>
            </span>
          </a>
          <ul class="treeview-menu">
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>弱密码</span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>未授权访问</span></a></li>
     
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-file-text"></i> <span>扫描报告</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
   <li><a href="<!--{ACTION_URL}-->/report/overview"><i class="fa fa-circle-o text-green"></i> <span>扫描概况</span></a></li>
   <li><a href="<!--{ACTION_URL}-->/report/manage"><i class="fa fa-circle-o text-green"></i> <span>报告管理</span></a></li>
          </ul>
        </li>

 <li><a href="<!--{ACTION_URL}-->/log"><i class="fa fa fa-dashboard"></i> <span>日志</span></a></li>
 <li class="treeview">
          <a href="#"><i class="fa fa-cog"></i> <span>设置</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
   <li><a href="<!--{ACTION_URL}-->/setting"><i class="fa fa-circle-o text-green"></i> <span>系统配置</span></a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  
  