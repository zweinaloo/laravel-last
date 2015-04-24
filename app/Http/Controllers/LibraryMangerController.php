<?php namespace App\Http\Controllers;


use App\Http\Requests\LibraryRequest;
use App\Http\Controllers\Controller;



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
	public function Add(LibraryRequest $request){
		$room=new BookRoom;
		$room->name=$request->libraryname;
		
		$room->save();
		
		
		return redirect()->back();
	}
	//更新
	public function Update(LibraryRequest $request){
		$room= BookRoom::find($request->name);
		$room->name=$request->libraryname;
		$room->save();
		return redirect()->back();
	}
	//删除
	public function Delete(LibraryRequest $request){
		BookRoom::destroy($request->name);
		return redirect()->back();
	}
	//入口
	//
	//书架
	public function Add1(LibraryRequest $request){
		$shelf=new BookShelf;
		$shelf->name=$request->shelfname;
		$shelf->room_id=$request->room;
		//dd($shelf);
		$shelf->save();
		return redirect()->back();
	}
	//更新
	public function Update1(LibraryRequest $request){
		$shelf= BookShelf::find($request->shelf);
		$shelf->name=$request->shelfname;
		$shelf->save();
		return redirect()->back();
	}
	//删除
	public function Delete1(LibraryRequest $request){
		BookShelf::destroy($request->shelf);
		return redirect()->back();
	}
	public function Edit($id,LibraryRequest $request){
	switch ($id)
		{
		case "roomAdd":
		return $this->Add($request);
		break;  
		case "roomUpdate":
		return $this->Update($request);
		break;
		case "roomDelete":
		return $this->Delete($request);
		break;
		case "shelfAdd":
		return $this->Add1($request);
		break;  
		case "shelfUpdate":
		return $this->Update1($request);
		break;
		case "shelfDelete":
		return $this->Delete1($request);
		break;
		}
	}


}
