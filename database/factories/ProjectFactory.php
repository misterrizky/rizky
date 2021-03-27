<?php

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\File;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

$factory->define(Project::class, function (Faker $faker) {
    $image = $faker->image();
    $imageFile = new File($image);

    return [
        'fid_client' => Client::all(['id_client'])->random(),
        'title' => $faker->sentence(),
        'slug' => Str::slug($faker->sentence()),
        'description' => $faker->paragraph(10),
        'photo' => Storage::disk('public')->putFile('project', $imageFile)
    ];
});
