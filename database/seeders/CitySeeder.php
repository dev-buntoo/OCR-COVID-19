<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name' => 'Karachi',
        ]);
        DB::table('cities')->insert([
            'name' => 'Multan',
        ]);
        DB::table('cities')->insert([
            'name' => 'Islamabad',
        ]);
        DB::table('cities')->insert([
            'name' => 'Lahore',
        ]);
        DB::table('cities')->insert([
            'name' => 'Peshawer',
        ]);
        DB::table('cities')->insert([
            'name' => 'Kohat',
        ]);
    }
}
