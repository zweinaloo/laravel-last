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
		//根据查询类型进行查询
		$book=null;
		
		switch ($find["style"])
		{
		case "1":
		$book=Book::where('Book_id', '=',$find["find"])->get();
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
		//
		$book=null;
			//根据查询类型进行查询
		switch ($find["style"])
		{
		case "1":
		$book=Book::where('Book_id', '=',$find["find"])->get()-first();
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

	

}
