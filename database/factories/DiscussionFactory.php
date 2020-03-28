<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Discussion;
use Faker\Generator as Faker;

$factory->define(Discussion::class, function (Faker $faker) {

    // $unixTimestap = '1584596863'; // Token expiration 1hr | date("U") + 1800;
    // echo $faker->dateTime($unixTimestamp);
    // echo $faker->date('Y-m-d', $unixTimestamp);

    // for all rows 
    return [
        //

        'user_id' => $faker->numberBetween($min = 1, $max = 30),
        'friend_id' => $faker->numberBetween($min = 1, $max = 30),
        'discussion' => $faker->text($maxNbChars = 150),
        'user_email' => $faker->unique()->safeEmail,
        'friend_email' => $faker->unique()->safeEmail,
        'selector' => $faker->unique()->numberBetween($min = 9000, $max = mt_getrandmax()),
        'token' => $faker->unique()->numberBetween($min = 10000, $max = mt_getrandmax()),
        'token_expiration' => $faker->dateTime("1584596863")
    ];
});
