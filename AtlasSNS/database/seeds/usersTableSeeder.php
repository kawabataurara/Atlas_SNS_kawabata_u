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
            'username' => 'test02',
             'mail' => 'test02@icloud.co.jp',
              'password' => 'testtesttesttest012'
        ]);
    }
}
