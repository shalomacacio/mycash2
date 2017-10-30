<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Model\Produto::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->sentence(4),
        'vlr_compra' => $faker-> numberBetween(50,5000),
        'vlr_venda' => $faker-> numberBetween(50,5000),
        'categoria_id' => 1,
        'quantidade' => 10,
        'estoque_min' => 2,
        'inativo' => 1,
        'categoria_id' => $faker-> numberBetween(1,5),
        'marca_id' =>  $faker-> numberBetween(1,5),
        // 'fornecedor_id' => $faker-> numberBetween(1,5),
    ];
});

$factory->define(App\Model\Categoria::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
    ];
});

$factory->define(App\Model\Marca::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
    ];
});

$factory->define(App\Model\Fornecedor::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'tipo_fornecedor' => 'PJ',
        'cpf_cnpj' => $faker-> numberBetween(61414956400, 61414956900 ),
        'contato' => '0000-0000'
      
    ];
});

$factory->define(App\Model\Cliente::class, function (Faker\Generator $faker) {
 

    return [
        'nome' => $faker->name
    ];
});
