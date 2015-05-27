<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_style extends Model {
	protected $table = 'book_style';

	public $timestamps = false;
	 
	protected $fillable = ['id', 
						   'Book_style_name',
						   'Book_style_mark'];
					   
	public function  Book(){
        return $this->belongsTo('App\Book');
    }
}
