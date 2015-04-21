<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Request;
use App\BookRoom;
use App\BookShelf;

class LibraryMangerController extends Controller {
	//显示页面()
	public function Show($id){
	$room=BookRoom::all();
	$shelf=BookShelf::all();
	//根据ID显示页面
	switch ($id){
		case "LibraryAdd":
		return view('library.libraryManger.libraryAdd');	
		break;  
		case "LibraryUpdate":
		return view('library.libraryManger.libraryUpdate')->withRoom($room);
		break;
		case "LibraryDelete":
		return view('library.libraryManger.libraryDelete')->withRoom($room);
		break;
		case "ShelfAdd":
		return view('library.libraryManger.ShelfAdd')->withRoom($room);	
		break;  
		case "ShelfUpdate":
		return view('library.libraryManger.ShelfUpdate')->withRoom($room)->withShelf($shelf);
		break;
		case "ShelfDelete":
		return view('library.libraryManger.ShelfDelete')->withShelf($shelf);
		break;
		}
	}
	//图书室
	//添加图书室类型
	public function Add(){
		$room=new BookRoom;
		$room->name=Request::input('name');
		$room->save();
		return redirect()->back();
	}
	//更新
	public function Update(){
		$room= BookRoom::find(Request::input('name'));
		$room->name=Request::input('changeName');
		$room->save();
		return redirect()->back();
	}
	//删除
	public function Delete(){
		BookRoom::destroy(Request::input('name'));
		return redirect()->back();
	}
	//入口
	//
	//书架
	public function Add1(){
		$shelf=new BookShelf;
		$shelf->name=Request::input('shelf');
		$shelf->room_id=Request::input('room');
		//dd($shelf);
		$shelf->save();
		return redirect()->back();
	}
	//更新
	public function Update1(){
		$shelf= BookShelf::find(Request::input('shelf'));
		$shelf->name=Request::input('changeName');
		$shelf->save();
		return redirect()->back();
	}
	//删除
	public function Delete1(){
		BookShelf::destroy(Request::input('shelf'));
		return redirect()->back();
	}
	public function Edit($id){
	switch ($id)
		{
		case "roomAdd":
		return $this->Add();
		break;  
		case "roomUpdate":
		return $this->Update();
		break;
		case "roomDelete":
		return $this->Delete();
		break;
		case "shelfAdd":
		return $this->Add1();
		break;  
		case "shelfUpdate":
		return $this->Update1();
		break;
		case "shelfDelete":
		return $this->Delete1();
		break;
		}
	}


}
