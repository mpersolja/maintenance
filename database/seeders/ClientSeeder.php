<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = \Faker\Factory::create();

    Client::create([
      'name'  => $faker->company,
      'email' => $faker->email,
      'phone' => $faker->phoneNumber
    ]);

    Client::create([
      'name'  => $faker->company,
      'email' => $faker->email,
      'phone' => $faker->phoneNumber
    ]);
  }
}
