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
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(WidgetsTableSeeder::class);
        $this->call(BlocksTableSeeder::class); 
        $this->call(ThemesTableSeeder::class);
        if(env('APP_NAME') === 'menew')
        {
            $this->call(ShopUsersTableSeeder::class);
            $this->call(ShopThemesTableSeeder::class);
            $this->call(ShopTagsTableSeeder::class);
            $this->call(ShopCategoriesTableSeeder::class);
            $this->call(ShopsTableSeeder::class);
            $this->call(ShopProductsTableSeeder::class);

            $this->call(FeedbacksTableSeeder::class);
            $this->call(CountingsTableSeeder::class);
            $this->call(ServicesTableSeeder::class);
            $this->call(ShopFeaturesTableSeeder::class);
            $this->call(ShopSlidersTableSeeder::class);
        }
        elseif(env('APP_NAME') === 'eric')
        {
            $this->call(EricFeedbacksTableSeeder::class);
            $this->call(EricCountingsTableSeeder::class);
            $this->call(EricFeaturesTableSeeder::class);
            $this->call(EricServicesTableSeeder::class);
            $this->call(EricSlidersTableSeeder::class);
            $this->call(EricMenusTableSeeder::class);
        }
        else
        {
            $this->call(SlidersTableSeeder::class);
            $this->call(FeedbacksTableSeeder::class);
            $this->call(CountingsTableSeeder::class);
            $this->call(FeaturesTableSeeder::class);
            $this->call(ServicesTableSeeder::class);
        }
        $this->call(RolesTableSeeder::class);
        $this->call(BaseSeeder::class);
    }
}
