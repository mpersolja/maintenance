<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use App\Models\Machine;

class MachineSeeder extends Seeder
{
  protected $machines = [
    'HP' => [
      'MFP M479fdw',
      'MFP M283fdw',
      'Neverstop Laser 1001nw',
      'LaserJet Pro M404n'
    ],
    'EPSON' => [
      'XP-8600 Small-in-One',
      'ET-8500 Wireless Color All-in-One',
      'ET-8550 All-in-One'
    ],
    'BROTHER' => [
      'MFCL9570CDW',
      'MFCL6800DW',
      'MFCJ6945DW'
    ],
    'TOSHIBA' => [
      'e-STUDIO389CS',
      'e-STUDIO908',
      'HSP150',
      'BV410D'
    ]
  ];

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = \Faker\Factory::create();
    $carbon = \Carbon\Carbon::now();

    $locations = Location::all();

    foreach($locations as $location) {

      $brand = array_rand($this->machines);
      $m = $this->machines[$brand];

      Machine::create([
        'service_interval' => rand(1, 12),
        'serial_number'    => $faker->bothify('??###-###-??##-###'),
        'next_service'     => $carbon->copy()->addDays(rand(4, 45)),
        'active_since'     => $carbon->copy()->subYears(rand(0,4))->subMonths(rand(1,12))->subDays(rand(1,30)),
        'location_id'      => $location->id,
        'client_id'        => $location->client->id,
        'brand'            => $brand,
        'model'            => $m[rand(0, count($m) - 1)]
      ]);
    }

  }
}
