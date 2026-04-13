<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder {
    public function run(): void {
        $faker = Faker::create('id_ID');

        // Angkatan 21 s/d 25, masing-masing 10 mahasiswa = 50 total
        // Format NPM: 55201 + YY + NNN
        // Contoh: 5520122001 (angkatan 2022, urutan 001)

        $angkatanList = [21, 22, 23, 24, 25];

        foreach ($angkatanList as $angkatan) {
            for ($urutan = 1; $urutan <= 10; $urutan++) {
                $npm = intval('55201' . $angkatan . str_pad($urutan, 3, '0', STR_PAD_LEFT));

                User::create([
                    'npm'               => $npm,
                    'username'          => $faker->unique()->userName(),
                    'first_name'        => $faker->firstName(),
                    'last_name'         => $faker->lastName(),
                    'email'             => $faker->unique()->safeEmail(),
                    'email_verified_at' => now(),
                    'password'          => Hash::make('password123'),
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]);
            }
        }
    }
}