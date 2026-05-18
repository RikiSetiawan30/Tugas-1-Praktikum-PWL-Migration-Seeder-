<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookshelf extends Model
{
    protected $table = 'bookshelfs'; // paksa nama tabel yang benar
    protected $fillable = ['code', 'name'];
}