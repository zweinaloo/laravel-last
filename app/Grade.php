<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model {
	protected $table='grade';
	protected $fillable=['grade_name'];
	public $timestamps = false;
	public function TClass(){
        return $this->belongsTo('App\TClass');
    }
}
