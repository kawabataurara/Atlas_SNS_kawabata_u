<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('users')->insert([
            'username' => 'test01',
             'mail' => 'test01@co.jp',
              'password' => 'test01'
        ]);
    }
}
