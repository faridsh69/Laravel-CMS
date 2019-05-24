<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(TagsTableSeeder::class);

        // $this->call(BlogsTableSeeder::class);
        $models = [
            'Blog', 'Page',
        ];

        foreach($models as $model) {
            factory('App\\Models\\' . $model, 4)->create();
        }
    }
}
