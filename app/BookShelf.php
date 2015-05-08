<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BookShelf extends Model {

	//
	protected $table = 'book_shelf';
	
	protected $fillable=['book_shelf_name','room_id'];
	public $timestamps = false;
	
	public function BookRoom()
	{
	
		return $this->belongsTo('App\BookRoom','room_id','id');
	}
	
	public function  Book()
    {
        return $this->hasMany('App\Book','shelf_id','id');
    }
}
