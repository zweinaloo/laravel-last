<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Request;
use App\Book;
use App\Book_style;
use App\BookRoom;
use App\BookShelf;

class BookMangerController extends Controller {

	public function BookAddShow()
	{	$style=Book_style::all();
		$shelf=BookShelf::all();
		return view('library.bookManger.bookMangerAdd')->withstyle($style)->withShelf($shelf);
	}
	

		public function BookAdd()
	{	
		$book = new Book;
		$book->Book_name = Request::input('name');
			$book->writer = Request::input('writer');
			$book->publish = Request::input('publish');
			$book->count = Request::input('count');
			$book->shelf_id=Request::input('shelf');
			$book->style_id=Request::input('style');	
			$book->mark = Request::input('mark');
		

		$book->save();
		$style=Book_style::all();
		$shelf=BookShelf::all();
		return view('library.bookManger.bookMangerAdd')->withstyle($style)->withShelf($shelf);
	}
	
	public function BookUpdateShow()
	{	$book=null;
		$style=Book_style::all();
		$shelf=BookShelf::all();
		return view('library.bookManger.bookMangerUpdate')->withBook($book)->withstyle($style)->withShelf($shelf);
	}
	
		public function BookUpdateFind()
	{
		$find =array(
		"find"=>Request::input('find'),
	
		"style"=>Request::input('style'),	
		);
		//根据style类型查找 1,ID 2,书名 3,作者
		switch ($find["style"])
		{
		case "1":
		//$book=Book::where('Book_id', '=', $find["find"])->first();
		$book=Book::where('id', '=',$find["find"])->first();
		break;  
		case "2":
		$book=Book::where('name', '=',$find["find"])->first();
		break;
		case "3":
		$book=Book::where('writer', '=',$find["find"])->first();
		break;
	
		}
		$style=Book_style::all();
		$shelf=BookShelf::all();
		//var_dump($shelf);
		return view("library.bookManger.bookMangerUpdate")->withBook($book)->withFind($find)->withstyle($style)->withShelf($shelf);
	
	}
	
	public function BookUpdate()
	{		$style=Book_style::all();
		   $shelf=BookShelf::all();
		   $id=Request::input('find');
		 
			$book=Book::where('id', '=',$id)->first();

		//dd($book);
			$book->Book_name = Request::input('name');
				
			$book->writer = Request::input('writer');
			$book->publish = Request::input('publish');
			$book->count = Request::input('count');
			$book->shelf_id=Request::input('shelf');
			$book->style_id=Request::input('style');	
			$book->mark = Request::input('remark');
			$book->save();
		
			
		
			return view('library.bookManger.bookMangerUpdate')->withBook($book)->withstyle($style)->withShelf($shelf);
	}
	
	public function BookDeleteShow()
	{	
		$book=Book::all();
		return view('library.bookManger.bookMangerDelete')->withBook($book);
	}
	
	public function BookDeleteFind()
	{	
		$find =array(
		"find"=>Request::input('find'),
	
		"style"=>Request::input('style'),	
		);
		//根据style类型查找 1,ID 2,书名 3,作者
		switch ($find["style"])
		{
		case "1":
		//$book=Book::find($find["find"])->take(100)->get();
		$book=Book::where('id', '=',$find["find"])->take(1)->get();
		break;  
		case "2":
		$book=Book::where('name', '=',$find["find"])->take(1)->get();
		break;
		case "3":
		$book=Book::where('writer', '=',$find["find"])->take(1)->get();
		break;
	
		}
		//return $book;
		return view('library.bookManger.bookMangerDelete')->withBook($book)->withFind($find);
	}
	
	public function BookDelete($id)
	{	
		
		
		Book::destroy($id);
		$book=Book::all();
		//重定向上一连接
		return redirect()->back()->withBook($book);
	}
	
	public function updateBook($id)
	{	
		$style=Book_style::all();
		$shelf=BookShelf::all();
		$update=Book::find($id);
		//dd($id,$update);
		return view("library.bookManger.bookMangerUpdate")->withBook($update)->withstyle($style)->withShelf($shelf);
	}

}
