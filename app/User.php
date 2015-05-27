<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
	use Authenticatable, CanResetPassword;
	protected $table = 'users';
	protected $fillable = ['name', 'email', 'password','user_roles_id'];
	protected $hidden = ['password', 'remember_token'];
	protected $casts = [
    'user_roles_id' => 'integer',
	];
	public function reader(){
        return $this->hasOne('App\Reader','id','id');
    }
	public function style(){
        return $this->hasOne('App\ReaderStyle','id','user_roles_id');
    }
}
