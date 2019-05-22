<?php

use App\Models\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->uuid,
        'url' => $faker->uuid,
        'short_content' => $faker->address,
        'content' => $faker->text,
        'meta_description' => $faker->address . $faker->address,
        'keywords' => null,
        'meta_image' => null,
        'published' => true,
        'google_index' => true,
        // 'creator_id' => 1,
        // 'editor_id' => 1,
    ];
});
