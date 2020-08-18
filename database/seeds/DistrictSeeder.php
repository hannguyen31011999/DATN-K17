<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('district')->insert([
        	[
        		'province_id'=>1,
        		'name'=> "Quận 1"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận 2"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận 3"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận 4"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận 5"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận 6"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận 7"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận 8"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận 9"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận 10"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận 11"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận 12"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận Thủ Đức"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận Gò Vấp"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận Bình Thạnh"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận Tân Bình"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận Tân Phú"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận Phú Nhuận"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Quận Bình Tân"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Huyện Củ Chi"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Huyện Hóc Môn"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Huyện Bình Chánh"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Huyện Nhà Bè"
        	],
        	[
        		'province_id'=>1,
        		'name'=> "Huyện Cần Giờ"
        	],
        ]);
    }
}
