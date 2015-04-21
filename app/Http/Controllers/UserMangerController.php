<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Request;


use App\User;
use App\ReaderStyle;

use DB;

class UserMangerController extends Controller {
	
	
	//修改权限组
	public function UpdateRoles(){
		$style= ReaderStyle::Find(Request::input("name"));
		//dd($style,Request::input("name"));
		$style->Borrowing_count=Request::input("count");
		$style->Borrowing_period=Request::input("period");
		$style->Validity=Request::input("validity");
		$style->save();
		
		$styleall=ReaderStyle::all();
		$msg=2;
		return view('library.userManger.userRoleManger')->withStyle($style)->withStyleall($styleall)->withMsg($msg); 	
	}
	
	
	//添加权限组
	public function AddRoles(){
		$style = new ReaderStyle;
		$style->name=Request::input("name");
		$style->Borrowing_count=Request::input("count");
		$style->Borrowing_period=Request::input("period");
		$style->Validity=Request::input("validity");
		$style->save();
		$styleall=ReaderStyle::all();
		$msg=1;
		return view('library.userManger.userRoleManger')->withStyle($style)->withStyleall($styleall)->withMsg($msg); 	
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function InfoShow(){
	
		$user=User::all();                                                        		
		return view('library.userManger.userInfoManger')->withUser($user);
	
	
	
	}
	
	public function RoleShow(){
		$styleall=ReaderStyle::all();
		$msg =null;
		$style=null;
		return view('library.userManger.userRoleManger')->withStyle($style)->withStyleall($styleall)->withMsg($msg); 
	}
}
