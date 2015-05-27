<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model {
	protected $table='professional';
	protected $fillable=['Pre_name','dep_id'];
	public $timestamps = false;
	public function TClass(){
        return $this->belongsTo('App\TClass');
    }
	public function Department(){
		return $this->hasOne('App\Department','id','dep_id');
	}
}
