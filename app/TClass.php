<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TClass extends Model {
	protected $table='class';
	public $timestamps = false;
	protected $fillable=['Gra_id',
						 'Cla_name',
						 'Pre_id'];
	public function reader(){
        return $this->belongsTo('App\Reader');
    }
	public function Grade(){
		return $this->hasOne('App\Grade','id','Gra_id');
	}
	public function Professional(){
		return $this->hasOne('App\Professional','id','Pre_id');
	}
}
