<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'rmike',
                'email'=>'rmike@gmail.com',
                'usertype'=>'0',
                'password'=>Hash::make('1234')
            ],
            [
                'name'=>'sam',
                'email'=>'sam@gmail.com',
                'usertype'=>'0',
                'password'=>Hash::make('1234')
            ],
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'usertype'=>'1',
                'password'=>Hash::make('1234')
            ],
            ]);
    }
}
