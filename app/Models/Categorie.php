<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    public function Books() {
        return $this->belongsToMany('App\Models\Book', 'categories_books', 'book_id', 'categorie_id');
    }
}
