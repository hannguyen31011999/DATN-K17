<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'email'=>'tanhan@gmail.com',
            'password'=>bcrypt('123456'),
            'name'=>'admin',
            'phone'=>'0584291650',
            'address'=>'',
            'role'=>'',
            'status'=>'',
            'created_at'=> new Datetime(),
        ];
        DB::table('user')->insert($data);
    }
}
