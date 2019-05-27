<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = [
        	'id' => 1,
        	'name' => 'Farid Shahidi',
        	'email' => 'farid.sh69@gmail.com',
        	'password' => bcrypt('123456'),
        ];
        User::updateOrCreate(['id' => 1], $user);
    }
}
