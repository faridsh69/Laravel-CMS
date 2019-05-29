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
            'first_name' => 'Farid',
            'last_name' => 'Shahidi',
            'url' => 'farid-shahidi',
        	'barcode' => 'farid-shahidi' . random_int(100, 100000),
        	'email' => 'farid.sh69@gmail.com',
        	'password' => bcrypt('123456'),
            'activated' => 1,
        ];
        User::updateOrCreate(['id' => 1], $user);
    }
}
