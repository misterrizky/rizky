<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Illuminate\Http\File;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

$factory->define(Client::class, function (Faker $faker) {
    $image = $faker->image();
    $imageFile = new File($image);
    return [
        'name' => $faker->name,
        'slug' => Str::slug($faker->sentence()),
        'photo' => Storage::disk('public')->putFile('clients', $imageFile),
    ];
});
