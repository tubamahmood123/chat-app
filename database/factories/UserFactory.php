<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
    	'phone' => $faker->phoneNumber,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'profile_image' =>"{{URL('/images/id.png')}}",
        'remember_token' => Str::random(10),
    ];
});


$factory->define(App\Message::class, function (Faker $faker) {
   do{
       $from=rand(1,30);
       $to=rand(1,30);
   } while($from === $to);

    return [
    	'from' => $from,
        'to' => $to,
        'text' => $faker->sentence
       
    ];
});
