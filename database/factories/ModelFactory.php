<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Page::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'text' => $faker->paragraph(3),
        'title' => $faker->sentence(2),
        'keywords' => implode(', ', $faker->words(4)),
        'description' => $faker->sentence(),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'text' => $faker->paragraph(3),
    ];
});

$factory->define(App\News::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(2),
        'text' => $faker->paragraph(3),
        'published_at' => $faker->dateTimeThisMonth(),
        'image' => $faker->image(storage_path('images').DIRECTORY_SEPARATOR.'news', 640, 480, null, false, false),
    ];
});

$factory->define(App\Slide::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(2),
        'text' => $faker->paragraph(3),
        'url' => $faker->url,
        'image' => $faker->image(storage_path('images').DIRECTORY_SEPARATOR.'slides', 1170, 360, null, false, false),
    ];
});

$factory->define(App\Gallery::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'text' => $faker->paragraph(3),
        'image' => $faker->image(storage_path('images').DIRECTORY_SEPARATOR.'galleries', 640, 480, null, false, false),
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->state(App\Photo::class, 'product', function ($faker) {
    $item = App\Product::inRandomOrder()->first();
    return [
        'image' => $faker->image(storage_path('images').DIRECTORY_SEPARATOR.'products', 640, 480, null, false, false),
        'img_url' => 'products/',
        'photoable_type' => 'App\Product',
        'photoable_id' => $item->id,
    ];
});

$factory->state(App\Photo::class, 'gallery', function ($faker) {
    $item = App\Gallery::inRandomOrder()->first();
    return [
        'image' => $faker->image(storage_path('images').DIRECTORY_SEPARATOR.'galleries', 640, 480, null, false, false),
        'img_url' => 'galleries/',
        'photoable_type' => 'App\Gallery',
        'photoable_id' => $item->id,
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {

    $categories = App\Category::all();

    foreach($categories as $key => $category) {
        if ($category->descendants->count()){
            unset($categories[$key]);
        }
    }

    $categoryIds = $categories->pluck('id')->all();

    return [
        'name' => $faker->company,
        'price' => $faker->randomFloat(2, 99, 100000),
        'material' => $faker->numberBetween(1, 7),
        'brief' => $faker->sentence(),
        'text' => $faker->paragraph(3),
        'available' => $faker->boolean(),
        'category_id' => $faker->randomElement($categoryIds),
        'image' => $faker->image(storage_path('images').DIRECTORY_SEPARATOR.'products', 640, 480, null, false, false),
    ];
});

$factory->define(App\File::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->file(),
        'description' => $faker->sentences(),
        'file' => $faker->image(storage_path('files').DIRECTORY_SEPARATOR, 640, 480, null, false, false),
    ];
});