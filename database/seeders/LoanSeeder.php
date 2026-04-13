<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Loan, LoanDetail, ReturnModel, User, Book};
use Faker\Factory as Faker;

class LoanSeeder extends Seeder {
    public function run(): void {
        $faker   = Faker::create('id_ID');
        $npmList = User::pluck('npm')->toArray();
        $bookIds = Book::pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {
            $loanAt   = $faker->dateTimeBetween('-6 months', '-1 month');
            $returnAt = $faker->dateTimeBetween($loanAt, 'now');

            $loan = Loan::create([
                'user_npm'  => $faker->randomElement($npmList),
                'loan_at'   => $loanAt->format('Y-m-d'),
                'return_at' => $returnAt->format('Y-m-d'),
            ]);

            // Setiap pinjaman punya 1-3 buku
            $selectedBooks = $faker->randomElements($bookIds, rand(1, 3));
            foreach ($selectedBooks as $bookId) {
                $isReturn = $faker->boolean(70);

                $detail = LoanDetail::create([
                    'loan_id'   => $loan->id,
                    'book_id'   => $bookId,
                    'is_return' => $isReturn,
                ]);

                // Jika sudah dikembalikan, buat record returns
                if ($isReturn) {
                    $isCharged = $faker->boolean(30);
                    ReturnModel::create([
                        'loan_detail_id' => $detail->id,
                        'charge'         => $isCharged,
                        'amount'         => $isCharged ? $faker->numberBetween(5000, 50000) : 0,
                    ]);
                }
            }
        }
    }
}