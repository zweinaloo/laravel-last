@extends('library.home')

@section('mainwindow')
		 <!--@parent-->
      <div class="main_container" id="dashboard_page">
        <div class="row-fluid">
        </div>  
		
		<ul class="breadcrumb">
            <li><a href="/home">主页</a> <span class="divider">/</span></li>
            <li><a href="/BookManger/">图书管理</a> <span class="divider">/</span></li>
            <li class="active">更新图书</li>
          </ul>
		 <div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header"><i class="icon-list-alt"></i><h5>查询</h5></div>
            <div class="widget-body" style="height: 120px;">
              <div class="widget-forms clearfix">
                <form class="form-inline" id="F_form" action="/BookManger/updateFind">
				<label class="control-label">查询信息：</label>
                  <input type="text" name="find" class="span2" placeholder="查询信息" value="{{$find["find"] or ''}}">
				  <label class="control-label ">查询类型：</label>
                 <select class="span2 selectpicker show-tick" name="style">
								<option value="1">按书号</option>
								
								<option value="2">按书名</option>								
								<option value="3">按作者</option>
								</select>
                  <button type="submit" class="btn btn-success">查找</button>
                </form>
                <form class="form-inline" style="margin-top: 15px;">
					
                </form>
				@if($book)
				<p>已找到：</p>
				<p>书号：{{$book->id or '？'}} 书名：{{$book->Book_name or '无'}}</p>
				@else
				<p>未找到书籍</p>
				@endif
				
              </div>
            </div>
          </div>
		 </div>
		  
		  
		  
		  
		   <div class="row-fluid">
          <div class="widget widget-padding span12">
           <div class="widget-header">
              <i class="icon-edit"></i><h5>更新书籍信息</h5>
              <div class="widget-buttons">
                  <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
              </div>
            </div>

				<div class="widget-body">
              <div class="widget-forms clearfix">
                <form class="form-horizontal" role="form" id="form1" method="POST" action="/BookManger/update">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="find" value="{{$book->id or '无'}}">

                  <div class="control-group">
                    <label class="control-label">书名</label>
                    <div class="controls">
                      <input class="span7" type="text" name="name" placeholder="书名(MG)" value="{{ $book->Book_name or '' }}">
                    
                    </div>
                  </div>
				  
                  <div class="control-group">
                    <label class="control-label">作者</label>
                    <div class="controls">
                      <input class="span7" name="writer" type="text" placeholder="作者" value="{{ $book->writer or '' }}">
                    </div>
					 </div>
				
				   <div class="control-group">
                    <label class="control-label">出版社</label>
                    <div class="controls">
                      <input class="span7" name="publish" type="text" placeholder="出版社" value="{{ $book->publish or '' }}">
                    </div>
                  </div>
                
                  <div class="control-group">
                    <label class="control-label">书籍类型</label>
                    <div class="controls">
								<select class="span5" name="style">
								<option selected="selected" value="{{ $book->style->Book_style_id or '' }}">{{ $book->style->Book_style_name or '' }}</option>
								@foreach ($style as $style)
								<option value="{{ $style->Book_style_id }}">{{ $style->Book_style_name or '' }}</option>
								@endforeach
							
								</select>
					</div>
                  </div>
                 
				  
				<div class="control-group">
                    <label class="control-label">书架位置</label>
                    <div class="controls">
								<select class="span5" name="shelf">
								<option selected="selected" value="{{ $book->shelf->id or '' }}">{{$book->shelf->BookRoom->name or ''}}-{{ $book->shelf->name or '' }}</option>
								@foreach ($shelf as $shelf)
								<option value="{{ $shelf->id }}">{{$shelf->BookRoom->name}}-{{ $shelf->name or '' }}</option>
								@endforeach
								
								</select>
					</div>
                  </div>
				  
				  
				   <div class="control-group">
                    <label class="control-label">数量</label>
                    <div class="controls">
                      <input class="span7" name="count" type="text" placeholder="添加数量" value="{{ $book->count or '' }}">
                    </div>
					
					
                  </div>
                 
         
                <div class="control-group">
                    <label class="control-label">附注</label>
                      <div class="controls">
                        <textarea class="span7" rows="5" name="remark" style="height:100px;" >{{ $book->mark or '' }}</textarea>
                      </div>
                </div>
				
                
				
				    </form>
					
            </div>
		</div>
            <script>

				function test()
				{
				document.getElementById("form1").submit();mn 				
				alert("更新图书成功");
				}
			</script>
            <div class="widget-footer">
			<center>
               <button class="btn btn-inverse "  type="buttont" onclick="test()">更新</button>
               <button class="btn " type="button">放棄</button></center>
            </div>
        </div>
		
	
		
	
  
		  
            
		
				
      
@stop
