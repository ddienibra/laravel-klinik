<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //manual create
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'ddien@fic15.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'phone' => '1234567890',
        ]);
        //seeder profile clinic manual
        \App\Models\ProfileClinic::factory()->create([
            'name' => 'Klinik Denist',
            'address' => 'Jl.DI.Panjaitan no.23',
            'phone' => '05343423234',
            'email' => 'ddien@klinik.com',
            'doctor_name' => 'dr. ddien',
            'unique_code' => '123456',
        ]);
        //call seeder
        $this->call([
            DoctorSeeder::class,
            DoctorScheduleSeeder::class,
        ]);
    }
}
