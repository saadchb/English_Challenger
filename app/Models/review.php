<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class review extends Model
{
    use HasFactory;
    public function course ():BelongsTo {
        return $this->belongsTo(course::class);
    }
    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }
}
