<?php

use Illuminate\Database\Seeder;

class EricDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call(EricUsersTableSeeder::class);
        $this->call(EricCategoriesTableSeeder::class);
        $this->call(EricSettingsTableSeeder::class);
        $this->call(EricFeedbacksTableSeeder::class);
        $this->call(EricCountingsTableSeeder::class);
        $this->call(EricFeaturesTableSeeder::class);
        $this->call(EricServicesTableSeeder::class);
        $this->call(EricSlidersTableSeeder::class);
        $this->call(EricMenusTableSeeder::class);
        $this->call(EricTagsTableSeeder::class);
    }
}
