<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('slider')->insert([
        	[
        		'link'=>null,'image'=>'banner1.jpg'
        	],
        	[
        		'link'=>null,'image'=>'banner2.jpg'
        	],
        	[
        		'link'=>null,'image'=>'banner3.jpg'
        	],
        	[
        		'link'=>null,'image'=>'banner4.jpg'
        	]
        ]);
    }
}
