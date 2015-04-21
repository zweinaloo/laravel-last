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
        
        </div>  
		
		<ul class="breadcrumb">
            <li><a href="/home">主页</a> <span class="divider">/</span></li>
            <li><a href="/BookManger/">图书管理</a> <span class="divider">/</span></li>
            <li class="active">删除图书</li>
          </ul>
		
		<!--书籍信息删除
		<div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header"><i class="icon-list-alt"></i><h5>查询</h5></div>
            <div class="widget-body" style="height: 120px;">
              <div class="widget-forms clearfix">
                <form class="form-inline" id="F_form" action="/BookManger/deleteFind">
				<label class="control-label">查询信息：</label>
                  <input type="text" name="find" class="span2" placeholder="查询信息" value="{{$find["find"] or ''}}">
				  <label class="control-label ">查询类型：</label>
                 <select class="span2 selectpicker show-tick" name="style">
								<option value="1">按书号</option>								
								<option value="2">按书名</option>								
								<option value="3">按作者</option>
								</select>
                  <button  type="submit" id="find"class="btn btn-success" >查找</button>
                </form>
				
                <form class="form-inline" style="margin-top: 15px;">
					
                </form>
				
				已找到：{{$book[0] or '无'}}
				
              </div>
            </div>
          </div>
		 </div>
		 -->

	<div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header">
              <i class="icon-group"></i>
              <h5>删除图书</h5>
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
                    <th>简介</th>
                    <th>操作</th>
					
					
                  </tr>
                </thead>
                <tbody>
				@foreach($book as $book)
                 <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->Book_name}}</td>
                    <td>{{$book->writer}}</td>
                    <td><span class="label label-success">在库</span></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
                        操作
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                          
                          <li><a href="/BookManger/updateBook/{{$book->id}}"><i class="icon-edit"></i> 编辑</a></li>
                          <li><a href="/BookManger/deleteBook/{{$book->id}}" ><i class="icon-trash"></i> 删除</a></li>
                        </ul>
                      </div>
                    </td>
                  </tr>
				@endforeach
                   </tbody>
              </table>
            </div> <!-- /widget-body -->
          </div> <!-- /widget -->
        </div> <!-- /row-fluid -->
		
		</div>
      
@stop
