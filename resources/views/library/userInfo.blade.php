@extends('library.home')

@section('mainwindow')
		 <!--@parent-->
      <div class="main_container" id="dashboard_page">
        <div class="row-fluid">
        
        </div>  
		<ul class="breadcrumb">
            <li><a href="/home">主页</a> <span class="divider">/</span></li>
            <li><a href="/BookManger/">个人信息</a> <span class="divider">/</span></li>
            <li class="active">个人信息显示</li>
        </ul>

		<!--个人信息-->
		
		
 <div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header">
              <i class="icon-group"></i>
              <h5>个人信息</h5>
              <div class="widget-buttons">
                
                  <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
              </div>
            </div>  
            <div id="userinfoshow" class="widget-body">
			
             </div> <!-- /widget-body -->
          </div> <!-- /widget -->
        </div> <!-- /row-fluid -->
		
		</div>
      
@stop
