<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

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

    public function users(){
        return belongsToMany(User::class, 'students_subjects');
    }
}
