<?php namespace App\Services;

use App\User;
use App\Reader;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}
	
	public function createReader($name){
		
		
		return Reader::create([
			'name' =>$name,
			'style_id' => 3,
			'class_id' => 1,
			
			
			'phoneno'=> '默认无',
		
		
		]);
	}
	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{	
	
		$this->createReader($data['name']);
		
		
		return User::create([
			
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			"user_roles_id"=>'3',
			
		]);
	}
	
	

}
