<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => ' ',
            'last_name' => 'Administrator',
            'age' => 25,
            'phone_number' => '0850804110',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'position' => 1,
            'default_password' => 0
        ]);
    }
}
