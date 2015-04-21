<?php namespace App\Http\Controllers;

 // require 'vendor/autoload.php';
 
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
public function SearchReader(){
		//ͨ��id��ȡ�û�������$data�û����Ͱ༶����
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
		//ͨ��id��ȡ�û�������$data�û����Ͱ༶����
		$data=null;
		$book=Book::find(Request::input('id'));
		if($book){
		$id=$book->id;
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
		//1.ͨ��id��ѯ�û�Ȩ�ޣ���ÿɽ�������
		$reader=User::Find(Request::input('id'));
		
		//2.�鼮����1.
		$Book=Book::Find(Request::input('Bookid'));
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
		 $data=null;
		//1.�½��黹����
		$Returnrecord= new Return_record;
		//2.ͨ��$id���ҵ����ļ�¼
		$Borrowrecord=Borrowing_record::find(Request::input("id"));
		//dd($Borrowrecord);
		//3.���ƽ��ļ�¼ֵ���黹��¼���󣬲�save
		
		$Returnrecord->Book_id=$Borrowrecord->Book_id;
		$Returnrecord->Return_record_reader_id=$Borrowrecord->Borrowing_Record_reader_id;
		$Returnrecord->Borrowing_Record_id=$Borrowrecord->id;
		$Returnrecord->Return_record_date=Carbon::now();
		$Returnrecord->Return_record_mark=Auth::user()->name;
		$Returnrecord->save();
		//4.���ý��ļ�¼isreturnֵΪ1��0,δ�黹��1���ѹ黹����save
		
		$Borrowrecord->isreturn=1;
		$Borrowrecord->save();
		//dd($record);
		//5.�鼮��� +1
		//2.�鼮����1.
		$Book=Book::Find($Borrowrecord->Book_id);
		$Book->count++;
		$Book->save();
		
		
		
		return $data; 
	}
public function UpdataCordList(){
	
	 $id=Request::input('id');

	
	 $record=DB::table('borrowing_record')       
			->join('readers', function($join){
            $join->on( 'readers.id', '=', 'borrowing_record.Borrowing_Record_reader_id')
                 ->where('readers.id', '=',Request::input('id'))
				 ->where('borrowing_record.isreturn','=',0);

        })
            ->join('book', 'book.id', '=', 'borrowing_record.Book_id')
            ->select('book.Book_name', 'readers.name', 'borrowing_record.Borrowing_Record_date','borrowing_record.id')
            ->get();	 
	
	
	
	//dd($record);
	return $record; 



}
	

}
