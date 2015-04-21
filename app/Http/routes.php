<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/a', 'WelcomeController@index');

Route::get('/home', 'WelcomeController@test');
Route::get('/', 'WelcomeController@test');
//Route::get('/test', 'WelcomeController@test');

//用户信息显示&修改_控制路由组
Route::group(['prefix'=>'User'],function(){
	//读者信息
	//GET
	Route::get('/userInfoShow/', 'ReaderController@userInfoShow');
	Route::get('/resetUserInfoShow/', 'ReaderController@userInfoResetShow');

	Route::get('/userInfoShow/{id}', 'ReaderController@userInfoShowbyAdmin');
	Route::get('/resetuserInfoShow/{id}', 'ReaderController@userInfoResetShowbyAdmin');
	
	
	Route::get('show/updatePassword/{id}','ReaderController@updatePasswordshow');
	//POST
	Route::post('/resetUserInfo/', 'ReaderController@userInfoReset');
	
	Route::post('/updatePasswrod','ReaderController@updatePassword');
	
});

//图书管理模块 控制路由 BookManger modle，route of controller//
Route::group(['prefix'=>'BookManger'],function(){
	//GET //
	//Form for show information.//
	//*************************//
	//add
	Route::get('/addShow/', 'BookMangerController@BookAddShow');
	//update
	Route::get('/updateShow/', 'BookMangerController@BookUpdateShow');
	Route::get('/updateBook/{id}', 'BookMangerController@updateBook');
	//find
	Route::get('/updateFind/','BookMangerController@BookUpdateFind');
	Route::get('/deleteFind/','BookMangerController@BookDeleteFind');
	//delete
	Route::get('/deleteShow','BookMangerController@BookDeleteShow');
	Route::get('/deleteBook/{id}','BookMangerController@BookDelete');
	//POST//
	//contorller for ADD,Upate,Delete.//
	//*************************//
	//add//
	Route::post('/add/', 'BookMangerController@BookAdd');
	//update
	Route::post('/update/', 'BookMangerController@BookUpdate');
});

//用户信息管理模块 路由//
Route::group(['prefix'=>'UserManger'],function(){
	//读者信息
	Route::get('/InfoManger/', 'UserMangerController@InfoShow');
	Route::get('/RolesManger', 'UserMangerController@RoleShow');
	//Post
	Route::post('/AddRoles',"UserMangerController@AddRoles");
	Route::post('/UpdateRoles',"UserMangerController@UpdateRoles");
});

//书籍查找管理模块 路由//
Route::group(['prefix'=>'BookFind'],function(){
	//书籍查找
	Route::get('/onExact', 'BookFindController@OnExactShow');
	Route::get('/onExactSearch', 'BookFindController@OnExact');
	Route::get('/onFuzzy', 'BookFindController@OnFuzzyShow');
	Route::get('/onFuzzySearch', 'BookFindController@OnFuzzy');

});
//图书类型管理模块 路由//
Route::group(['prefix'=>'BookStyle'],function(){
	//读者信息
	Route::get('/Show/{id}', 'BookStyleController@Show');
	//Route::get('/', 'UserMangerController@RoleShow');
	Route::post('/{id}','BookStyleController@Edit');
});
//图书管&书架信息管理模块 路由//
Route::group(['prefix'=>'LibraryManger'],function(){
	//读者信息
	Route::get('/Show/{id}', 'LibraryMangerController@Show');
	//Route::get('/', 'UserMangerController@RoleShow');
	Route::post('/{id}','LibraryMangerController@Edit');
});

/*
|--------------------------------------------------------------------------
| 借阅&归还管理路由
|--------------------------------------------------------------------------
*/
Route::group(['prefix'=>'BorrowManger'],function(){
	//读者信息
	Route::get('/{id}', 'BorrowMangerController@Show');
	//Route::get('/', 'UserMangerController@RoleShow');
	Route::post('/{id}','BorrowMangerController@Edit');
});
//AJAX查询
Route::group(['prefix'=>'Ajax'],function(){
	
	//Route::post('/{id}','AjaxController@forward');
	Route::post('/SearchReader/','AjaxController@SearchReader');
	Route::post('/SearchBook/','AjaxController@SearchBook');
	Route::post('/addBorrowRecord/','AjaxController@addBorrowRecord');
	Route::post('/UpdataCordList/','AjaxController@UpdataCordList');
	Route::post('/addReturnRecord/','AjaxController@addReturnRecord');
	
});

//借阅记录查询管理
Route::group(['prefix'=>'BorrowRecord'],function(){
	Route::get('/{id}', 'BorrowRecordMangerController@Show');
	Route::post('/SearchRecord', 'BorrowRecordMangerController@SearchRecord');	
	Route::get('/SearchRecord/self', 'BorrowRecordMangerController@SearchRecordSelf');	
	
});


//普通路由




//控制器路由
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'reader' => 'ReaderController',
]);
