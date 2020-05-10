<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(User::class, function (Faker $faker) {
    // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

// fake factory for messages
$factory->define(App\Message::class, function (Faker $faker) {
    do {
        $from = rand(1, 15);
        $to = rand(1, 15);
    } while ($from === $to);

    return [
        'from' => $from,
        'to' => $to,
        'text' => $faker->sentence
    ];
});

// fake factory for invites
$factory->define(App\Invite::class, function (Faker $faker) {
    // return [
    //     'user_id' => 1,
    //     'friend_id' => 2,
    //     'friend_phone' => $faker->phoneNumber
    // ];
    // return [
    //     'user_id' => $faker->numberBetween($min = 1, $max = 30),
    //     'friend_id' => $faker->numberBetween($min = 1, $max = 30),
    //     'friend_phone' => $faker->phoneNumber
    // ];
    do {
        $userid = rand(1, 15);
        $friendid = rand(1, 15);
    } while ($userid === $friendid);

    return [
        'user_id' => $userid,
        'friend_id' => $friendid,
        'friend_phone' => $faker->phoneNumber,
        'shared_link' => 'http://via.placeholder.com/150x150'
    ];
});