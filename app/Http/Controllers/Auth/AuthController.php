<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
	public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember') ) )
        {
		/* 	//用户已登入
            if($this->auth->User()->active == 1)
            {
                //have to log out since our data is cached and we're already logged in but we find the account is inactive !
                $this->auth->logout();
                //now we are logged out, we can redirect with message we want, if we did not log out the middleware recognize us as NON GUEST account !
                return redirect('/auth/login')->withInput($request->only('email'))->withErrors(['email' => '用户已登入',]); 
            }
            else
            { */
                
           /*  } */
				return redirect()->intended('/');

        }



        return redirect('/auth/login')
                    ->withInput($request->only('email'))
                    ->withErrors([
                        'email' => '你输入的用户名或密码不正确',
                    ]); 
    }


}
