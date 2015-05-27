<?php namespace App\Http\Controllers;
Use App\User;
Use App\ReaderStyle;

use App\Http\Controllers\Controller;
use Redirect,Input,Auth;
Use App\Department;
class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
		$this->middleware('auth');

	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{	$a=Department::find(1);
	dd($a);
		return view('welcome');
	}
	
	public function test()
	{	
		$id=Auth::user()->user_roles_id;
		$role=ReaderStyle::find($id);
		
		return view('library/main')->withRole($role);
	}

	public function login()
	{	

		return redirect("/auth/login");
	}

	

}
