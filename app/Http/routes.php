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

//�û���Ϣ��ʾ&�޸�_����·����
Route::group(['prefix'=>'User'],function(){
	//������Ϣ
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

//ͼ�����ģ�� ����·�� BookManger modle��route of controller//
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

//�û���Ϣ����ģ�� ·��//
Route::group(['prefix'=>'UserManger'],function(){
	//������Ϣ
	Route::get('/InfoManger/', 'UserMangerController@InfoShow');
	Route::get('/RolesManger', 'UserMangerController@RoleShow');
	//Post
	Route::post('/AddRoles',"UserMangerController@AddRoles");
	Route::post('/UpdateRoles',"UserMangerController@UpdateRoles");
});

//�鼮���ҹ���ģ�� ·��//
Route::group(['prefix'=>'BookFind'],function(){
	//�鼮����
	Route::get('/onExact', 'BookFindController@OnExactShow');
	Route::get('/onExactSearch', 'BookFindController@OnExact');
	Route::get('/onFuzzy', 'BookFindController@OnFuzzyShow');
	Route::get('/onFuzzySearch', 'BookFindController@OnFuzzy');

});
//ͼ�����͹���ģ�� ·��//
Route::group(['prefix'=>'BookStyle'],function(){
	//������Ϣ
	Route::get('/Show/{id}', 'BookStyleController@Show');
	//Route::get('/', 'UserMangerController@RoleShow');
	Route::post('/{id}','BookStyleController@Edit');
});
//ͼ���&�����Ϣ����ģ�� ·��//
Route::group(['prefix'=>'LibraryManger'],function(){
	//������Ϣ
	Route::get('/Show/{id}', 'LibraryMangerController@Show');
	//Route::get('/', 'UserMangerController@RoleShow');
	Route::post('/{id}','LibraryMangerController@Edit');
});

/*
|--------------------------------------------------------------------------
| ����&�黹����·��
|--------------------------------------------------------------------------
*/
Route::group(['prefix'=>'BorrowManger'],function(){
	//������Ϣ
	Route::get('/{id}', 'BorrowMangerController@Show');
	//Route::get('/', 'UserMangerController@RoleShow');
	Route::post('/{id}','BorrowMangerController@Edit');
});
//AJAX��ѯ
Route::group(['prefix'=>'Ajax'],function(){
	
	//Route::post('/{id}','AjaxController@forward');
	Route::post('/SearchReader/','AjaxController@SearchReader');
	Route::post('/SearchBook/','AjaxController@SearchBook');
	Route::post('/addBorrowRecord/','AjaxController@addBorrowRecord');
	Route::post('/UpdataCordList/','AjaxController@UpdataCordList');
	Route::post('/addReturnRecord/','AjaxController@addReturnRecord');
	
});

//���ļ�¼��ѯ����
Route::group(['prefix'=>'BorrowRecord'],function(){
	Route::get('/{id}', 'BorrowRecordMangerController@Show');
	Route::post('/SearchRecord', 'BorrowRecordMangerController@SearchRecord');	
	Route::get('/SearchRecord/self', 'BorrowRecordMangerController@SearchRecordSelf');	
	
});


//��ͨ·��




//������·��
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'reader' => 'ReaderController',
]);
