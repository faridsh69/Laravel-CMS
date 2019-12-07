<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class CmsUsersTableSeeder extends Seeder
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
            	'password' => bcrypt('123456'),
                'activated' => 1,
            ],
            [
                'id' => 2,
                'first_name' => 'Eric',
                'last_name' => 'Piekarczyk',
                'url' => 'eric-piekarczyk',
                'email' => 'eric@synergypower.com',
                'password' => bcrypt('123456'),
                'activated' => 1,
            ],
        ];
        foreach($users as $user){
            User::updateOrCreate(['id' => $user['id']], $user);
        }
    }
}
