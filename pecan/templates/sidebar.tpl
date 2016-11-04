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
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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

        <li><a href="<!--{ACTION_URL}-->"><i class="fa fa fa-dashboard"></i> <span>面板</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-user"></i> <span>用户</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
            <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>帐号管理</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>角色管理</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>权限管理</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>授权管理</span></a></li>
          </ul>
        </li>
        
        <li class="treeview" >
          <a href="#"><i class="fa fa-file-o "></i> <span>文章</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
            <li><a href="<!--{ACTION_URL}-->/post/add"><i class="fa fa-circle-o text-green"></i> <span>编写</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>文章</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>分类</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>草稿箱</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>授权管理</span></a></li>
          </ul>
        </li>
        
          <li class="treeview">
          <a href="#"><i class="fa fa-plug"></i> <span>插件</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>域名</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-archive"></i> <span>资产</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>IP</span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>域名</span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>资产发现</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-wrench"></i> <span>Agent</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>Agent管理</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-search"></i> <span>Web扫描</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>扫描</span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>报告</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-search"></i> <span>主机扫描</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>扫描</span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>报告</span></a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-search"></i> <span>端口扫描</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>扫描</span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>报告</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-search"></i> <span>指纹扫描</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
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
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>扫描</span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>报告</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-file-text"></i> <span>扫描报告</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
   <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>扫描概况</span></a></li>
   <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>报告管理</span></a></li>
          </ul>
        </li>
        
 <li class="treeview">
          <a href="#"><i class="fa fa-cog"></i> <span>设置</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
   <li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>系统配置</span></a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  
  