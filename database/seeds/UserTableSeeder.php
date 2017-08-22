<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'id' => '1',
            'admin' => '1',
            'name' => '寂寞的夜',
            'email' => 'zhulh120@163.com',
            'password' => \Illuminate\Support\Facades\Hash::make('123456'),
        ]);
    }
}
