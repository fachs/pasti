<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LapKeuanganInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i <=50  ; $i++) { 
            DB::table('lap_keuangan_ins')->insert([
                'sumber' => $faker->company,
                'jumlah' => $faker->numberBetween(10000,300000),
                'tanggal' => $faker->date($format = 'Y-m-d', $max = 'now'),
            ]);
        }
    }
}
