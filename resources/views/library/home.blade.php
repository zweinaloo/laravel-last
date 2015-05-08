<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" >  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Bluth Company">
	 <title>图书管理系统-{{ Auth::user()->name }}</title>
    <link rel="shortcut icon" href="/ico/favicon.html">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/theme.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/alertify.css" rel="stylesheet">
    <link href="http://fonts.useso.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
    <link rel="Favicon Icon" href="/favicon.ico">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
 
	<link href="/css/select2.css" rel="stylesheet">
	<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	
	
	
	<link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
    
	@section('head')
	 @show
  </head>
  
  
  <body onload="show()">
    <div id="wrap">
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <div class="logo"> 
            <img src="/img/logo.png" alt="Realm Admin Template">
          </div>
           <a class="btn btn-navbar visible-phone" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
           <a class="btn btn-navbar slide_menu_left visible-tablet">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
			
          <div class="top-menu visible-desktop">
            <ul class="pull-left">
              <li><a id="messages" data-notification="2" href="#"><i class="icon-envelope"></i> 消息</a></li>
              <li><a id="notifications" data-notification="3" href="#"><i class="icon-globe"></i> 通知</a></li>
            </ul>
			

            <ul class="pull-right">  
              <li><a href="/auth/logout"><i class="icon-off"></i> 注销</a></li>
            </ul>
          </div>

          <div class="top-menu visible-phone visible-tablet">
            <ul class="pull-right">  
              <li><a title="link to View all Messages page, no popover in phone view or tablet" href="#"><i class="icon-envelope"></i></a></li>
              <li><a title="link to View all Notifications page, no popover in phone view or tablet" href="#"><i class="icon-globe"></i></a></li>
              <li><a href="login.html"><i class="icon-off"></i></a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container-fluid">
     
      <!-- Side menu -->
      <div class="sidebar-nav nav-collapse collapse">
        <div class="user_side clearfix">
          <img src="/img/odinn.jpg" alt="Odinn god of Thunder">
		
		  
          <h5>{{ Auth::user()->name }} </h5>
		  <h5>{{ Auth::user()->style->style_name}} </h5>
		  
		  
		  
          <a href="/User/resetUserInfo"><i class="icon-cog"></i> 设置</a>        
        </div>
       
		  
		  
		  <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle b_C3F7A7 collapsed" data-toggle="collapse" data-parent="#accordionuser" href="#User"><i class="icon-user"></i> <span>个人信息</span></a>
            </div>
            <div id="User" class="accordion-body collapse">
              <div class="accordion-inner">
               
                <a class="accordion-toggle" href="/User/resetUserInfoShow"><i class="icon-edit"></i> 修改个人信息</a>
   <a class="accordion-toggle" href="/User/show/updatePassword/{{Auth::user()->id}}"><i class="icon-key"></i> 修改个人密码</a>
              </div>
            </div>
          </div>
		  
		  
		  
		  
		  
          
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle b_C3F7A7 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#BookFind"><i class="icon-search"></i> <span>查找书籍</span></a>
            </div>
            <div id="BookFind" class="accordion-body collapse">
              <div class="accordion-inner">

                <a class="accordion-toggle" href="/BookFind/onExact"><i class="icon-search"></i> 精确查找（快速）</a>
                <a class="accordion-toggle" href="/BookFind/onFuzzy"><i class="icon-search"></i> 模糊查找（较慢）</a>
              </div>
            </div>
          </div>
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle b_9FDDF6 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#BorrowRecord"><i class="icon-list-alt"></i> <span>借阅记录</span></a>
            </div>
            <div id="BorrowRecord" class="accordion-body collapse">
              <div class="accordion-inner">
                <a class="accordion-toggle" href="/BorrowRecord/SearchRecord/self"><i class="icon-list-alt"></i> 借阅书籍记录</a>
              </div>
            </div>
          </div>
		  
		  
          
		@if ((Auth::user()->user_roles_id)<3)
		
		<div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle b_F6F1A2 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#T"><i class="icon-tasks"></i> <span>借阅管理</span></a>
            </div>
			<div id="T" class="accordion-body collapse">
              <div class="accordion-inner">
                <a class="accordion-toggle" href="/BorrowManger/Borrow"><i class="icon-rss"></i> 借书模块</a>
			  </div>
            </div>
          </div>
		
           <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle b_F6F1A2 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#BookManger"><i class="icon-tasks"></i> <span>图书管理</span></a>
            </div>
			<div id="BookManger" class="accordion-body collapse">
              <div class="accordion-inner">
                <a class="accordion-toggle" href="/BookManger/addShow"><i class="icon-rss"></i> 添加图书</a>
                <a class="accordion-toggle" href="/BookManger/updateShow"><i class="icon-calendar"></i> 更新图书信息</a>
                <a class="accordion-toggle" href="/BookManger/deleteShow"><i class="icon-picture"></i> 删除图书信息</a>
		
			  </div>
            </div>
          </div>
		  
		   
		  
		  
		  <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle b_F6F1A2 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#BookStyle"><i class="icon-tasks"></i> <span>图书类型管理<span></a>
            </div>
			<div id="BookStyle" class="accordion-body collapse">
              <div class="accordion-inner">
    
				<a class="accordion-toggle" href="/BookStyle/Show/Add"><i class="icon-rss"></i> 图书类型添加</a>
				<a class="accordion-toggle" href="/BookStyle/Show/Update"><i class="icon-rss"></i> 图书类型编辑</a>
				<a class="accordion-toggle" href="/BookStyle/Show/Delete"><i class="icon-rss"></i> 图书类型删除</a>
			  </div>
            </div>
          </div>
		    <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle b_F6F1A2 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#LibraryManger"><i class="icon-tasks"></i> <span>图书室信息管理</span></a>
            </div>
			<div id="LibraryManger" class="accordion-body collapse">
              <div class="accordion-inner">
    
				<a class="accordion-toggle" href="/LibraryManger/Show/LibraryAdd"><i class="icon-rss"></i> 图书室添加</a>
				<a class="accordion-toggle" href="/LibraryManger/Show/LibraryUpdate"><i class="icon-rss"></i> 图书室编辑</a>
				<a class="accordion-toggle" href="/LibraryManger/Show/LibraryDelete"><i class="icon-rss"></i> 图书室删除</a>
				
				
			  </div>
            </div>
          </div>
		      <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle b_F6F1A2 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#Shelf"><i class="icon-tasks"></i> <span>书架信息信息管理</span></a>
            </div>
			<div id="Shelf" class="accordion-body collapse">
              <div class="accordion-inner">
   
				<a class="accordion-toggle" href="/LibraryManger/Show/ShelfAdd"><i class="icon-rss"></i>书架添加</a>
				<a class="accordion-toggle" href="/LibraryManger/Show/ShelfUpdate"><i class="icon-rss"></i>书架编辑</a>
				<a class="accordion-toggle" href="/LibraryManger/Show/ShelfDelete"><i class="icon-rss"></i> 书架删除</a>
				
			  </div>
            </div>
          </div>
		  
		@endif
		@if ((Auth::user()->user_roles_id)<2)
         <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle b_F6F1A2 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#UserManger"><i class="icon-tasks"></i> <span>用户管理</span></a>
            </div>
			<div id="UserManger" class="accordion-body collapse">
              <div class="accordion-inner">
                <a class="accordion-toggle" href="/UserManger/InfoManger"><i class="icon-rss"></i> 用户信息管理</a>
                <a class="accordion-toggle" href="/UserManger/RolesManger"><i class="icon-calendar"></i> 用户权限管理</a>
            
              </div>
            </div>
          </div>
           @endif

        </div>
      </div>
      <!-- /Side menu -->
	 @section('mainwindow')
			<div class="main_container" id="dashboard_page">
			test 测试 
			</div>
			
		@show
		<div class="row-fluid">
         <span class="tidyTime"></span>
        
		</div> <!-- /row-fluid -->
			
	</div>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/raphael-min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <script type="text/javascript" src='/js/sparkline.js'></script>
    <script type="text/javascript" src='/js/morris.min.js'></script>
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>   
    <script type="text/javascript" src="/js/jquery.masonry.min.js"></script>   
    <script type="text/javascript" src="/js/jquery.imagesloaded.min.js"></script>   
    <script type="text/javascript" src="/js/jquery.facybox.js"></script>   
    <script type="text/javascript" src="/js/jquery.alertify.min.js"></script> 
    <script type="text/javascript" src="/js/jquery.knob.js"></script>
    <script type='text/javascript' src='/js/fullcalendar.min.js'></script>
    <script type='text/javascript' src='/js/jquery.gritter.min.js'></script>
	<script type='text/javascript' src='/js/myjs/SearchReader.js'></script>
	<!-- realm 通知信息设置 -->
    <script type="text/javascript" src="/js/realm.js"></script>
    <!-- 提示框-右上角 -->
	<!--<script type="text/javascript" src="/js/jquery.slimscroll.min.js"></script>  禁用先-->


	
	<script type="text/javascript" src="/js/tidyTime.js"></script>
	<script type="text/javascript" src="/js/mytidyTime.js"></script>	
	
	 <script type="text/javascript" src="/js/select2.min.js"></script>
	


    <script type="text/javascript" src="/js/jquery.slimscroll.min.js"></script>

	</body>
</html>
 
  

