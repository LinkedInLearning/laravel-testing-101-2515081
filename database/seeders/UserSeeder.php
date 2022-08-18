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
            'name' => 'Ana',
            'email' => 'ana@analisboa.pt',
            'password' => Hash::make('password'), //WARNING: use ONLY for DEVELOPMENT
        ]);
    }
}
