<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usuario atrves de modelo 

        $user = User::create([
            'name'=>'Jose',
            'email'=>'a@a.com',
            'password'=>Hash::make('123456789'),
            'url'=> 'a',
        ]);

        $user2 = User::create([
            'name'=>'Eduardo',
            'email'=>'b@b.com',
            'password'=>Hash::make('123456789'),
            'url'=> 'b',
        ]);
/* 
        DB::table('users')->insert([
            'name'=>'Jose',
            'email'=>'a@a.com',
            'password'=>Hash::make('123456789'),
            'url'=> 'a',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]); */
    }
}
