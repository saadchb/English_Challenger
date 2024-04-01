<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes ;

    protected $fillable = ['title','description','img','file_path','sale_price','regular_price'];
    public function Categories() {
        return $this->belongsToMany('App\Models\Categorie', 'categories_books', 'book_id', 'categorie_id');
    }
    public function review():HasMany{
        return $this->hasMany(review::class);
    }
    public function cart():HasMany{
        return $this->hasMany(cart::class);
    }
}
