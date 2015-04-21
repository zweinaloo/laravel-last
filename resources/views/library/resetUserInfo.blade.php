@extends('library.home')

@section('mainwindow')
		 <!--@parent-->
      <div class="main_container" id="dashboard_page">
        <div class="row-fluid">
        <div>
            <ul class="breadcrumb">
              <li><a href="/">主页</a> <span class="divider">/</span></li>
              <li><a href="/">主菜单</a> <span class="divider">/</span></li>
			  <li class="active">修改个人信息</li>
        
            </ul>
            
			</div>
        </div>  


		<!--修改个人信息-->
		<div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header">
              <i class="icon-edit"></i><h5>修改个人信息</h5>
              <div class="widget-buttons">
                  <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
              </div>
            </div>
            <div class="widget-body">
              <div class="widget-forms clearfix">
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
					
					
					
                <form class="form-horizontal" role="form" method="POST" action="/User/resetUserInfo">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
					
                  <div class="control-group">
                    <label class="control-label">用户名：</label>
                    <div class="controls">
                      <input class="span7" type="text" name="name" placeholder="你想要的呢称" value="{{ $user->name }}">
                      <span class="help-inline">你想要的呢称.</span>
                    </div>
                  </div>
				  
					
	
                  <div class="control-group">
                    <label class="control-label">真实姓名：</label>
                    <div class="controls">
                      <input class="span7"  type="text" placeholder="You can't type anything…" name="realname" value="{{$user->reader->name }}">
                    </div>
					<div class="control-group">
					</div>
					
				   <div class="control-group">
                    <label class="control-label">用户权限：</label>
                    <div class="controls">
								<select class="span3" name="roles">
								<option selected="selected" value="{{$user->style->id}}">{{$user->style->name}}</option>
								 @if ((Auth::user()->user_roles_id)<2)
								@foreach ($style as $style)
								<option value="{{$style->id}}">{{$style->name}}</option>
								@endforeach
									  @endif
								</select>
						
                    </div>
                  </div>
			
                     
				
				  
				
                  <div class="control-group">
                    <label class="control-label">性别：</label>
                    <div class="controls">
								<select class="span3" name="sex">
								<option selected="selected">{{$user->reader->sex }}</option>
								<option>男</option>
								<option>女</option>
								<option>其他</option>
								
								</select>
							</div>
                  </div>
                 
				  
				 
                  <div class="control-group">
                    <label class="control-label">电话：</label>
                    <div class="controls">
                     <input class="span4" type="text" data-source="[&quot;186&quot;,&quot;182&quot;,&quot;139&quot;,&quot;138&quot;,&quot;137&quot;]" data-items="4" data-provide="typeahead" style="margin: 0 auto;" name="phoneno"placeholder="请输入正确的手机号码" value="{{$user->reader->phoneno }}">
					
				   </div>
                  </div>
				  
				
				  
				    <div class="control-group">
                    <label class="control-label">班级：</label>
                    <div class="controls">

								
								<select class="span3" name="Tclass">
								<option selected="selected" value="{{$user->reader->TClass->id}}">{{$user->reader->TClass->Grade->grade_name}}级{{$user->reader->TClass->Cla_name}}</option>
								@foreach ($class as $temp)
								<option value="{{$temp->id}}">{{$temp->Grade->grade_name}}级{{$temp->Cla_name}}</option>
								@endforeach				
								</select>
							</div>
                  </div>
				  
				    <div class="control-group">
                    <label class="control-label">专业：</label>
                   <div class="controls">
								
								
								<select class="span3" >
								<option selected="selected">{{$user->reader->TClass->Professional->Pre_name}}</option>
											
								</select>
							</div>
                    
                  </div>
				  
				    <div class="control-group">
                    <label class="control-label">学院：</label>
                     <div class="controls">
								
								
								<select class="span3" >
								<option selected="selected">{{$user->reader->TClass->Professional->Department->Dep_name}}</option>
													
								</select>
							</div>
                  </div>
                 
                 
                  
                  
                  
               
                  
                  <div class="control-group">
                    <label class="control-label">生日：</label>
                      <div class="controls">
                        
					<input type="text" readonly="readonly" name="birth" id="datepicker" value="{{$user->reader->birth}}">
                      </div>
                  </div>
                 
                <div class="control-group">
                    <label class="control-label">个人签名：</label>
                      <div class="controls">
                        <textarea class="span7" rows="5" name="remark" style="height:100px;">{{$user->reader->mark }}</textarea>
                      </div>
                </div>
				
				 <div class="control-group">
              <center> <button class="btn btn-primary" type="submit">提交</button>
               <button class="btn" type="button">放棄</button>
				</center>
			</div>
				    </form>
            
            
			</div> 
            
		</div>
        </div>
          
           
        
           
      </div>  
           
        
           
      </div>
    
@stop
