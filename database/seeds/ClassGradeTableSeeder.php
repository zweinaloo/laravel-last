<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

use App\Grade,App\TClass,App\Department,App\Professional;

class ClassGradeTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
      /**
       * 添加年级数据
       *
       * @var integer
       */
        for($id=10;$id<20;$id++){
        	Grade::create([
        		'grade_name' =>$id
        		]);
        }
        /**
         * 填充学院数据
         *
         * @var integer
         */
        $depart=array('潇湘学院','经济学院','生物学院','计算机学院','化学学院','物理学院','教育学院','土木学院');
        $len_dep=sizeof($depart);
        for($id=0;$id<$len_dep;$id++){
        	Department::create([
        		'department_name' => $depart[$id]
        		]);
        }
        /**填充专业数据
         * 
         *
         * @var integer
         */
        $professional = array('计算机科学与技术','电子技术','通信技术','网络工程','信息安全','光电信息科学与工程','地理科学','采矿工程');
        $len_pro=sizeof($professional);
       for($id=0;$id<$len_pro;$id++){
        	Professional::create([
        		'Pre_name' => $professional[$id],
        		'dep_id' => (($len_dep+$id)%$len_dep+1)
        		]);
        }
        /**
         * 填充班级数据
         */
        $Tclass = array('计算机001班','通信1班','电子1班','电子2班','电子3班','电子4班','文学1班','经济1班','土木1班','机械设计与制造1班','体育1班','经济管理1班','对外汉语1班');
        $len_Tclass=sizeof($Tclass);
        for($id=0;$id<$len_Tclass;$id++){
        	TClass::create([
        		//年级
        		'Gra_id' => ((10+$id)%10+1),
        		'Cla_name' => $Tclass[$id],
        		//专业
        		'Pre_id' => (($len_pro+$id)%$len_pro+1)
        		]);
        }

    }
}
