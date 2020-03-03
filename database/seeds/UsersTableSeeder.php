<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Viktor',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456qwerty'),
        ]);
        $user->assignRole('Admin');

        $user = User::create([
            'name' => 'Viktor',
            'email' => 'manager@manager.com',
            'password' => Hash::make('123456qwerty'),
        ]);
        $user->assignRole('Manager');

        $user = User::create([
            'name' => 'Viktor',
            'email' => 'user@user.com',
            'password' => Hash::make('123456qwerty'),
        ]);
        $user->assignRole('User');


    }
}
