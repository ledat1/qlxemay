<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name'     => 'admin','email'    => 'admin@gmail.com','password' => bcrypt('123123'),
        ]);
    }
}
