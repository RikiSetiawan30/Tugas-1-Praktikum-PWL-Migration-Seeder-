<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder {
    public function run(): void {
        $categories = [
            'Teknologi Informasi', 'Pemrograman', 'Jaringan Komputer',
            'Basis Data', 'Kecerdasan Buatan', 'Manajemen Proyek',
            'Analisis dan Perancangan', 'Machine Learning', 'Pemrograman Gim', 'Computer Vision',
        ];
        foreach ($categories as $cat) {
            Category::create(['category' => $cat]);
        }
    }
}