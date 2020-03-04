<?php

use App\Services\BaseSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(FieldsTableSeeder::class);
        dd(1);
        $this->call(UsersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BitcointProductsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(BlocksTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(BaseSeeder::class);
    }
}
