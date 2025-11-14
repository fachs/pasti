<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class LapKeuanganOutSeeder extends Seeder
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
            DB::table('lap_keuangan_outs')->insert([
                'penerima' => $faker->name,
                'uraian' => $faker->text($maxNbChars = 25),
                'harga_satuan' => $faker->numberBetween(10000,300000),
                'kuantitas' => $faker->numberBetween(1,20),
                'total' => $faker->numberBetween(10000,300000),
                'tanggal' => $faker->date($format = 'Y-m-d', $max = 'now'),
            ]);
        }
        
    }
}
