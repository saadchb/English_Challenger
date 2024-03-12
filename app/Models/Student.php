<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'first_name',
        'last_name',
        'picture',
        'phone',
        'email',
        'address',
        'date_of_birth',
        'class',
    ];

    public function courses():HasMany
    {
        return $this->hasMany(Course::class);
    }
    public function parents():BelongsTo
    {
        return $this->belongsTo(Parent::class);
    }
}
