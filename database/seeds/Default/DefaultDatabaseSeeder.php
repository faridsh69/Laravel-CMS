<?php

use Illuminate\Database\Seeder;

class DefaultDatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(DefaultUsersTableSeeder::class);
        $this->call(DefaultCategoriesTableSeeder::class);
        $this->call(DefaultSettingsTableSeeder::class);
        $this->call(DefaultFeedbacksTableSeeder::class);
        $this->call(DefaultCountingsTableSeeder::class);
        $this->call(DefaultFeaturesTableSeeder::class);
        $this->call(DefaultServicesTableSeeder::class);
        $this->call(DefaultSlidersTableSeeder::class);
        $this->call(DefaultMenusTableSeeder::class);
        $this->call(DefaultTagsTableSeeder::class);
    }
}
