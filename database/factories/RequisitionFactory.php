<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Requisition;
use Faker\Generator as Faker;

$factory->define(Requisition::class, function (Faker $faker) {

    return [
        'ctrl_no' => $faker->word,
        'truck_id' => $faker->randomDigitNotNull,
        'status' => $faker->randomElement(['Cancelled:is_cancelled', 'Completed:is_completed']),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
