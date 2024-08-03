<?php

namespace App\Http\Controllers\api\v1\admin\student;

use App\Models\User;
use App\trait\image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\api\admin\student\StudentRequest;
use App\Http\Requests\api\admin\student\UpdateStudentRequest;

class CreateStudentController extends Controller
{
    public function __construct(private User $user){

    }
    protected $studentRequest = [
        'firstName',
        'lastName',
        'phone',
        'type',
        'email',
        'parent_name',
        'parent_phone',
        'category_id',
        'language',
        'password',
        'country_id',
        'city_id',
        'image',
    ];
    // This Controller About Student
    use image;
    public function store(StudentRequest $request){
        $newStudent =  $request->only($this->studentRequest); // Take only Request From Protected studentRequest names 
        $image =  $this->upload($request,'image','admin/student'); // Start Upload Image
        $newStudent['type'] = 'student'; // Type Of User
        $newStudent['image'] =$image; // Image Value From traid Image 
       $user = $this->user->create($newStudent); // Start Create New Studetn
        return response()->json(['success'=>'Student Created Successfully'],200); 
    }
    
    public function modify(UpdateStudentRequest $request, $id){
        $student =  $request->only($this->studentRequest); // Take only Request From Protected studentRequest names 
        $image =  $this->upload($request,'image','admin/student'); // Start Upload Image
        $student['image'] =$image; // Image Value From traid Image 
        User::where('id', $id)->update($student); // Start Create New Studetn
        return response()->json(['success'=>'Student Updated Successfully'],200); 
    }
   
}
