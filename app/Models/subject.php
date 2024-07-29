<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'price' ,
        'discount' ,
        'category_id' ,
        'discount_type' ,
        'expired_date' ,
    ];
}
