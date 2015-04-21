<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BookRoom extends Model {

	//
	protected $table = 'bookroom';
	
	protected $fillable=['name'];
	public $timestamps = false;
	public function  BookShelf()
    {
        return $this->hasMany('App\BookShelf','room_id','id');
    }
	
	
	
}
