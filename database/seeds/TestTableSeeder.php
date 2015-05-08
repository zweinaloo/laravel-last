<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

use App\ReaderStyle;

class TestTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        
        
        $stylename=array('系统管理员','图书管理员','普通阅读中','待定义');
        $len=sizeof($stylename);
        for($id=0;$id<=$len-1;$id++)
		{
			ReaderStyle::create([
				'style_name'=>$stylename[$id],
				'Borrowing_count' => 5*($len-$id+1),
				'Borrowing_period' => 7*($len-$id+1),
				'Validity' => 30*($len-$id+1),
				'Renew'=>$len-$id
			]);
		
		}
    }
}

