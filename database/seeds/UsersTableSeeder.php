<?php

use App\User;
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
        User::truncate();

        $user = new User;
        $user->name = 'camilo';
        $user->email = 'camilo@gmail.com';
        $user->password = bcrypt('camilo');
        $user->save();
    }
}
