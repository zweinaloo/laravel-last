<?php namespace App;

use  Illuminate\Database\Eloquent\Model;

class Book extends Model {

	//
	protected $table = 'book';
	
	protected $fillable = ['id',
						   'shelf_id',
						   'style_id',
						   'Book_name',
						   'writer',
						   'publish',
						   'count',
						   'keyword',
						   'mark'];
	
	
	public function style()
	{
	
		return $this->hasOne('App\Book_style','id','style_id');
	}
	
	public function shelf()
	{
	
		return $this->belongsTo('App\BookShelf','shelf_id','id');
	}
	
	

	
}
