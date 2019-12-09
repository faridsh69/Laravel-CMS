<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultUsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'first_name' => 'Farid',
                'last_name' => 'Shahidi',
                'url' => 'farid-shahidi',
                'email' => 'farid.sh69@gmail.com',
                'phone' => '+989120568203',
                'password' => bcrypt('123456'),
                'activated' => 1,
            ],
            [
                'id' => 2,
                'first_name' => 'admin',
                'last_name' => 'cms',
                'url' => 'admin-cms',
                'email' => 'admin@cms.com',
                'phone' => '+989120568204',
                'password' => bcrypt('123456'),
                'activated' => 1,
            ],
        ];
        foreach($users as $user){
            User::updateOrCreate(['id' => $user['id']], $user);
        }
    }
}
