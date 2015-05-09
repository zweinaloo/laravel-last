<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Request;

use App\Book;
use App\Book_style;
use App\BookRoom;
use App\BookShelf;



class BookFindController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function OnExact(){
		//
		$find =array(
		"find"=>Request::input('find'),
		"style"=>Request::input('style'),	
		);
		//¸ù¾ÝstyleÀàÐÍ²éÕÒ 1,ID 2,ÊéÃû 3,×÷Õß
		$book=null;
		
		switch ($find["style"])
		{
		case "1":
		$book=Book::where('id', '=',$find["find"])->get();
		break;  
		case "2":
		//$book=Book::where('publish', '=',$find["find"])->get();
		$book=Book::where('Book_name', '=',$find["find"])->get();
		break;
		case "3":
		$book=Book::where('writer', '=',$find["find"])->get();
		break;
		}
		//dd($book);
		
		return view('library.bookFind.bookFindOnExact')->withBook($book);
	}
	
	public function OnExactShow(){
		$book=null;
		return view('library.bookFind.bookFindOnExact')->withBook($book);
	}

	public function onFuzzyShow(){
		//$book=null;
		
		$book=Book::all();
		return view('library.bookFind.bookFindOnFuzzy')->withBook($book);
	}
	
	public function onFuzzy(){
		
		$find =array(
		"find"=>Request::input('find'),
	
		"style"=>Request::input('style'),	
		);
		//¸ù¾ÝstyleÀàÐÍ²éÕÒ 1Í¼ÊéÊÒ£¬2ÀàÐÍ
		$book=null;
		
		switch ($find["style"])
		{
		case "1":
		$book=Book::where('id', '=',$find["find"])->get();
		break;  
		case "2":
		//$book=Book::where('publish', '=',$find["find"])->get();
		$id=Book_style::where('', '=',$find["find"])->get();
		break;
		case "3":
		$book=Book::where('writer', '=',$find["find"])->get();
		break;
		}
		//dd($book);
		
		return view('library.bookFind.bookFindOnFuzzy')->withBook($book);
	}

	/**
	 * 精确查找Ajax DataTables 
	 * @author Zwei
	 * return json 
	 */
	public function AjaxOnExact(){
		
	  $date=array('dd','dd');
	  
		return $data;
	}

}
