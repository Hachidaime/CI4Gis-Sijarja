<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class SystemSeeder extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    $faker = \Faker\Factory::create('id_ID');
    $data = [];

    for ($i = 0; $i < 5; $i++) {
      $name = $faker->word;
      $slug = url_title($name, '-', true);
      $sort = $faker->randomDigit;
      $created_at = Time::createFromTimestamp($faker->unixTime);
      $updated_at = Time::createFromTimestamp($faker->unixTime);

      $data[] = [
        'name' => $name,
        'slug' => $slug,
        'sort' => $sort,
        'created_at' => $created_at,
        'updated_at' => $updated_at,
      ];
    }

    // Using Query Builder
    $this->db->table('system')->insertBatch($data);
  }
}
