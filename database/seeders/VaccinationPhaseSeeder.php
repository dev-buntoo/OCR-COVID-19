<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccinationPhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vaccination_phases')->insert([
            'minimum_age' => 60,
            'status' => '0'
        ]);
        DB::table('vaccination_phases')->insert([
            'minimum_age' => 40,
            'status' => '0'
        ]);
        DB::table('vaccination_phases')->insert([
            'minimum_age' => 20,
            'status' => '0'
        ]);
        DB::table('vaccination_phases')->insert([
            'minimum_age' => 18,
            'status' => '0'
        ]);
        DB::table('vaccination_phases')->insert([
            'minimum_age' => 0,
            'status' => '0'
        ]);
    }
}
