<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CourseController extends Controller
{
    public function index() {
        $courses = Course::where('start_date', '>', now())->latest()->paginate(10);
        return view('courses.index', compact('courses'));

    }

    public function myCourses() {
        $user = Auth::user();

        $mycourses = $user->courses()->paginate(10);
        return view('courses.my-courses', compact('mycourses'));

    }

    public function enroll(Request $request, Course $course) 
    {
        $user = $request->user();

        if ($course->start_date <= now()) {
            return back()->with('error', 'enrollment closed!');
        }
        if ($user->courses()->where('course_id', $course->id)->exists()) {
            return back()->with('error', 'already enrolled!');
        }

        $user->courses()->attach($course->id);
        return redirect()->route('courses.my')->with('success', 'enrolled!');

    }

    
}
