<?php

namespace App\Http\Controllers\api\v1\admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\trait\image;
use App\Http\Requests\api\admin\category\CategoryRequest;
use Illuminate\Support\Facades\File;
use App\trait\translaion;

use App\Models\category;

class CreateCategoryController extends Controller
{

    protected $categoryRequest = [
        'name',
        'ar_name',
        'tags',
        'category_id',
        'status',
    ];
    use image;
    use translaion;

    public function create( CategoryRequest $request ){
        $data = $request->only($this->categoryRequest); // Get Request
        $image =  $this->upload($request,'image','admin/categories/thumbnail'); // Upload Thumbnail
        $data['thumbnail'] = $image;
        $this->translate($data['name'], $data['ar_name']);
        category::create($data);
        return response()->json([
            'success' => 'You Added Success',
            200
        ]);
    }
}
