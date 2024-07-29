<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bundle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'          ,
        'price'         ,
        'discount'      ,
        'category_id'   ,
        'expired_date'  ,
        'discount_type' ,
    ];
}
