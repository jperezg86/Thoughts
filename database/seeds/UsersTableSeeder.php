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
        User::create([
            'name' => 'Jose Manuel Pérez',
            'email' => 'jperezg86@gmail.com',
            'password' => bcrypt("System32")
            
        ]);
    }
}
