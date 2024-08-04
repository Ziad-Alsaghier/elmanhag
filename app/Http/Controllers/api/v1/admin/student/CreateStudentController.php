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
        $image =  $this->upload($request,'image','student\user'); // Start Upload Image
        $newStudent['type'] = 'student'; // Type Of User
        $newStudent['image'] =$image; // Image Value From traid Image 
       $user = $this->user->create($newStudent); // Start Create New Studetn
        return response()->json(['success'=>'Student Created Successfully'],200); 
    }
    
    public function modify(UpdateStudentRequest $request, $id){
        // Take only Request From Protected studentRequest names 
        $student =  $request->only($this->studentRequest); 
        // Get User Data
        $user = User::where('id', $id)
        ->where('type', 'student')
        ->first();
        // Update Image
        if ( !empty($user) ) {
            $this->deleteImage($user->image);
            $image =  $this->upload($request,'image','student\user'); // Start Upload Image
            $student['image'] =$image; // Image Value From traid Image 
            $user->update($student); // Start Create New Studetn
            return response()->json(['success'=>'Student Updated Successfully'],200); 
        }
        else{
            return response()->json(['faild'=>'Student Is not Found'],400); 
        }
    }

    public function delete( $id ){
        // Get User Data
        $user = User::where('id', $id)
        ->where('type', 'student')
        ->first();

        // Remove User
        if ( !empty($user) ) {
            $this->deleteImage($user->image);
            $user->delete();
            return response()->json(['success'=>'Student Deleted Successfully'],200); 
        }
        else{
            return response()->json(['faild'=>'Student Is not Found'],400); 
        }
    }
   
}
