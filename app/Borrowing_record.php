<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrowing_record extends Model {

	//
	protected $table = 'borrowing_record';
	
	protected $fillable=[
						"Book_id",
						"Borrowing_Record_reader_id",
						"Borrowing_Record_date",
						"Borrowing_Record_mark",
						"isreturn",
						"havetoreturn"
	];
	
	public $timestamps = false;
	
	
	 public function reader()
    {
        return $this->hasOne('App\Reader','id','Borrowing_Record_reader_id');
    }
	
	 public function book()
    {
        return $this->hasOne('App\Book','id','Book_id');
    }
}
