<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesCourse extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'categorie_id'];
}
