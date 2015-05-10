@extends('library.home')

@section('head')
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js"></script>
<script type='text/javascript' src='/js/myjs.js'></script>
@stop   
@section('mainwindow')
		 <!--@parent-->
      <div class="main_container" id="dashboard_page">
        <div class="row-fluid">
        <div>  
		
		<ul class="breadcrumb">
            <li><a href="/home">主页</a> <span class="divider">/</span></li>
            <li><a href="/BookManger/">查找书籍</a> <span class="divider">/</span></li>
            <li class="active">精确查找</li>
          </ul></div>
		 <div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header"><i class="icon-list-alt"></i><h5>查询</h5></div>
            <div class="widget-body" style="height: 120px;">
              <div class="widget-forms clearfix">
                
				<form class="form-inline" id="search"   action="/BookFind/onExactSearch">			
				<label class="control-label">查询信息：</label>
                  <input type="text" name="find" class="span2" placeholder="查询信息" value="{{$find["find"] or ''}}">
				  <label class="control-label ">查询类型：</label>
                 <select class="span2 selectpicker show-tick" name="style">
								<option value="1">按书号</option>								
								<option value="2">按书名</option>								
								<option value="3">按作者</option>
								</select>
                  
                </form>	
				</div>

            </div>
          </div>   
		    <div class="widget-footer">
             <p></p>
			 	<script>
				function search(){
				document.getElementById("search").submit();mn 				
				}
			</script>
			 <button class="btn btn-success" type="button" onclick="search()">查找</button>
               <button class="btn" type="button">Cancel</button>
            </div>

		 </div>
		  
		  
		  
		  
	

			<div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header">
              <i class="icon-group"></i>
              <h5> 查询结果</h5>
              <div class="widget-buttons">
                
                  <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
              </div>
            </div>  
            <div id="table" class="widget-body">
              <table id="example" class="table table-striped table-bordered dataTable">
                <thead>
                  <tr>
                    <th>书号</th>
                    <th>书名</th>
                    <th>作者</th>
          					<th>类型</th>
          					<th>位置</th>
                    <th>状态</th>					
                    <th>操作</th>
					
					
                  </tr>
                </thead>
                <tbody>
				@if($book)
				@foreach($book as $book )
                 <tr>
                    <td>{{$book->Book_id }}</td>
                    <td title="Click to select engine version">{{$book->Book_name }}</td>
                    <td>{{$book->writer }}</td>
					<td>{{$book->style->Book_style_name }}</td>
					 <td>{{$book->shelf->BookRoom->Book_room_name }}{{$book->shelf->Book_shelf_name}}</td>
					@if ($book->count === 0)
						<td><span class="label">已借出</span></td>                    
                    @else
				    <td><span class="label label-success">可借阅</span></td>
					@endif
			
					<td>
                      <div class="btn-group">
                        <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
                        操作
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                          
                          <li><a href="/BookManger/updateBook/{{$book->id}}"><i class="icon-edit"></i> 查看详情</a></li>
                          <li><a href="/BookManger/deleteBook1/{{$book->id}}" ><i class="icon-trash"></i> 预订</a></li>
                        </ul>
                      </div>
                    </td>
                  </tr>
				
				@endforeach
				@endif
                   </tbody>
              </table>
            </div> <!-- /widget-body -->
          </div> <!-- /widget -->
        </div> <!-- /row-fluid -->
     
		
	
		
		

  
@stop 
            
		

      

