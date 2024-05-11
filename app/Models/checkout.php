<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class checkout extends Model
{
    use HasFactory,SoftDeletes;

protected $fillable =
[
    'billing_first_name',
    'billing_last_name',
    'billing_company',
    'billing_country',
    'billing_address_1',
    'billing_address_2',
    'billing_city',
    'billing_state',
    'billing_postcode',
    'billing_phone',
    'billing_email',
    'order_comments',
    // 'cart_id',
    'teacher_id',
    'student_id',
    'parent_id',
    'school_id',
    'payment_method',
];
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
