@extends('library.home')

@section('mainwindow')
		 <!--@parent-->
      <div class="main_container" id="dashboard_page">
        <div class="row-fluid">
        
        </div>  
		<ul class="breadcrumb">
            <li><a href="/home">主页</a> <span class="divider">/</span></li>
            <li><a href="/BookManger/">用户管理</a> <span class="divider">/</span></li>
            <li class="active">修改密码</li>
        </ul>

		<!--个人信息-->
		
		
 <div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header">
              <i class="icon-group"></i>
              <h5>修改密码</h5>
             
            </div>  
            <div id="userinfoshow" class="widget-body">
			
            <form class="form-horizontal" role="form" method="POST" id="form1"  action="/User/updatePasswrod">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

				 <div class="control-group">
                    <label class="control-label">用户名：</label>
                    <div class="controls">  
					<input class="span7" type="text" name="name" readonly="readonly" value="{{$user->name}}" >
					<input class="span7" type="hidden" name="id" readonly="readonly" value="{{$user->id}}" >
                  </div>
				 </div>
				  
                  <div class="control-group">
                    <label class="control-label">密码：</label>
                    <div class="controls">
                      <input class="span7" type="text" name="password" placeholder="密码(password)" value="{{$msg[1] or ''}}" >
                    
                    </div>
                  </div>
                 
				 <div class="control-group">
                   <center><button class="btn @if($msg)btn-success @endif" type="submit" >{{$msg[0] or '修改'}}</button>
				   
                    </center>
                  </div>
				    </form>
					
					
			
			
			
			
			</div> <!-- /widget-body -->
          </div> <!-- /widget -->
        </div> <!-- /row-fluid -->
		
      
@stop
