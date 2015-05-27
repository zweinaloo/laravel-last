<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Request;

use App\Borrowing_record,App\Book,App\Return_record,App\Reader;
use DB;
use Auth;
class BorrowRecordMangerController extends Controller {
	/**
	 * 续借功能
	 * @author Zwei
	 * @param  $renew_preiod 可续借数量
	 * @param $renew_change 续订后时间
	 */
	public function Renew($ip){
		//1.查询当前用户的书籍可续借天数数量
		$renew_period = Auth::user()->style->Borrowing_period;
		//dd($renew_period);
		//2.查询预订的书籍，归还时间增加
		$renew =Borrowing_record::Find($ip);
		$renew_change=Carbon::parse($renew->havetoreturn)->addDay($renew_period);
		$renew->havetoreturn=$renew_change;
		$renew->save();
		//3.返回原界面
		return redirect()->back();
	}
	
	public function Show(){
		$book=null;$data=null;$data1=null;
		return view('library.borrowRecord.borrowRecordAll')->withBook($book)->withData($data)->withData1($data1);
	
	}
	
	public function Edit($id){
		switch ($id){
		case "recoredSearch":
		return view('library.borrowManger.borrow')->withBook($book);	
		break;  
		
		default:
		return '404,童鞋，你迷路了';
		}
	}
	
	
	public function SearchRecord(){

		$data=null;$data1=null;
		//根据id 查找借阅记录&归还记录
		//借阅记录
		$reader=Reader::Find(Request::input('find'));
		$data=DB::table('borrowing_record')       
			->join('readers', function($join){
            $join->on( 'readers.id', '=', 'borrowing_record.Borrowing_Record_reader_id')
                 ->where('readers.id', '=',Request::input('find'));
				 //->where('borrowing_record.isreturn','=',0);

        })
        ->leftjoin('book','book.Book_id' , '=', 'borrowing_record.Book_id')
		->leftjoin('book_style','book_style.id','=','book.style_id')
		->leftjoin('book_shelf','book_shelf.id','=','book.shelf_id')
		->leftjoin('book_room','book_room.id','=','book_shelf.room_id')
          // ->select('book.*','borrowing_record.*','book_style.*','bookshelf.*','book_room.*')
			->select('book.Book_id','book.Book_name','book_style.Book_style_name','book_shelf.*','book_room.*','borrowing_record.*')
			->get();
			//$data=Borrowing_record::find("13");
			//dd($data);
			//归还记录
		$data1=DB::table('return_record')       
			->join('readers', function($join){
            $join->on( 'readers.id', '=', 'return_record.Return_record_reader_id')
                 ->where('readers.id', '=',Request::input('find'));

        })
            ->join('book', 'book.Book_id', '=', 'return_record.Book_id')
			
		->leftjoin('book_style','book_style.id','=','book.style_id')
		->join('book_shelf','book_shelf.id','=','book.shelf_id')
		->leftjoin('book_room','book_room.id','=','book_shelf.room_id')
           ->select('book.Book_id','book.Book_name','return_record.*','book_style.Book_style_name','book_shelf.Book_shelf_name','book_room.Book_room_name')
			->get();
			//dd($data1);
		return view('library.borrowRecord.borrowRecordAll')->withData($data)->withData1($data1)->withReader($reader);
	
	
	
	}
	public function SearchRecordSelf(){

		$data=null;$data1=null;
		//根据id 查找借阅记录&归还记录
		//借阅记录
		$reader=Reader::Find(Auth::user()->id);
		$data=DB::table('borrowing_record')       
			->join('readers', function($join){
            $join->on( 'readers.id', '=', 'borrowing_record.Borrowing_Record_reader_id')
                 ->where('readers.id', '=',Auth::user()->id);
				 //->where('borrowing_record.isreturn','=',0);

        })
        ->join('book', 'book.Book_id', '=', 'borrowing_record.Book_id')
		->leftjoin('book_style','book_style.id','=','book.style_id')
		->join('book_shelf','book_shelf.id','=','book.shelf_id')
		->leftjoin('book_room','book_room.id','=','book_shelf.room_id')
           ->select('book.Book_id','book.Book_name','book_style.Book_style_name','book_shelf.Book_shelf_name','borrowing_record.*')
			->get();
			//归还记录
		$data1=DB::table('return_record')       
			->join('readers', function($join){
            $join->on( 'readers.id', '=', 'return_record.Return_record_reader_id')
                 ->where('readers.id', '=',Request::input('find'));
		

        })
            ->join('book', 'book.Book_id', '=', 'return_record.Book_id')
			
		->leftjoin('book_style','book_style.id','=','book.style_id')
		->join('book_shelf','book_shelf.id','=','book.shelf_id')
		->leftjoin('book_room','book_room.id','=','book_shelf.room_id')
           ->select('book.Book_id','book.Book_name','return_record.*','book_style.Book_style_name','book_shelf.Book_shelf_name','book_room.Book_room_name')
			->get();
			//dd($data);
		return view('library.borrowRecord.borrowRecordAll')->withData($data)->withData1($data1)->withReader($reader);
	
	
	
	}

	
	
	
}


