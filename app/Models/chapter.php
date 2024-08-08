<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\lesson;

class chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'subject_id' ,
        'status' ,
    ];

    public function lessons(){
        return $this->hasMany(lesson::class);
    }

}
