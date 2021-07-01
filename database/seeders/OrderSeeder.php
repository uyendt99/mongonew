<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 100000;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('orders')->insert([
                'name' => $faker->name,
                'total_price' => rand(1,1000000),
            ]);
        }
    }
}
