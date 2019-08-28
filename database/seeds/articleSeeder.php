<?php

use Illuminate\Database\Seeder;

class articleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('article')->insert([
        	[
        		'title'=>'朝花夕拾',
        		'author_id'=>rand(1,3)
        	],
        	[
        		'title'=>'笑傲江湖',
        		'author_id'=>rand(1,3)
        	],
        	[
        		'title'=>'鲁冰花',
        		'author_id'=>rand(1,3)
        	],
        	[
        		'title'=>'骆驼祥子',
        		'author_id'=>rand(1,3)
        	]
        ]);
    }
}
