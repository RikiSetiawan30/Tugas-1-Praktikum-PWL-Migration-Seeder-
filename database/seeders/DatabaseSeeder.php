<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call([
            CategorySeeder::class,
            BookshelfSeeder::class,
            UserSeeder::class,
            BookSeeder::class,
            LoanSeeder::class,
        ]);
    }
}