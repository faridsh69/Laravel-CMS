<?php

use Illuminate\Database\Seeder;

class CmsDatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CmsUsersTableSeeder::class);
        $this->call(CmsCategoriesTableSeeder::class);
        $this->call(CmsSettingsTableSeeder::class);
        $this->call(CmsFeedbacksTableSeeder::class);
        $this->call(CmsCountingsTableSeeder::class);
        $this->call(CmsFeaturesTableSeeder::class);
        $this->call(CmsServicesTableSeeder::class);
        $this->call(CmsSlidersTableSeeder::class);
        $this->call(CmsMenusTableSeeder::class);
        $this->call(CmsTagsTableSeeder::class);
    }
}
