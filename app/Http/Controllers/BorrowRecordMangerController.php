<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Request;

use App\Borrowing_record,App\Book,App\Return_record,App\Reader;
use DB;
use Auth;
class BorrowRecordMangerController extends Controller {
	
	
	
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
            ->leftjoin('book','book.id' , '=', 'borrowing_record.Book_id')
		->leftjoin('book_style','book_style.id','=','book.style_id')
		->join('bookshelf','bookshelf.id','=','book.shelf_id')
		->leftjoin('bookroom','bookroom.id','=','bookshelf.room_id')
          // ->select('book.*','borrowing_record.*','book_style.*','bookshelf.*','bookroom.*')
			->select('*')
			->get();
			
			//归还记录
		$data1=DB::table('return_record')       
			->join('readers', function($join){
            $join->on( 'readers.id', '=', 'return_record.Return_record_reader_id')
                 ->where('readers.id', '=',Request::input('find'));
		

        })
            ->join('book', 'book.id', '=', 'return_record.Book_id')
			
		->leftjoin('book_style','book_style.id','=','book.style_id')
		->join('bookshelf','bookshelf.id','=','book.shelf_id')
		->leftjoin('bookroom','bookroom.id','=','bookshelf.room_id')
           ->select('book.*','return_record.*','book_style.*','bookshelf.*','bookroom.*')
			->get();
			//dd($data);
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
            ->join('book', 'book.id', '=', 'borrowing_record.Book_id')
		->leftjoin('book_style','book_style.id','=','book.style_id')
		->join('bookshelf','bookshelf.id','=','book.shelf_id')
		->leftjoin('bookroom','bookroom.id','=','bookshelf.room_id')
           ->select('book.*','borrowing_record.*','book_style.*','bookshelf.*','bookroom.*')
			->get();
			
			//归还记录
		$data1=DB::table('return_record')       
			->join('readers', function($join){
            $join->on( 'readers.id', '=', 'return_record.Return_record_reader_id')
                 ->where('readers.id', '=',Request::input('find'));
		

        })
            ->join('book', 'book.id', '=', 'return_record.Book_id')
			
		->leftjoin('book_style','book_style.id','=','book.style_id')
		->join('bookshelf','bookshelf.id','=','book.shelf_id')
		->leftjoin('bookroom','bookroom.id','=','bookshelf.room_id')
           ->select('book.*','return_record.*','book_style.*','bookshelf.*','bookroom.*')
			->get();
			//dd($data);
		return view('library.borrowRecord.borrowRecordAll')->withData($data)->withData1($data1)->withReader($reader);
	
	
	
	}
	
	
}


