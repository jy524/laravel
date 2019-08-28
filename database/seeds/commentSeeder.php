<?php

use Illuminate\Database\Seeder;

class commentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comment')->insert([
        	[
        		'content'=>'不错',
        		'article_id'=>rand(1,4),
        		'time'=>strtotime('-10 month')
        	],
        	[
        		'content'=>'厉害了',
        		'article_id'=>rand(1,4),
        		'time'=>strtotime('-2 month')
        	],
        	[
        		'content'=>'很好看呀',
        		'article_id'=>rand(1,4),
        		'time'=>strtotime('-1 month')
        	],
        	[
        		'content'=>'太恐怖了',
        		'article_id'=>rand(1,4),
        		'time'=>strtotime('-3 month')
        	],
        	[
        		'content'=>'好喜欢',
        		'article_id'=>rand(1,4),
        		'time'=>strtotime('-4 month')
        	],
        ]);
    }
}
