<?php

use Illuminate\Database\Seeder;

class authorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('author')->insert([
        	[
        		'name'=>'鲁迅',
        		'addtime'=>strtotime('-30 year')
        	],
        	[
        		'name'=>'金庸',
        		'addtime'=>strtotime('-10 year')
        	],
        	[
        		'name'=>'冰心',
        		'addtime'=>strtotime('-20 year')
        	]
        ]);
    }
}
