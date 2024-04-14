<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detailsStudent extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id', 'created_at', 'updated_at', 'updated_at'];
}
