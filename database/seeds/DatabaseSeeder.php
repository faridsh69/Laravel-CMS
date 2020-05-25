<?php

use App\Services\BaseSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FilesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(BitcointProductsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(BlocksTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(FieldsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(BaseSeeder::class);
        // $this->call(SportSeeder::class);
        // $this->call(CmsLaravelSeeder::class);
    }
}
