<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('user')->insert([
    		['email'=>'nguyenhan1999@gmail.com','password'=>Hash::make('123'),'name'=>'Nguyễn Việt Hân','phone'=>'0382484093','address'=>'53 đường 144,phường Tân Phú,Q9','role'=>2,'status'=>1],
    		['email'=>'phitan1999@gmail.com','password'=>Hash::make('123'),'name'=>'Nguyễn Huỳnh Phi Tân','phone'=>'0584291650','address'=>'Đồng Tháp','role'=>2,'status'=>1],
        ]);
    }
}
