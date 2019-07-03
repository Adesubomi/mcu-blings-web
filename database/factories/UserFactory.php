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

    $colleges = config('app.colleges');
    $college = $colleges[ rand(0, count($colleges)-1)];

    $departments = $college['departments'];
    $department = $departments[ rand(0, count($departments)-1)];

    return [
        'matric_number' => rand(11, 19) .'-'. rand(1000000, 9999999),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'role' => config('app.roles.admin.key'),
        'email_verified_at' => now(),
        'department' => $department['name'],
        'college' => $college['name'],
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->state(User::class, 'student', [
    'role' => config('app.roles.student.key'),
]);
