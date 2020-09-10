<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Brand;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'brand_name' => $faker->name,
        'brand_logo' => 'http://upload.com/upload/IYTewmKfjv9oW8ujs6FfX2G393DKJlTGOik1UIHz.png',
        'brand_desc' => Str::random(10),
        'brand_url'  =>Str::random(10),
        'updated_at'=>date('Y-m-d H:i:s',time()),
        'created_at'=>date('Y-m-d H:i:s',time()),
    ];
});
