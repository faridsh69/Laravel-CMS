<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'url' => $faker->unique()->name,
        'short_content' => $faker->address,
        'content' => $faker->text,
        'creator_id' => 1,
        'editor_id' => 1,
        'seo_id' => 1,
        'status' => App\Models\Blog::STATUS_ACTIVE,
    ];
});
