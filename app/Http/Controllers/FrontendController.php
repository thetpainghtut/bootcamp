<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Student;
use App\Mentor;
use App\Subject;

class FrontendController extends Controller
{
    public function getCourses($value='')
    {
    	$courses = Course::all();
    	return view('frontend.course',compact('courses'));
    }

    public function showRegisterForm($value='')
    {
        $subjects = Subject::all();
    	return view('frontend.registerstudent',compact('subjects'));
    }

    public function getMentors($value='')
    {
        $mentors = Mentor::all();
    	return view('frontend.mentor',compact('mentors'));
    }

    public function showInfo($value='')
    {
    	return view('frontend.info');
    }

    public function getstudentforcoleader(Request $request)
    {
        $id = request('id');
        $students = Student::whereNotIn('id',[$id])->get();
        return $students;
    }

    public function getstudentformembers(Request $request)
    {
        $cid = request('cid');
        $lid = request('lid');

        $students = Student::whereNotIn('id',[$cid,$lid])->get();
        return $students;
    }

    public function createGroup($value='')
    {
    	$students = Student::all();
    	return view('frontend.creategroup',compact('students'));
    }
}
