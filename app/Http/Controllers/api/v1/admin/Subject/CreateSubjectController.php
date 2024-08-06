<?php

namespace App\Http\Controllers\api\v1\admin\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\trait\image;
use App\trait\translaion;
use App\Http\Requests\api\admin\subject\SubjectRequest;

use App\Models\subject;

class CreateSubjectController extends Controller
{
    use image;
    use translaion;
    protected $subjectRequest = [
        'name',
        'ar_name',
        'price',
        'category_id',
        'demo_video',
        'cover_photo',
        'thumbnail',
        'url',
        'description',
        'status',
        'semester',
        'expired_date'
    ];
    public function add( SubjectRequest $request ){

    }
}
