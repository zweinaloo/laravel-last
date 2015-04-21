<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Request;
use App\Book_Style;
use DB;
class BookStyleController extends Controller {
	//显示页面()
	public function Show($id){
	$style=Book_Style::all();
	//根据ID显示页面
	switch ($id){
		case "Add":
		return view('library.bookType.bookTpyeAdd');	
		break;  
		case "Update":
		return view('library.bookType.bookTpyeUpdate')->withStyle($style);
		break;
		case "Delete":
		return view('library.bookType.bookTpyeDelete')->withStyle($style);
		break;
		}
	}
	//添加类型
	public function Add(){
		$style=new Book_Style;
		$style->Book_Style_name=Request::input('name');
		$style->save();
		return redirect()->back();
	}
	//更新
	public function Update(){
		$style= Book_style::find(Request::input('name'));
		$style->Book_style_name=Request::input('changeName');
		$style->save();
		return redirect()->back();
	}
	//删除
	public function Delete(){
		Book_style::destroy(Request::input('name'));
		return redirect()->back();
	}
	//入口
	public function Edit($id){
	switch ($id)
		{
		case "Add":
		return $this->Add();
		break;  
		case "Update":
		return $this->Update();
		break;
		case "Delete":
		return $this->Delete();
		break;
		}
	}

}
