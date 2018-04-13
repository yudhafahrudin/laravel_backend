<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
          DB::table('users')->insert([
            'name' => str_random(10),
              'username'=> 'superadmin',
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}
