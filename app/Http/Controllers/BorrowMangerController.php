<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Borrowing_record;
class BorrowMangerController extends Controller {

	public function Show($id){
	$book=null;
	$record=null;
	//根据ID显示页面
	
	switch ($id){
		case "Borrow":
		
		return view('library.borrowManger.borrow')->withBook($book);	
		break;  
		default:
		return '404,童鞋，你迷路了';
		}
	}

}
