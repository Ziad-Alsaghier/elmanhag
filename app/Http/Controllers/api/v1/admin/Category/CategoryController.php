<?php

namespace App\Http\Controllers\api\v1\admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\category;

class CategoryController extends Controller
{
    public function show(){
        // Category data with parent
        $categories = category::
        where('category_id', '!=', null)
        ->with('parent_category')
        ->get();

        return response()->json([
            'categories' => $categories
        ]);
    }
}
