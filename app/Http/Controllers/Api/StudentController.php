<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validation
      $request->validate([
        "namee" => 'required|min:5|max:191',
        "namem" => 'required|min:5|max:191',
        "education" => 'required',
        "city" => 'required',
        "accepted_year" => 'required',
        "address" => 'required',
        "email" => 'unique:students',
        "phone" => 'required|max:12',
        // "profile" => 'mimes:jpeg,png',
        "dob" => 'required',
        "gender" => 'required',

        "p1" => 'required',
        "p1_rs" => 'required',
        "p1_phone" => 'required',
        "p2" => 'required',
        "p2_rs" => 'required',
        "p2_phone" => 'required',

        "because" => 'required'
      ]);

      // Save Data
      $student = Student::create([
        "namee" => request('namee'),
        "namem" => request('namem'),
        "education" => request('education'),
        "city" => request('city'),
        "accepted_year" => request('accepted_year'),
        "address" => request('address'),
        "email" => request('email'),
        "phone" => request('phone'),
        // "profile" => $path
        "dob" => request('dob'),
        "gender" => request('gender'),
        "p1" => request('p1'),
        "p1_phone" => request('p1_phone'),
        "p1_relationship" => request('p1_rs'),
        "p2" => request('p2'),
        "p2_phone" => request('p2_phone'),
        "p2_relationship" => request('p2_rs'),
        "because" => request('because'),
        "batch_id" => request('bid')
      ]);

      return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student = Student::find($id);
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // Validation
      $request->validate([
        "namee" => 'required|min:5|max:191',
        "namem" => 'required|min:5|max:191',
        "education" => 'required',
        "city" => 'required',
        "accepted_year" => 'required',
        "address" => 'required',
        "email" => 'unique:students',
        "phone" => 'required|max:12',
        // "profile" => 'mimes:jpeg,png',
        "dob" => 'required',
        "gender" => 'required',

        "p1" => 'required',
        "p1_rs" => 'required',
        "p1_phone" => 'required',
        "p2" => 'required',
        "p2_rs" => 'required',
        "p2_phone" => 'required',

        "because" => 'required'
      ]);

      $student = Student::find($id);
      $student->namee = request('namee');


      $student->save();
      return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //
      $student = Student::find($id);
      $student->delete();
      return new StudentResource($student);
    }
}
