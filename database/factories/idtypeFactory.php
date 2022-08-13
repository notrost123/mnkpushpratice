<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\idtype;
use Faker\Generator as Faker;

$factory->define(idtype::class, function (Faker $faker) {

    return [
        'description' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
