<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Subject;
use App\Group;

class StudentController extends Controller
{
    public function __construct($value='')
    {
        // $this->middleware('auth',['except' => ['store']]);
        $this->middleware('role:admin',['except' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groups = Group::where('batch_id',9)
                    // ->orderBy('id','desc')
                    ->get();
        // $students = Student::all();
        return view('student.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subjects = Subject::all();
        return view('student.create',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        "subjects" => 'required',
        "p1" => 'required',
        "p1_rs" => 'required',
        "p1_phone" => 'required',
        "p2" => 'required',
        "p2_rs" => 'required',
        "p2_phone" => 'required',

        "because" => 'required'
      ]);

      // if file , upload
      // if ($request->hasfile('profile')) {
      //   $profile = $request->file('profile');
      //   $upload_path = public_path().'/storage/images/';
      //   $name = $profile->getClientOriginalName();
      //   $profile->move($upload_path,$name);
      //   $path = '/storage/images/'.$name;
      // }else{
      //   $path ="";
      // }
      
      // Create
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

      $subjects = request('subjects');
      foreach ($subjects as $subject) {
        $student->subjects()->attach($subjects);
      }

      // Redirect
      return redirect()->route('showinfo')->with('status','Successfully Register! Create Group!!!');
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
        return view('student.detail',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('student.edit');
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
        //
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
    }
}
