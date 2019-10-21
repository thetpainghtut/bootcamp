<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Mentor;

class MentorController extends Controller
{
    public function __construct($value='')
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mentor.create');
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
      $validator = Validator::make($request->all(), [
        'name' => 'required|min:5|max:191',
        'email' => 'required|unique:mentors|max:191',
        'phone' => 'required',
        'profile' => 'required|mimes:jpeg,png|max:50000'
      ]);

      if ($validator->fails()) {
        return redirect()
                ->route('mentors.create')
                ->withErrors($validator)
                ->withInput();
      }

      $path = '';
      $password = Hash::make('123456789');

      // if ($request->hasfile('profile')) {
      //   $profile = $request->file('profile');
      //   $upload_path = public_path().'/storage/images/';
      //   $name = $profile->getClientOriginalName();
      //   $profile->move($upload_path,$name);
      //   $path = '/storage/images/'.$name;
      // }

      // Mentor::create([
      //   "name" => request('name'),
      //   "email" => request('email'),
      //   "phone" => request('phone'),
      //   "profile" => $path,
      //   "password" => $password,
      //   "status" => 1
      // ]);

      $mentor = new \App\Mentor;
      $mentor->name = $request->input('name');
      $mentor->email = $request->input('email');
      $mentor->phoneno = $request->input('phone');
      $mentor->password = $password;
      $mentor->status = 1;
      $imgfile = $request->file('profile');
      $path = '';
      if ($imgfile !== null) {
        $filenameWithExt = $imgfile->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $imgfile->getClientOriginalExtension();
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        $imgfile->move(public_path().'/storage/images/', $fileNameToStore);
        // dd('Image ok');
        $path = '/storage/images/'.$fileNameToStore;
        $mentor->profile = $path;
      } else {
        dd("Image Not Uploaded");
        $mentor->profile = $path;
      }
      $mentor->save();
      return redirect()->route('showCourses');
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
