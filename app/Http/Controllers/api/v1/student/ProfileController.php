<?php

namespace App\Http\Controllers\api\v1\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\country;
use App\Models\city;
use App\Models\category;
use App\Models\User;

use App\Http\Requests\api\Student\ProfileRequest;

class ProfileController extends Controller
{
    protected $profil_data = ['firstName', 'lastName', 'category_id', 'language',
    'country_id', 'city_id', 'phone', 'parent_name', 'parent_phone'];

    public function index( Request $request ){
        $countries = country::
        where('status', '1')
        ->get();
        $cities = city::
        where('status', '1')
        ->get();
        $categories = category::
        where('category_id', '!=', null)
        ->where('status', '1')
        ->get();
        $user_data = auth()->user();

        return response()->json([
            'countries' => $countries,
            'cities' => $cities,
            'categories' => $categories,
            'user_data' => $user_data,
        ]);
    }

    public function update_profile( ProfileRequest $request ){
        $data = $request->only($this->profil_data);
        User::where( 'id', auth()->user()->id )
        ->update($data);

        return response()->json([
            'success' => 'You Are Updated Success'
        ]);
    }
}
