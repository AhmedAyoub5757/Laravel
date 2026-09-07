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
            'title' => 'Introduction to Programming',
            'code' => 'CS101',
            'credit_hours' => 3,
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

}
