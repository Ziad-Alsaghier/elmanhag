<?php

namespace App\Http\Controllers\api\v1\admin\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StudentsDataController extends Controller
{
    public function show(){
        $students = User::where('type', 'student')
        ->with('subjects')
        ->with('bundels')
        ->with('category')
        ->with('country')
        ->with('city')
        ->get();
        $total_students = count($students);
        $banned_students = count($students->where('status', 0));
        $paid_students = User::where('type', 'student')
        ->whereHas('bundels')
        ->orWhere('type', 'student')
        ->whereHas('subjects')
        ->count();
        $free_students = $total_students - $paid_students;

        return response()->json([
            'students' => $students,
            'total_students' => $total_students,
            'banned_students' => $banned_students,
            'paid_students' => $paid_students,
            'free_students' => $free_students,
        ]);
    }
}
