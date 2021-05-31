<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = \Faker\Factory::create();

    $clients = Client::all();

    foreach($clients as $client) {

      Location::create([
        'address'   => $faker->streetAddress,
        'zip'       => $faker->postcode . ' ' . $faker->city,
        'client_id' => $client->id,
        'default'   => true
      ]);

      Location::create([
        'address'   => $faker->streetAddress,
        'zip'       => $faker->postcode . ' ' . $faker->city,
        'client_id' => $client->id,
        'default'   => false
      ]);
    }
  }
}
