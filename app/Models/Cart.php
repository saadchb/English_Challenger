<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['book_id','course_id'];
    public function book():BelongsTo{
        return $this->belongsTo(Book::class);
    }
    public function Course():BelongsTo{
        return $this->belongsTo(Course::class);
    }
    public function User():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function checkout()
    {
        return $this->hasOne(Checkout::class);
    }
}
