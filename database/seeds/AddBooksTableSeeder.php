<?php

use Illuminate\Database\Seeder;
use App\Book;
// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class AddBooksTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
				
		for($id=1;$id<=600;$id++)
		{
			Book::create([
			
			'shelf_id'=>$id%4,
			'style_id'=>$id%4,
			'Book_name'=>'Book'.$id,
			'writer'=>'Writer'.$id%10,
			'publish'=>'Publish'.$id%10,
			'count'=>$id%10,
			'mark'=>'I DONT KNOW ANYTHING'.$id,
			]);
		
		}
    }

}
