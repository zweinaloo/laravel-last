<?php namespace App\Http\Controllers;


 
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Request;
use Auth;
use App\Reader,App\User;
use App\Book;
use App\Borrowing_record,App\Return_record;
use DB;
class AjaxController extends Controller {
	/**
	 * [SearchReader 查询用户]
	 */
	public function SearchReader(){
		//通过id获取用户，返回$data用户名和班级名称
		$data=null;
		$reader=Reader::find(Request::input('id'));
		if($reader){
		$name=$reader->name;
		$class=$reader->TClass->Cla_name;
		$data=[$name,$class];}
		return $data;
		//return $reader;
		
	}
	public function SearchBook(){
		// 通过id获取用户，返回$data用户名和班级名称
		$data=null;
		$book=Book::Where('Book_id','=',Request::input('id'))->first();
		//dd($book);
		if($book){
		$id=$book->Book_id;
		$name=$book->Book_name;
		$writer=$book->writer;
		$count=$book->count;
		if($book->count>0)
		{$info=true;}
		else
		{$info=false;}
		$data=[$id,$name,$writer,$info,$count]
		;}
		return $data;
		//return $reader;
	}
	public function addBorrowRecord(){
		$data=null;
		//1.通过id查询用户权限，获得可借阅天数
		$reader=User::Find(Request::input('id'));
		
		//2.书籍库存减1.
		$Book=Book::Where('Book_id','=',Request::input('Bookid'))->first();
		if($Book->count>0){
		$Book->count--;
		}
		else{
		$Book->save(); return $data;}
		$Book->save();
		
		$record= new Borrowing_record;
		$record->Book_id=Request::input('Bookid');
		$record->Borrowing_Record_reader_id=Request::input('id');
		$record->Borrowing_Record_date=Carbon::now();
		//dd($reader->style->Borrowing_period);
		$record->havetoreturn=Carbon::now()->addDay($reader->style->Borrowing_period);
		//$record->isretrun=0;
		//dd($record->havetoreturn,$record->Borrowing_Record_date);
		$admin=Auth::user()->name;
		$record->Borrowing_Record_mark=$admin;
		$record->save();
		$reader->save();
		return $data;
	}
	public function addReturnRecord(){
		//1.新建归还对象
		$Returnrecord= new Return_record;
		//2.通过$id查找到借阅记录
		$Borrowrecord=Borrowing_record::find(Request::input("id"));
		//3.复制借阅记录值到归还记录对象，并save
		//dd($Borrowing_record);
		$Returnrecord->Book_id=$Borrowrecord->Book_id;
		$Returnrecord->Return_record_reader_id=$Borrowrecord->Borrowing_Record_reader_id;
		$Returnrecord->Borrowing_Record_id=$Borrowrecord->id;

		$Returnrecord->Return_record_date=Carbon::now();
		$Returnrecord->Return_record_mark=Auth::user()->name;
		
		$Returnrecord->save();
		//4.设置借阅记录isreturn值为1（0,未归还；1，已归还），save
		
		$Borrowrecord->isreturn=1;
		$Borrowrecord->save();
		dd($Returnrecord,$Borrowrecord);
		//5.书籍库存 +1
		$Book=Book::Where('Book_id','=',$Borrowrecord->Book_id)->first();
		$Book->count++;
		$Book->save();

	}
	public function UpdataCordList(){
	
	 $id=Request::input('id');

	
	 $record=DB::table('borrowing_record')       
			->join('readers', function($join){
            $join->on( 'readers.id', '=', 'borrowing_record.Borrowing_Record_reader_id')
                 ->where('readers.id', '=',Request::input('id'))
				 ->where('borrowing_record.isreturn','=',0);
        })
            ->join('book', 'book.Book_id', '=', 'borrowing_record.Book_id')
            ->select('book.Book_name', 'readers.name', 'borrowing_record.Borrowing_Record_date','borrowing_record.id','borrowing_record.havetoreturn')
            ->get();
	
	return $record; 



}
	

}
