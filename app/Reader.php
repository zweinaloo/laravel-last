<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model {
	protected $table = 'readers';
	public $timestamps = false;
	protected $fillable = [
	'name', 
	'style_id',
	'class_id',
	'grade_id',
	'professionl_id',
	'phoneno',
	'sex',
	'birthday',];
	protected $casts = [
    'class_id' => 'integer',
	];
	public function user() {
        return $this->belongsTo('App\User');
    }
	public function TClass(){
		return $this->hasOne('App\TClass','id','class_id');
	}
	public function record(){
        return $this->belongsTo('App\Reader','Borrowing_Record_reader_id','id');
    }
}
