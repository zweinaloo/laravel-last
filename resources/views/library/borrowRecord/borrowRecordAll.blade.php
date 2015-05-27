@extends('library.home')

@section('head')
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="/js/js1/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="/js/js1/1.10.5/js/jquery.dataTables.js"></script>
<script type='text/javascript' src='/js/myjs.js'></script>
@stop
@section('mainwindow')
		 <!--@parent-->
      <div class="main_container" id="dashboard_page">
        <div class="row-fluid">
        </div>  
		
		<ul class="breadcrumb">
            <li><a href="/home">主页</a> <span class="divider">/</span></li>
            <li><a href="/BookManger/">借阅记录</a> <span class="divider">/</span></li>
            <li class="active">{{ $reader->name or '无查询' }}</li>
          </ul>
		  @if ((Auth::user()->user_roles_id)<3)
		 <div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header"><i class="icon-list-alt"></i><h5>查询</h5></div>
            <div class="widget-body" style="height: 80px;">
              <div class="widget-forms clearfix "  >
                 @if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>错误!</strong> 你的输入有些问题.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
				<form class="form-inline" id="search"   action="/BorrowRecord/SearchRecord" method="post">		
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<label class="control-label">查询信息：</label>
                  <input type="text" name="find" class="span2" placeholder="查询信息" value="{{$find['find'] or ''}}">
				  <label class="control-label ">查询类型：</label>
                 <select class="span2 selectpicker show-tick" >
								<option value="1">按学号</option>
								<option value="1">按姓名</option>													
								</select>
                  
                </form>	
				</div>

            </div>
          </div>   
		    <div class="widget-footer">
             <p></p>
			 	<script>
				function search(){
				document.getElementById("search").submit();			
				}
			</script>
			 <center><button class="btn btn-success" type="button" onclick="search()">查找</button>
               <button class="btn" type="button">Cancel</button></center>
            </div>

		 </div>
		 @endif
		  
		  
		  
		  
	

			<div class="row-fluid">
			
          <div class="widget widget-padding span12">
           <div class="widget-header"><i class="icon-list-alt"></i><h5>借阅&归还记录</h5></div>
            <div id="table" class="widget-body">
			<div class="tabbable" id="tabs-947176">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-600648" data-toggle="tab">借阅记录</a>
					</li>
					<li>
						<a href="#panel-925495" data-toggle="tab">归还记录</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-600648">
						
							<!--第一部分内容.-->
						 <table id="borrowRecord" class="table table-striped table-bordered dataTable">
                <thead>
                  <tr>
                  <th>借阅编号</th>
                    <th>书号</th>
                    <th>书名</th>
					<th>类型</th>
					<th>位置</th>
                    <th>借阅日期</th>
					<th>到期日期</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody>
				@if($data)
				@foreach($data as $data )
				@if($data->isreturn !=1)
                 <tr>
                    <td>{{$data->id }}</td>
                    <td>{{$data->Book_id }}</td>
                    <td>{{$data->Book_name }}</td>
					<td>{{$data->Book_style_name }}</td>
					 <td>{{$data->Book_shelf_name}}</td>
					<td>{{$data->Borrowing_Record_date }}</td>
					<td>{{$data->havetoreturn}}</td>			
					<td>
                      <div class="btn-group">
                        <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
                        操作
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                          
                          <li><a href="/BorrowRecord/Renew/{{$data->id}}"><i class="icon-edit"></i> 续借</a></li>
                        
                        </ul>
                      </div>
                    </td>
                  </tr>
				@endif
				@endforeach
				@endif
                   </tbody>
              </table>
            
					</div>
					<div class="tab-pane" id="panel-925495">
					<!--第二部分-->
					<table id="returnRecord" class="table table-striped table-bordered dataTable">
                <thead>
                  <tr>
                  <th>归还编号</th>
                    <th>书号</th>
                    <th>书名</th>
					<th>类型</th>
					<th>位置</th>
                    <th>归还日期</th>
			
                 
                  </tr>
                </thead>
                <tbody>
				@if($data)
				@foreach($data1 as $data1 )
                 <tr>
                    <td>{{$data1->id }}</td>
                    <td>{{$data1->Book_id }}</td>
                    <td>{{$data1->Book_name }}</td>
					<td>{{$data1->Book_style_name }}</td>
					 <td>{{$data1->Book_shelf_name}}</td>
					<td>{{$data1->Return_record_date }}</td>
			
                  </tr>
		
				@endforeach
				
				@endif
                   </tbody>
              </table>
            
					</div>
				</div>
			</div>
             </div> <!-- /widget-body -->
          </div> <!-- /widget -->
        </div> <!-- /row-fluid -->

@stop