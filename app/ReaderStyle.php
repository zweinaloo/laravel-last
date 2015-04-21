<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReaderStyle extends Model {

	//
	public $timestamps = false;
	protected $table = 'reader_style';
	 
	 protected $fillable =['name','Borrowing_count','Borrowing_period','Validity'];
	 
	 public function user()
    {
        return $this->belongsTo('App\User','id','user_roles_id');
    }
	
	
}
