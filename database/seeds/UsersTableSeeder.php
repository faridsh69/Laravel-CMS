<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create();
        $user = [
        	'id' => 1,
        	'name' => 'Farid Shahidi',
        	'email' => 'farid.sh69@gmail.com',
        	'password' => bcrypt('eric'),
        ];
        User::firstOrCreate($user);
    }
}
