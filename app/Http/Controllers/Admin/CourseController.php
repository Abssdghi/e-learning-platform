<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher' => 'required|string|max:255',
            
            'start_date' => 'required|string|date_format:Y/m/d H:i:s',
        ], [
            'start_date.date_format' => 'use datepicker!',
        ]);

        $date_en = strtr($request->start_date, ['۰'=>'0','۱'=>'1','۲'=>'2','۳'=>'3','۴'=>'4','۵'=>'5','۶'=>'6','۷'=>'7','۸'=>'8','۹'=>'9']);

        [$datePart, $timePart] = explode(' ', $date_en);
        
        [$year, $month, $day] = explode('/', $datePart);

        [$hour, $minute, $second] = array_pad(explode(':', $timePart), 3, 0);

        $jdate = (new \Morilog\Jalali\Jalalian((int)$year, (int)$month, (int)$day, (int)$hour, (int)$minute, (int)$second))->toCarbon();

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'teacher' => $request->teacher,
            'start_date' => $jdate,
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course created!');
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher' => 'required|string|max:255',
            
            'start_date' => 'required|string|date_format:Y/m/d H:i:s',
        ], [
            'start_date.date_format' => 'use datepicker!',
        ]);


        $date_en = strtr($request->start_date, ['۰'=>'0','۱'=>'1','۲'=>'2','۳'=>'3','۴'=>'4','۵'=>'5','۶'=>'6','۷'=>'7','۸'=>'8','۹'=>'9']);

        [$datePart, $timePart] = explode(' ', $date_en);
        
        [$year, $month, $day] = explode('/', $datePart);

        [$hour, $minute, $second] = array_pad(explode(':', $timePart), 3, 0);

        $jdate = (new \Morilog\Jalali\Jalalian((int)$year, (int)$month, (int)$day, (int)$hour, (int)$minute, (int)$second))->toCarbon();

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'teacher' => $request->teacher,
            'start_date' => $jdate,
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated!');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return back()->with('success', 'Course deleted!');

    }
}
