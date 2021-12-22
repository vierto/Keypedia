<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'cartCount' => '1',
            'username' => 'Manager',
            'email_address' => 'manager@keypedia.com',
            'password' => Hash::make('manager123'),
            'confirm_password' => 'manager123',
            'address' => 'Lebanon Street Number 23',
            'gender' => 'Male',
            'date_of_birth' => '1990-01-01'
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'cartCount' => '1',
            'username' => 'Customer',
            'email_address' => 'customer@keypedia.com',
            'password' => Hash::make('customer123'),
            'confirm_password' => 'customer123',
            'address' => 'Syria Street Number 6',
            'gender' => 'Male',
            'date_of_birth' => '1995-05-14'
        ]);
    }
}
