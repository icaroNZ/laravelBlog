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
        $user_admin = new User();
        $user_admin->name = 'Administrator';
        $user_admin->email = 'admin@gmail.com';
        $user_admin->password = 'administrator';
        $user_admin->role_id = 1;
        $user_admin->save();

        $user_subscriber = new User();
        $user_subscriber->name = 'Subscriber';
        $user_subscriber->email = 'sub@gmail.com';
        $user_subscriber->password = 'subscriber';
        $user_subscriber->role_id = 2;
        $user_subscriber->save();
    }
}
