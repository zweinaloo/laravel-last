
@extends('library.home')

@section('mainwindow')
<!-- Main window -->
		  <div class="main_container" id="tables_page">
          <div class="row-fluid">
		  
		  <!-- 读者功能 -->
			<div>
            <ul class="breadcrumb">
              <li><a href="/">主页</a> <span class="divider">/</span></li>
              <li><a href="/">主菜单</a> <span class="divider">/</span>欢迎{{ Auth::user()->reader->name }} 进入图书管理系统</li>
            
        
            </ul>
            
			</div>
          </div> <!-- /row-fluid -->
          <div class="row-fluid">
			<!--个人信息 --> 
			<!--/个人信息 -->
            <div class="widget widget-padding span12">
              <div class="widget-header">
                <i class="icon-circle"></i>
                <h5>读者功能</h5>
                <div class="widget-buttons">
                  <a href="#" data-title="展开/收缩" data-collapsed="flase" class="tip collapse"><i class="icon-chevron-up"></i></a>
                </div>
              </div>
              <div class="widget-header-under"><h4>个人信息</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box span3" href="/User/resetUserInfoShow" data-bubble="2"><i class="icon-edit"></i><span>修改个人信息</span></a>
				  <a class="btn btn-box span3" href="/User/show/updatePassword/{{Auth::user()->id}}" data-bubble="2"><i class="icon-key"></i><span>修改个人密码</span></a>
                </div>	
              </div><!--/widget-body-->
			  <div class="widget-header-under"><h4>查找书籍</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="/BookFind/onExact" ><i class="icon-search"></i><span>精确查找</span></a>
                  <a class="btn btn-box span3" href="/BookFind/onFuzzy" data-bubble="2"><i class="icon-search"></i><span>模糊查找</span></a>

                </div>	
              </div><!--/widget-body-->
			   <div class="widget-header-under"><h4>借阅记录</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="/BorrowRecord/SearchRecord/self" ><i class="icon-list-alt"></i><span>借阅书籍记录</span></a>
                </div>	
              </div><!--/widget-body-->
            </div><!-- /widget -->
		</div> <!-- /row-fluid -->	
			<!--/个人信息 读者功能 -->

			    <!--图书管理员 -->
		<div class="row-fluid">
            <div class="widget widget-padding span12">
              <div class="widget-header">
                <i class="icon-circle"></i>
                <h5>图书管理员功能</h5>
                <div class="widget-buttons">
                  <a href="#" data-title="展开/收缩" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
                </div>
              </div>
              <div class="widget-header-under"><h4>图书信息管理</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="/BookManger/addShow" ><i class="icon-edit"></i><span>添加图书信息</span></a>
                  <a class="btn btn-box span3" href="/BookManger/updateShow" data-bubble="2"><i class="icon-edit"></i><span>更新图书信息</span></a>
				  <a class="btn btn-box span3" href="/BookManger/deleteShow" data-bubble="2"><i class="icon-edit"></i><span>删减图书信息</span></a>					  
                </div>	
              </div><!--/widget-body-->
				<div class="widget-header-under"><h4>图书类型信息管理</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="/BookStyle/Show/Add" ><i class="icon-edit"></i><span>图书类型添加</span></a>
                  <a class="btn btn-box span3" href="/BookStyle/Show/Update" data-bubble="2"><i class="icon-edit"></i><span>图书类型管理</span></a>				  
				<a class="btn btn-box span3" href="/BookStyle/Show/Delete" data-bubble="2"><i class="icon-edit"></i><span>图书类型删除</span></a>				  					  
                </div>	
              </div><!--/widget-body-->
			  <div class="widget-header-under"><h4>图书室信息管理</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="/LibraryManger/Show/LibraryAdd" ><i class="icon-edit"></i><span>图书室信息添加</span></a>
                  <a class="btn btn-box span3" href="/LibraryManger/Show/LibraryUpdate" data-bubble="2"><i class="icon-edit"></i><span>图书室信息管理</span></a>				  
				<a class="btn btn-box span3" href="/LibraryManger/Show/LibraryDelete" data-bubble="2"><i class="icon-edit"></i><span>图书室信息删除</span></a>				  					  
                </div>	
              </div><!--/widget-body-->


			 <div class="widget-header-under"><h4>借阅图书管理</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="/BorrowManger/Borrow" ><i class="icon-edit"></i><span>借阅管理</span></a>               			  
                </div>	
              </div><!--/widget-body-->
            </div><!-- /widget -->
		</div> <!-- /row-fluid -->	
				<!--/图书管理员 -->

				<!--系统用户管理员 -->
		<div class="row-fluid">
            <div class="widget widget-padding span12">
              <div class="widget-header">
                <i class="icon-circle"></i>
                <h5>系统管理员功能</h5>
                <div class="widget-buttons">
                  <a href="#" data-title="展开/收缩" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
                </div>
              </div>
              <div class="widget-header-under"><h4>用户信息管理</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box span3" href="/UserManger/InfoManger" data-bubble="2"><i class="icon-edit"></i><span>用户信息管理</span></a>
				  <a class="btn btn-box span3" href="/UserManger/RolesManger" data-bubble="2"><i class="icon-edit"></i><span>用户权限管理</span></a>				  
                </div>	
              </div><!--/widget-body-->
			  <!--<div class="widget-header-under"><h4>用户权限管理</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="#" ><i class="icon-user"></i><span>用户权限管理</span></a>
                </div>	
              </div><!--/widget-body-->
            </div><!-- /widget -->
		</div> <!-- /row-fluid -->	
				<!--/系统用户管理员 -->
	
	
		<!-- /Main window -->

@stop
