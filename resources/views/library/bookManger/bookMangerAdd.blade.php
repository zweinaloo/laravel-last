@extends('library.home')

@section('mainwindow')
		 <!--@parent-->
      <div class="main_container" id="dashboard_page">
        <div class="row-fluid">
        
        </div>  
		<ul class="breadcrumb">
            <li><a href="/home">主页</a> <span class="divider">/</span></li>
            <li><a href="/BookManger/">图书管理</a> <span class="divider">/</span></li>
            <li class="active">添加图书</li>
          </ul>


		<!--书籍信息添加-->
		<div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header">
              <i class="icon-edit"></i><h5>添加新书籍</h5>
              <div class="widget-buttons">
                  <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
              </div>
            </div>
            <div class="widget-body">
              <div class="widget-forms clearfix">
                <form class="form-horizontal" role="form" method="POST" action="/BookManger/add">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="control-group">
                    <label class="control-label">书号</label>
                    <div class="controls">
                      <input class="span7" type="text" name="Book_id" placeholder="书号(ID)" >      
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">书名</label>
                    <div class="controls">
                      <input class="span7" type="text" name="name" placeholder="书名(BN)" >      
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">作者</label>
                    <div class="controls">
                      <input class="span7" name="writer" type="text" placeholder="作者" >
                    </div><div class="control-group">
                  </div>
				   <div class="control-group">
                    <label class="control-label">出版社</label>
                    <div class="controls">
                      <input class="span7" name="publish" type="text" placeholder="出版社" >
                    </div>
                  </div
               <div class="control-group">
                    <label class="control-label">书籍类型</label>
                    <div class="controls">
								<select class="span5" name="style">
								<option selected="selected" value="{{ $book->style->id or '' }}">{{ $book->style->Book_style_name or '' }}</option>
								@foreach ($style as $style)
								<option value="{{ $style->id }}">{{ $style->Book_style_name or '' }}</option>
								@endforeach
							
								</select>
					</div>
                  </div>
                 
				  
				<div class="control-group">
                    <label class="control-label">书架位置</label>
                    <div class="controls">
								<select class="span5" name="shelf">
								<option selected="selected" value="{{ $book->shelf->id or '' }}">{{$book->shelf->BookRoom->BooK_room_name or ''}}-{{ $book->shelf->Book_shelf_name or '' }}</option>
								@foreach ($shelf as $shelf)
								<option value="{{ $shelf->id }}">{{$shelf->BookRoom->Book_room_name}}-{{ $shelf->Book_shelf_name or '' }}</option>
								@endforeach
								
								</select>
					</div>
                  </div>
				  
				  
				   <div class="control-group">
                    <label class="control-label">数量</label>
                    <div class="controls">
                      <input class="span7" name="count" type="text" placeholder="添加数量" >
                    </div>
                  </div>  
                <div class="control-group">
                    <label class="control-label">附注</label>
                      <div class="controls">
                        <textarea class="span7" rows="5" name="mark" style="height:100px;">说些什么吧。。。。。。</textarea>
                      </div>
                </div>
				 <div class="widget-footer">
              <center> <button class="btn btn-primary" type="submit">提交</button>
               <button class="btn" type="button">放棄</button>
            </center></div>
				    </form>
            
            
           
				  
      
@stop
