<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Return_record extends Model {

	//
		protected $table = 'return_record';
	
	protected $fillable=[
						"Book_id",					
						"Borrowing_Record_id",
						"Return_record_mark",
						"Return_record_reader_id",
						"Return_record_date"
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
