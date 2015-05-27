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
            <li><a href="/BookManger/">查找书籍</a> <span class="divider">/</span></li>
            <li class="active">模糊查找</li>
          </ul>


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
                    <td>{{$book->Book_name }}</td>
                    <td>{{$book->writer }}</td>
					<td>{{$book->style->Book_style_name }}</td>
					 <td>{{$book->shelf->BookRoom->Book_room_name }}-{{$book->shelf->Book_shelf_name }}</td>
					@if ($book->count === 0)
						<td><span class="label">已借出</span></td>                    
                    @else
				    <td><span class="label label-success">在库</span></td>
					@endif
			
					<td>
                      <div class="btn-group">
                        <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
                        操作
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                          
                          <li><a href="/BookManger/updateBook/{{$book->id}}"><i class="icon-edit"></i> 查看详情</a></li>
                          <li><a href="/BookManger/deleteBook/{{$book->id}}" ><i class="icon-trash"></i> 预订</a></li>
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
