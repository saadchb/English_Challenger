<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $fillable = 
    [
        'type','school_photo',
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
    public function review():HasMany{
        return $this->hasMany(review::class);
    }
}
