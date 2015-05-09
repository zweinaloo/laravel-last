<?php namespace App\Http\Controllers;

use App\Http\Requests\UpdateReaderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\UserMangerController;

 
use App\ReaderStyle as ReaderStyleModel;

use App\Grade,App\User,App\Reader,App\TClass,App\Professional,App\Department;
use Redirect,Input,Auth;

class ReaderController extends Controller {
	
	//修改密码
	public function updatePassword(){
		$user=User::Find(Request::input("id"));
		$user->password=bcrypt(Request::input("password"));
		$user->save();
		$msg=["已修改",Request::input("password")];
		
		//return redirect()->action('UserMangerController@InfoShow');
	return view('library.updatePassword')->withMsg($msg)->withUser($user);
	
	}

	
	
	
	//修改密码视图入口
	public function updatePasswordShow($id){
		$user=User::Find($id);
		$msg=null;
		return view('library.updatePassword')->withUser($user)->withMsg($msg);
	
	
	}
	
	
	
	//个人信息窗口显示
	public function userInfoShow()
	{	$user=Auth::user();
		$id=Auth::user()->id;
		//读者信息
		$reader=Reader::find($id);
		//读者类型id
		$styleId=Auth::user()->user_roles_id;
		//读者类型详细信息
		$styleinfo=ReaderStyleModel::find($styleId);
				$style= ReaderStyleModel::all();

		$view= view('library.userInfo')->withReader($reader)->withStyle($style)->withstyleinfo($styleinfo)->withUser($user);
		return $view;
	
	}
	//用户信息显示 管理员用
	public function userInfoShowbyAdmin($id){
		
		$reader=Reader::find($id);
		$user=User::find($id);
		$styleId=User::find($id)->user_roles_id;
		//读者类型详细信息
		$styleinfo=ReaderStyleModel::find($styleId);
					$style= ReaderStyleModel::all();

		$view= view('library.userInfo')->withReader($reader)->withStyle($style)->withstyleinfo($styleinfo)->withUser($user);
		return $view;
		
	}
	
	



	//编辑个人信息窗口显示
	public function userInfoResetShow()
	{
		$id=Auth::user()->id;
		//读者信息
		$reader=Reader::find($id);
		//读者类型id
		$styleId=Auth::user()->user_roles_id;
		//读者类型详细信息
		$styleinfo=ReaderStyleModel::find($styleId);
		
		$user = User::find($id);
		$grade =Grade::all();
		
		$class =TClass::all();
		$prof =Professional::all();
		$style= ReaderStyleModel::all();
		return view('/library/ResetUserInfo')
				->withUser($user)
				->withGrade($grade)
				->withClass($class)
				->withProf($prof)
				->withStyle($style);
		
	}
	

	//编辑个人信息窗口显示 管理员用
	public function userInfoResetShowbyAdmin($id)
	{
		
		//读者信息
		$reader=Reader::find($id);
		//读者类型id
		$styleId=User::find($id)->user_roles_id;
		//读者类型详细信息
		$styleinfo=ReaderStyleModel::find($styleId);
		
		$user = User::find($id);
		$grade =Grade::all();
		
		$class =TClass::all();
		$prof =Professional::all();
		$style= ReaderStyleModel::all();
		return view('/library/ResetUserInfo')
				->withUser($user)
				->withGrade($grade)
				->withClass($class)
				->withProf($prof)
				->withStyle($style);
		
	}
	
	//修改个人信息逻辑
	public function userInfoReset(UpdateReaderRequest $request)
	{	

		//数据更新 
		$id=Auth::user()->id;
		
		
		//用户名更新
		$user = User::find($id);
		$user->name =Request::input('name');
		if(Request::input('roles'))
		{$user->user_roles_id=Request::input('roles');}
		$user->save();
		//读者信息更新
		$reader =$user->reader;
		$reader->sex =Request::input('sex');
		$reader->name=Request::input('realname');
		$reader->phoneno =Request::input('phoneno');
		$reader->mark= Request::input('remark');
		$reader->birth=Request::input('birth');
		$reader->class_id=Request::input('Tclass');
		

		
		
		$reader->save();
	
	
		return redirect()->back();
		
	}
	
	
}
