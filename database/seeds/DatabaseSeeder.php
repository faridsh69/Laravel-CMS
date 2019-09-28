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
        $this->call(MenusTableSeeder::class);
        $this->call(WidgetsTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
        if(config('app.name') === 'eric')
        {
            $this->call(EricSettingsTableSeeder::class);
            $this->call(EricFeedbacksTableSeeder::class);
            $this->call(EricCountingsTableSeeder::class);
            $this->call(EricFeaturesTableSeeder::class);
            $this->call(EricServicesTableSeeder::class);
            $this->call(EricSlidersTableSeeder::class);
            $this->call(EricMenusTableSeeder::class);
        }
        else
        {
            $this->call(SettingsTableSeeder::class);
            $this->call(SlidersTableSeeder::class);
            $this->call(FeedbacksTableSeeder::class);
            $this->call(CountingsTableSeeder::class);
            $this->call(FeaturesTableSeeder::class);
            $this->call(ServicesTableSeeder::class);
            $this->call(TagsTableSeeder::class);
        }
        $this->call(PagesTableSeeder::class);
        $this->call(BlocksTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(BaseSeeder::class);
    }
}
