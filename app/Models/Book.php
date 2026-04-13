<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    protected $fillable = [
        'title', 'author', 'year', 'publisher',
        'city', 'cover', 'category_id', 'bookshelf_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function bookshelf() {
        return $this->belongsTo(Bookshelf::class, 'bookshelf_id');
    }
    public function loanDetails() {
        return $this->hasMany(LoanDetail::class, 'book_id');
    }
}