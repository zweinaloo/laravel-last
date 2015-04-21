@extends('library.home')

@section('mainwindow')
		 <!--@parent-->
      <div class="main_container" id="dashboard_page">
        <div class="row-fluid">
        
        </div>  
		<ul class="breadcrumb">
            <li><a href="/home">主页</a> <span class="divider">/</span></li>
            <li><a href="/BookManger/">图书类型管理</a> <span class="divider">/</span></li>
            <li class="active">删除图书</li>
          </ul>


		<!--书籍信息添加-->
		<div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header">
              <i class="icon-edit"></i><h5>删除书籍类型</h5>
              <div class="widget-buttons">
                  <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
              </div>
            </div>
            <div class="widget-body">
              <div class="widget-forms clearfix">
                <form class="form-horizontal" role="form" method="POST" id="form1"  action="/BookStyle/Delete">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

				 <div class="control-group">
                    <label class="control-label">书籍类型</label>
                    <div class="controls">
								<select class="span5" name="name">
								<option selected="selected" value="{{ $book->style->Book_style_id or '' }}">{{ $book->style->Book_style_name or '' }}</option>
								@foreach ($style as $style)
								<option value="{{ $style->id }}">{{ $style->Book_style_name or '' }}</option>
								@endforeach
							
								</select>
					</div>
                  </div>
				  
         
                 
				
				    </form>
            
            </div>
			</div>
			</div>
            <div class="widget-footer">
			<p></p>
			<script>
				function test()
				{
				document.getElementById("form1").submit();mn 				
				alert("更新图书成功");
				}
			</script>
              <center> <button class="btn btn-primary" type="button" onclick="test()")>删除</button>
               <button class="btn" type="button">放棄</button>
            </center></div>
				  
      
@stop