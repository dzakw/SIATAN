<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::insert([
            'name' => 'iqbal dzakwan',
            'email' => 'iqbaldzakwani@gmail.com',
            'image' => 'deddy.jpg',
            'password' => bcrypt('akudewe123'),
            'roles' => 'admin'
        ]);
    }
}
