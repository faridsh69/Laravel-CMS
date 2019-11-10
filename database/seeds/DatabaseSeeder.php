<?php

use App\Base\BaseSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(PagesTableSeeder::class);
        $this->call(BlocksTableSeeder::class);
        if(config('app.name') === 'eric') {
            $this->call(EricDatabaseSeeder::class);
        }
        elseif(config('app.name') === 'cms-laravel') {
            $this->call(CmsDatabaseSeeder::class);
        }
        else{
            $this->call(DefaultDatabaseSeeder::class);
        }
        $this->call(RolesTableSeeder::class);
        $this->call(BaseSeeder::class);
    }
}
