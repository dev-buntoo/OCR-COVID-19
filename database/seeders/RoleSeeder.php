<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert(
            [
                'role_id' => '1',
                'name' => 'Admin',
                'guard_name' => 'web'
            ],
            [
                'role_id' => '2',
                'name' => 'Vaccination Center',
                'guard_name' => 'web'
            ],
            [
                'role_id' => '3',
                'name' => 'Paramedic',
                'guard_name' => 'web'
            ],
            [
                'role_id' => '4',
                'name' => 'Citizen',
                'guard_name' => 'web'
            ]
        );
    }
}
