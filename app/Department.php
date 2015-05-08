<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

	//
	protected $table = 'department';
	
	protected $fillable=['department_name'];
	public $timestamps = false;
	public function Professional()
    {
        return $this->belongsTo('App\Professional');
    }

}
