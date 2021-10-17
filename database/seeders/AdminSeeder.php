<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'email' => 'admin@admin.com',
            'cnic' => '1234567898765',
            'gender' => '1',
            'date_of_birth' => '1999-11-15',
            'password' => Hash::make('11223344')
        ]);
        $admin = DB::table('admins')->insert([
            'name' => 'ADMIN',
            'address' => 'Lahore',
            'city' => 'Lahore',
            'state' => 'Punjab',
            'user_id' => $user->user_id,
        ]);
        $user->assignRole(Role::where('name','admin')->first());
    }
}
