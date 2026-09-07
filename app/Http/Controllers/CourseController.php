<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // CREATE
    public function store()
    {
        Course::create([
            'title' => 'Introduction to Databases',
            'code' => 'CS104',
            'credit_hours' => 2,
            'instructor' => 'Dr. Ahmed Khan',
            'is_active' => true,
        ]);

        return "Course created!";
    }

    // READ (all courses)
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    // READ (one course)
    public function show($id)
    {
        $course = Course::find($id);
        return "Course: " . $course->title . " (" . $course->code . ") — Instructor: " . $course->instructor;
    }

    public function update($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return "Course not found.";
        }

        $course->credit_hours = 4;
        $course->instructor = 'Dr. Sara Malik';
        $course->save();

        return "Course updated!";
    }

    // alternative update method using Eloquent's update() method
    //     public function update($id)
    // {
    //     Course::where('id', $id)->update([
    //         'credit_hours' => 4,
    //         'instructor' => 'Dr. Sara Malik',
    //     ]);
    //     return "Course updated!";
    // }

    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return "Course not found.";
        }

        $course->delete();
        return "Course deleted!";
    }

    // alternative destroy method using Eloquent's destroy() method
    // public function destroy($id)
    // {
    //     Course::destroy($id);
    //     return "Course deleted!";
    // }
}
