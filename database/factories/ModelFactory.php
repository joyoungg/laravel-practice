<?php

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
$factory->define(App\Role::class, function (Faker $faker) {
    $role = ['read', 'write', 'delete', 'modify'];
    $num = $faker->numberBetween(0, 3);
    return [
        'name' => $role[$num] . $num,
        'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1 years'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
    ];
});

$factory->define(App\AccountRole::class, function ($faker) {
    $account_id_min = App\Account::min('id');
    $account_id_max = App\Account::max('id');
    $role_id_min = App\Role::min('id');
    $role_id_max = App\Role::max('id');
    return [
        'account_id' => $faker->numberBetween($account_id_min, $account_id_max),
        'role_id' => $faker->numberBetween($role_id_min, $role_id_max),
        'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1 years'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
    ];
});
