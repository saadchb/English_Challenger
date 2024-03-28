<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesBooks extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'categorie_id'];
    
}
