<?php

use Illuminate\Database\Seeder;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            ['id'=>'1','type_product_id'=>'1','product_name'=>'Banh','description'=>'','unit_price'=>'10','promotion_price'=>'1000','image'=>'abc.jpg','unit'=>'','raw_material'=>'','origin'=>''],
            ['id'=>'2','type_product_id'=>'2','product_name'=>'Banh','description'=>'','unit_price'=>'10','promotion_price'=>'1000','image'=>'abc.jpg','unit'=>'','raw_material'=>'','origin'=>''],
            ['id'=>'3','type_product_id'=>'3','product_name'=>'Banh','description'=>'','unit_price'=>'10','promotion_price'=>'1000','image'=>'abc.jpg','unit'=>'','raw_material'=>'','origin'=>''],
            ['id'=>'4','type_product_id'=>'4','product_name'=>'Banh','description'=>'','unit_price'=>'10','promotion_price'=>'1000','image'=>'abc.jpg','unit'=>'','raw_material'=>'','origin'=>'']
           
        ]);
    }
}
