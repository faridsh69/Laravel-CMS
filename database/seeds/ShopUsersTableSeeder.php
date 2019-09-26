<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class ShopUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
            	'id' => 1,
                'first_name' => 'Farid',
                'last_name' => 'Shahidi',
                'url' => 'farid-shahidi',
            	'email' => 'farid.sh69@gmail.com',
                'mobile' => '09120568203',
                'password' => bcrypt('123456'),
                'activated' => 1,
            ],
            [
                'id' => 2,
                'first_name' => 'Arash',
                'last_name' => 'Masihpour',
                'url' => 'arash-masihpour',
                'email' => 'arash@gmail.com',
                'mobile' => '09120338850',
                'password' => bcrypt('123456'),
                'activated' => 1,
            ],
            [
                'id' => 3,
                'first_name' => 'Parisa',
                'last_name' => 'Saleh',
                'url' => 'parisa-saleh',
                'email' => 'parisa@gmail.com',
                'mobile' => '09120338851',
                'password' => bcrypt('123456'),
                'activated' => 1,
            ],
            [
                'id' => 4,
                'first_name' => 'mr',
                'last_name' => 'Khaleghian',
                'url' => 'mr-khaleghian',
                'email' => 'denja@gmail.com',
                'mobile' => '09128589383',
                'password' => bcrypt('123456'),
                'activated' => 1,
                'shop_url' => 'denja',
            ],
            [
                'id' => 5,
                'first_name' => 'Ehsan',
                'last_name' => 'Mirabzade',
                'url' => 'ehsan-mirabzade',
                'email' => 'cinemacofe@gmail.com',
                'mobile' => '09122181886',
                'password' => bcrypt('123456'),
                'activated' => 1,
                'shop_url' => 'cinemacofe',
            ],
            [
                'id' => 6,  
                'first_name' => 'Mahyar',
                'last_name' => 'Shahab',
                'url' => 'mahyar-shahab',
                'email' => 'fano@gmail.com',
                'mobile' => '09125047719',
                'password' => bcrypt('123456'),
                'activated' => 1,
                'shop_url' => 'fano',
            ],
        ];
        foreach($users as $user){
            unset($user['shop_url']);
            User::updateOrCreate(['id' => $user['id']], $user);
        }
    }
}
