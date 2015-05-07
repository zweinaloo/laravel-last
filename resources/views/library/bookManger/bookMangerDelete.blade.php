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
		
		
      
@stop
