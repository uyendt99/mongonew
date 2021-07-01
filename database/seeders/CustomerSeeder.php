<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10000;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('customers')->insert([
                'name' => $faker->name,
                'age' => rand(1,100),
                'gender' => rand(0,2),
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'address' => $faker->address,
                'classify' => "Khách hàng mới",
                'company_id' => "60c8622030946aa27a623148",
                'job' => "Nghề".Str::random(10),
                'user_ids' => "60d5b233d9210000bc006ee7"
            ]);
        }
    }
}
