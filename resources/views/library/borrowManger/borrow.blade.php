<!--@parent    -->
                        
        
@extends('library.home')

@section('mainwindow')          
    <div class="main_container" id="dashboard_page">
      <div class="row-fluid"></div>
      <ul class="breadcrumb">
        <li>
        <a href="/home">主页</a> 
        <span class="divider">/</span></li>
        <li>
        <a href="/BookManger/">借阅管理</a> 
        <span class="divider">/</span></li>
        <li class="active">借阅书籍</li>
      </ul>
      <!--借阅模块添加-->
      <div class="row-fluid">
        <div class="widget widget-padding span12">
          <div class="widget-header">
            <h5>借阅书籍</h5>
          </div>
          <div class="widget-body">
            <div class="container-fluid">
              <div class="row-fluid">
                <div class="row-fluid">
                  <div class="span6">
                    <div class="tabbable" id="tabs-171936">
                      <ul class="nav nav-tabs">
                        <li class="active">
                          <a href="#panel-845604" data-toggle="tab">用户确认</a>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="panel-845604">
                          <form class="form-horizontal">
                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                            <div class="control-group">
                              <label class="control-label" for="inputEmail">用户编号</label>
                              <div class="controls">
                                <input id="inputId" type="text" name="Readerid" />
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label" for="inputPassword" id="name">用户名</label>
                              <div class="controls">
                                <input id="inputInfo" type="text" readonly="readonly" name="name" />
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label" for="inputPassword">班级</label>
                              <div class="controls">
                                <input id="inputroles" readonly="readonly" type="text" name="roles" />
                              </div>
                            </div>
                            <div class="control-group">
                              <div class="controls">
                                <button type="button" class="btn" id="btnReaderSearch">确认</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="span6">
                    <div class="tabbable" id="tabs-890460">
                      <ul class="nav nav-tabs">
                        <li class="active">
                          <a href="#panel-193873" data-toggle="tab">正在借阅书籍</a>
                        </li>
                      
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="panel-193873">
                         <table class="table" >
              <thead>
                <tr>
                  <th>借阅编号</th>
                  <th>书名</th>
                  <th>借阅日期</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody id="recordList">
              
              </tbody>
            </table>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="widget widget-padding span12">
          <div class="widget-header">
            <h5>查询结果</h5>
          </div>
          <div id="table" class="widget-body">
            <form class="form-search">按书号
            <input class="input-medium search-query" type="text" id="Bookid" /> 
            <button type="button" class="btn" id="btnBookSearch">查找</button></form>
            <table class="table">
              <thead>
                <tr>
                  <th>书号</th>
                  <th>书名</th>
                  <th>作者</th>
                  <th>库存</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td id="tdid"><p id="TDid">测试</p></td>
                  <td id="tdname"><p id="TDname">测试</p></td>
                  <td id="tdwriter"><p id="TDwriter">测试</p></td>
                  <td id="tdinfo"><span class="label " id="Spaninfo"><p id="TDinfo">测试</p></span></td>
				  <!--<span class="label">已借出</span>-->
                  <td>
                    <button type="button" class="btn" id="btnNewBorrowRecord">借阅</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /widget-body -->
        </div>
        <!-- /widget -->
      </div>
      <!-- /row-fluid -->

   
        
@stop

