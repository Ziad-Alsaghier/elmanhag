<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'chapter_id' ,
        'status' ,
        'order' ,
        'loged' ,
    ];
}
