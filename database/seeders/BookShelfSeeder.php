<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bookshelf;

class BookshelfSeeder extends Seeder {
    public function run(): void {
        $shelves = [
            ['code' => 'RAK-A1', 'name' => 'Rak Teknologi A1'],
            ['code' => 'RAK-A2', 'name' => 'Rak Teknologi A2'],
            ['code' => 'RAK-B1', 'name' => 'Rak Sains B1'],
            ['code' => 'RAK-B2', 'name' => 'Rak Sains B2'],
            ['code' => 'RAK-C1', 'name' => 'Rak Umum C1'],
        ];
        foreach ($shelves as $shelf) {
            Bookshelf::create($shelf);
        }
    }
}