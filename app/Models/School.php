<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'school_name',
        'school_logo',
        'phone_number',
        'email',
        'name_headmaster',
        'phone_number_headmaster',
        'school_city',
        'adresse',
        'description'
    ];
    public function course():HasMany
    {
        return $this->hasMany(course::class);
    }
}
