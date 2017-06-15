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
        App\Models\User::create([
            'name' => 'admin',
            'email' => 'director@mail.ru',
            'password' => 'administrator',
            'remember_token' => 'admin',
        ]);

    }
}
