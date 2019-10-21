<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    public function __construct($value='')
    {
        $this->middleware('auth',['except' => ['store']]);
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // for ($i = 1; $i <= 49; $i++) {
        //     $numbers[] = $i;
        // }
        // dd(array_rand($numbers, 6));
        // array_diff($a1,$a2);

        $request->validate([
            "name" => 'required',
            "leader" => 'required',
            "coleader" => 'required',
            "members" => 'required'
        ]);

        $group = Group::create([
            "name" => request('name'),
            "batch_id" => 1
        ]);

        $group->students()->attach(request('leader'), ['leader' => 1]);

        $group->students()->attach(request('coleader'), ['coleader' => 1]);

        $members = request('members');

        for($i=0; $i < count($members); $i++){
            $group->students()->attach($members[$i], ['member' => 1]);
        }

        // Redirect here
        return redirect()->route('showMentors');
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
