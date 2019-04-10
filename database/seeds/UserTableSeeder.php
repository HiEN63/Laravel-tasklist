<?php

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Users = [
            'user_id' => 0,
            'user_name' => 'hoge',
            'email' => 'hoge@hoge.com',
            'password' => 'hhooggee',
            'user_role' => 0,
        ];
        DB::table('users')->insert($Users);
    }
}
