<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use App\Models\Bookshelf;
use Faker\Factory as Faker;

class BookSeeder extends Seeder {
    public function run(): void {
        $faker      = Faker::create('id_ID');
        $categoryIds  = Category::pluck('id')->toArray();
        $bookshelfIds = Bookshelf::pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {
            Book::create([
                'title'        => $faker->sentence(3),
                'author'       => $faker->name(),
                'year'         => $faker->year(),
                'publisher'    => $faker->company(),
                'city'         => $faker->city(),
                'cover'        => 'covers/default.jpg',
                'category_id'  => $faker->randomElement($categoryIds),
                'bookshelf_id' => $faker->randomElement($bookshelfIds),
            ]);
        }
    }
}