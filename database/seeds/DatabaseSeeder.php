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
        $this->call(ThemesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(WidgetsTableSeeder::class);
        $this->call(BlocksTableSeeder::class);        
        if(env('APP_NAME') === 'menew')
        {
            $this->call(ShopUsersTableSeeder::class);
            $this->call(ShopThemesTableSeeder::class);
            $this->call(ShopTagsTableSeeder::class);
            $this->call(ShopCategoriesTableSeeder::class);
            $this->call(ShopMenusTableSeeder::class);
            $this->call(ShopsTableSeeder::class);
            $this->call(ShopProductsTableSeeder::class);
        }
        elseif(env('APP_NAME') === 'eric')
        {
            $this->call(SlidersTableSeeder::class);
            $this->call(FeedbacksTableSeeder::class);
            $this->call(CountingsTableSeeder::class);
            $this->call(FeaturesTableSeeder::class);
            $this->call(MenusTableSeeder::class);
            $this->call(TagsTableSeeder::class);
            $this->call(CategoriesTableSeeder::class);
        }
        else
        {
            $this->call(UsersTableSeeder::class);
            $this->call(CategoriesTableSeeder::class);
        }
        $this->call(RolesTableSeeder::class);
        $this->call(BaseSeeder::class);
    }
}
