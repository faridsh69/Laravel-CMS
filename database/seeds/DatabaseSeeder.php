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
        $this->call(UsersTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(WidgetsTableSeeder::class);
        $this->call(BlocksTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(BaseSeeder::class);
    }
}
