<?php

namespace Database\Seeders;

use Str;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'Admin Masamujaya',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // DB::table('admins')->insert([
        //     'name' => 'Admin MTS',
        //     'email' => 'admin@gmail.com',
        //     'email_verified_at' => Carbon::now(),
        //     'password' => Hash::make('admin123'), // password terenkripsi
        //     'remember_token' => \Str::random(10),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
    }
}
