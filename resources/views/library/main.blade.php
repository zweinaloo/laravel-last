
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
                  <a href="#" data-title="展开/收缩" data-collapsed="true" class="tip collapse"><i class="icon-chevron-up"></i></a>
                </div>
              </div>
              <div class="widget-header-under"><h4>个人信息</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
           <!--       <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="#" ><i class="icon-user"></i><span>查看个人信息</span></a>-->
                  <a class="btn btn-box span3" href="/User/resetUserInfoShow" data-bubble="2"><i class="icon-edit"></i><span>修改个人信息</span></a>
                </div>	
              </div><!--/widget-body-->
			  <div class="widget-header-under"><h4>查找书籍</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="/BookFind/onExact" ><i class="icon-user"></i><span>精确查找</span></a>
                  <a class="btn btn-box span3" href="/BookFind/onFuzzy" data-bubble="2"><i class="icon-edit"></i><span>模糊查找</span></a>

                </div>	
              </div><!--/widget-body-->
			   <div class="widget-header-under"><h4>借阅记录</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="#" ><i class="icon-user"></i><span>正在借阅书籍记录</span></a>
                  <a class="btn btn-box span3" href="#" data-bubble="2"><i class="icon-edit"></i><span>历史借阅书籍记录</span></a>
				  <a class="btn btn-box span3" href="#" data-bubble="2"><i class="icon-edit"></i><span>全部借阅书籍记录</span></a>
                </div>	
              </div><!--/widget-body-->
			       <div class="widget-header-under"><h4>归还记录</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="#" ><i class="icon-user"></i><span>未归还借书籍记录</span></a>
                  <a class="btn btn-box span3" href="#" data-bubble="2"><i class="icon-edit"></i><span>历史归还书籍记录</span></a>
				  <a class="btn btn-box span3" href="#" data-bubble="2"><i class="icon-edit"></i><span>全部归还书籍记录</span></a>				  
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
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="#" ><i class="icon-user"></i><span>添加图书信息</span></a>
                  <a class="btn btn-box span3" href="#" data-bubble="2"><i class="icon-edit"></i><span>更新图书信息</span></a>
				  <a class="btn btn-box span3" href="#" data-bubble="2"><i class="icon-edit"></i><span>删减图书信息</span></a>
						  
                </div>	
              </div><!--/widget-body-->
				<div class="widget-header-under"><h4>图书管信息管理</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="#" ><i class="icon-user"></i><span>图书管信息</span></a>
                  <a class="btn btn-box span3" href="#" data-bubble="2"><i class="icon-edit"></i><span>图书类型管理</span></a>				  
				<a class="btn btn-box span3" href="#" data-bubble="2"><i class="icon-edit"></i><span>图书室信息管理</span></a>				  		
			  
                </div>	
              </div><!--/widget-body-->


					  <div class="widget-header-under"><h4>借阅图书管理</h4></div>
              <div class="widget-body" style="height: 120px;">
              	<div class="row-fluid" style="margin-bottom:15px;">
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="#" ><i class="icon-user"></i><span>借阅管理</span></a>
                  <a class="btn btn-box span3" href="#" data-bubble="2"><i class="icon-edit"></i><span>归还管理</span></a>
			  
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
                  <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="#" ><i class="icon-user"></i><span>添加图书信息</span></a>
                  <a class="btn btn-box span3" href="#" data-bubble="2"><i class="icon-edit"></i><span>用户信息管理</span></a>
				  <a class="btn btn-box span3" href="#" data-bubble="2"><i class="icon-edit"></i><span>用户安全信息</span></a>				  
                </div>	
              </div><!--/widget-body-->
			           <div class="widget-header-under"><h4>用户权限管理</h4></div>
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
