<?php

use Illuminate\Database\Seeder;

class tagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tag')->insert([
        	[
        		'tag'=>'年代'
        	],
        	[
        		'tag'=>'知识'
        	],
        	[
        		'tag'=>'阶梯'
        	],
        	[
        		'tag'=>'成长'
        	]
        ]);

        DB::table('relation')->insert([
        	[
        		'article_id'=>rand(1,4),
        		'tag_id'=>rand(1,4)
        	],
        	[
        		'article_id'=>rand(1,4),
        		'tag_id'=>rand(1,4)
        	],
        	[
        		'article_id'=>rand(1,4),
        		'tag_id'=>rand(1,4)
        	],
        	[
        		'article_id'=>rand(1,4),
        		'tag_id'=>rand(1,4)
        	],
        	[
        		'article_id'=>rand(1,4),
        		'tag_id'=>rand(1,4)
        	]

        ]);
    }
}
