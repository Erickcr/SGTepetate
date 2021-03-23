<?php

use Illuminate\Database\Seeder;

class userTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Bruno Diaz',
            'email' => 'bruno@hotmail.com',
            'password' => bcrypt('bruno123'),
            'active'=>'0'
        ]);
        DB::table('users')->insert([
            'name' => 'Kim Min Ji',
            'email' => 'test@hotmail.com',
            'password' => bcrypt('password'),
            'active' => '1'
        ]);
    }
}
