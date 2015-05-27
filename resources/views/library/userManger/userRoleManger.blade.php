@extends('library.home')




@section('head')


@stop
@section('mainwindow')
		 <!--@parent-->
      <div class="main_container" id="dashboard_page">
        <div class="row-fluid">
        
        </div>  
		<ul class="breadcrumb">
            <li><a href="/home">主页</a> <span class="divider">/</span></li>
            <li><a href="/BookManger/">用户管理</a> <span class="divider">/</span></li>
            <li class="active">用户权限管理</li>
        </ul>


		<!--用户权限管理-->
		<div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header">
              <i class="icon-edit"></i><h5>用户权限管理</h5>
              <div class="widget-buttons">
                  <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
              </div>
            </div>
			
			 <div id="table" class="widget-body">
			 						  @if ($msg == 2)
						<div class="alert ">
							<strong>权限组{{$style->name}}已更新成功</strong> <br><br>
						</div>
						@elseif ($msg ==1)
						<div class="alert ">
							<strong>权限组{{$style->name}}已添加成功</strong> <br><br>
							
						</div>
					
					@endif

			<div class="tabbable" id="tabs-947176">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-600648" data-toggle="tab">用户权限组添加</a>
					</li>
					<li>
						<a href="#panel-925495" data-toggle="tab">用户权限组编辑</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-600648">
						 <div class="widget-forms clearfix">
						 
                <form class="form-horizontal" role="form" method="POST" id="form1"  action="/UserManger/AddRoles">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">


                  <div class="control-group">
                    <label class="control-label">权限组名称</label>
                    <div class="controls">
                      <input class="span7" type="text" name="name" placeholder="添加新的权限组名称" >
                    </div>
				  </div>
				  
				   <div class="control-group">
                    <label class="control-label">可借阅书籍数量</label>
                    <div class="controls">
                      <input class="span7" type="text" name="count" placeholder="添加可借阅书籍数量" >
                    </div>
				  </div>
				  
				   <div class="control-group">
                    <label class="control-label">可借阅书籍期限</label>
                    <div class="controls">
                      <input class="span7" type="text" name="period" placeholder="添加可借阅书籍期限" >
                    </div>
				  </div>
				  
				   <div class="control-group">
                    <label class="control-label">有效期</label>
                    <div class="controls">
                      <input class="span7" type="text" name="validity" placeholder="添加有效期" >
                    </div>
				  </div>
					
					<div class="control-group">
					<div class="controls">
						<button class="btn" type="submit">添加</button>
                    </div>
                 </div>
				
				    </form>
            
            </div>
					</div>
					<div class="tab-pane" id="panel-925495">
						 <div class="widget-forms clearfix">
                <form class="form-horizontal" role="form" method="POST" id="form1"  action="/UserManger/UpdateRoles">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" value="">

                      <div class="control-group">
                    <label class="control-label">权限组名称：</label>
                    <div class="controls">
								<select class="span3" name="name">
								
								@foreach ($styleall as $temp)
								<option value="{{$temp->id}}">{{$temp->name}}</option>
								@endforeach
								</select>
							</div>
                  </div>
				  
				   <div class="control-group">
                    <label class="control-label">可借阅书籍数量</label>
                    <div class="controls">
                      <input class="span7" type="text" name="count" placeholder="未选择权限组名称" >
                    </div>
				  </div>
				  
				   <div class="control-group">
                    <label class="control-label">可借阅书籍期限</label>
                    <div class="controls">
                      <input class="span7" type="text" name="period" placeholder="未选择权限组名称" >
                    </div>
				  </div>
				  
				   <div class="control-group">
                    <label class="control-label">有效期</label>
                    <div class="controls">
                      <input class="span7" type="text" name="validity" placeholder="未选择权限组名称" >
                    </div>
				  </div>
					
					<div class="control-group">
					<div class="controls">
						<button class="btn" type="submit">更新</button>
                    </div>
                 </div>
				
				    </form>
					</div>
				</div>
			</div>
		 </div>
		
		
		</div>
      
@stop
