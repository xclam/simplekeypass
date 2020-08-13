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
            'name' => 'keypass',
			'code' => 'AB1234',
            'email' => 'contact@keypass.com',
            'password' => Hash::make('keypass'),
        ]);
    }
}
