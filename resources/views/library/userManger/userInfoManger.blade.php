@extends('library.home')
@section('head')
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js"></script>
		<script src="/js/myjs/UserManger.js" type="text/javascript"></script>
@stop
@section('mainwindow')
		 <!--@parent-->
      <div class="main_container" id="dashboard_page">
        <div class="row-fluid">
        
        </div>  
		
		<ul class="breadcrumb">
            <li><a href="/home">主页</a> <span class="divider">/</span></li>
            <li><a href="/BookManger/">用户管理</a> <span class="divider">/</span></li>
            <li class="active">用户信息管理</li>
        </ul>
	
		
		

	<div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header">
              <i class="icon-group"></i>
              <h5>用户信息管理</h5>
              <div class="widget-buttons">
                
                  <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
              </div>
            </div>  
            <div id="table" class="widget-body">
              <table id="example" class="table table-striped table-bordered dataTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>邮箱</th>
					<th>密码</th>
                    <th>权限</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody>
				@foreach($user as $user)
                 <tr>
				 
                    <td>{{$user->id or ''}}</td>
                    <td>{{$user->name or ''}}</td>
					<td>{{$user->email or ''}}</td>
                    <td title="Click to select engine version">******</td>
					
					<td>{{$user->style->name or ''}}</td>
                   <!-- <td><span class="label label-success"></span></td>-->
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
                        操作
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                          
                          <li><a href="/User/show/updatePassword/{{$user->id}}"><i class="icon-user"></i> 修改密码</a></li>
						  <li><a href="/User/resetuserInfoShow/{{$user->id}}"><i class="icon-edit"></i> 修改信息</a></li>
                          
                        </ul>
						
                      </div>
                    </td>
                  </tr>
				  
				@endforeach
                   </tbody>
				  
              </table>
            </div> <!-- /widget-body -->
			<div class="widget-footer">
			<center>
               </center>
            </div>
          </div> <!-- /widget -->
        </div> <!-- /row-fluid -->
		
		
      
@stop
