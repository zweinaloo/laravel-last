<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BookRoom extends Model {
	protected $table = 'book_room';
	protected $fillable=['Book_room_name'];
	public $timestamps = false;
	public function  BookShelf(){
        return $this->hasMany('App\BookShelf','room_id','id');
    }
}
