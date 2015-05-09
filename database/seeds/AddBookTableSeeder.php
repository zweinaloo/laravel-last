<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\Book,App\BookShelf,App\BookRoom,App\Book_style;
class AddBookTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
    	/**
    	 * 添加书籍类型数据
    	 */
    	 $book_style=array('计算机类','文学类','英语类','数学类','经济类');
    	 $len_style=sizeof($book_style);
    	// for($id=0;$id<$len_style;$id++){
    	// 	Book_style::create([
    	// 		'Book_style_name' =>$book_style[$id]
    	// 	]);
    	// }


    	/**
    	 * 添加图书室数据
    	 */	
    	 // $room=array('第一图书室','第二图书室','计算机图书室','文学图书室','周刊图书室','杂志图书室','经济图书室','英语图书室');
    	 // $len_room=sizeof($room);
    	// for($id=0;$id<$len_room;$id++){
    	// 	BookRoom::create([
    	// 		'Book_room_name' => $room[$id]
    	// 	]);
    	// }
    	/**
    	 * 添加书架数据
    	 */
    	 $shelf=array('一号书架','二号书架','三号书架','四号书架','五号书架','六号书架');
    	 $len_shelf=sizeof($shelf);
    	// for($id=0;$id<$len_room;$id++){
    	// 	for($sid=0;$sid<$len_shelf;$sid++){
    	// 		BookShelf::create([
    	// 			'Book_shelf_name'=>$shelf[$sid],
    	// 			'room_id' =>$id+1
    	// 			]);
    	// 	}

    	// }
    	/**
    	 * 添加书籍数据
    	 * @var integer
    	 */
    	$len=1000;
    	for($id=0;$id<$len;$id++){
    		Book::create([
    			'Book_id' => $id+1000,
    			'Book_name' =>'我是书籍名'.$id,
    			'shelf_id' => (($len_shelf+$id)%$len_shelf+1),
    			'style_id' => (($len_style+$id)%$len_style+1),
				'writer' =>'我是作者'.$id,
				'publish' =>'我是出版社'.$id,
				'count' =>((10+$id)%10+1),
				'mark' =>'我是备注'.$id
    		]);
    	}
    	
    }
}
