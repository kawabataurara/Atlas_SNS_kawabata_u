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
            'username' => 'test06',
             'mail' => 'test06@icloud.co.jp',
              'password' => bcrypt('testtesttesttest012'),
        ]);
    }
}
