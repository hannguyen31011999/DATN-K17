<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('province')->insert([
        	[
        		'name'=>"Hồ Chí Minh"
        	]
        ]);
    }
}
