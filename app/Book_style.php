<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_style extends Model {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'book_style';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	public $timestamps = false;
	 
	protected $fillable = ['id', 
						   'Book_style_name',
						   'Book_style_mark'];
						   
						   
	public function  Book()
    {
        return $this->belongsTo('App\Book');
    }
}
