<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batch;
use App\Mentor;
use App\Group;

class AssignMentorController extends Controller
{
    //
    public function __construct($value='')
    {
        $this->middleware('auth');
    }

    public function create($value='')
    {
    	$batches = Batch::all();
    	$mentors = Mentor::where('status',1)->get();
    	return view('assignMentor',compact('batches','mentors'));
    }

    public function getgroups(Request $request)
    {
    	// dd($request);
    	$groups = Group::where('batch_id',request('id'))
                ->doesntHave('mentors')
                ->get();
    	return $groups;
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'batch' => 'required',
    		'mentor' => 'required',
    		'nog' => 'required',
    	]);

    	// Process
    	$batch_id = request('batch');
    	$groups = Group::where('batch_id',$batch_id)
                        ->doesntHave('mentors')
                        ->get();

    	// Object into array
    	$groupsArr = json_decode(json_encode($groups),true);
    	$nog = request('nog');

    	$ramGroups = array_rand($groupsArr,$nog);

        $assignedGroups = array();

    	if ($nog > 1) {
    		for ($i=0; $i < count($ramGroups) ; $i++) { 
    			$j = $ramGroups[$i];
    			$group = Group::find($groupsArr[$j]['id']);
		    	// var_dump($group);
		    	$group->mentors()->attach(request('mentor'));

          array_push($assignedGroups, $group->name);
    		}
    	}else{
    		$group = Group::find($groupsArr[$ramGroups]['id']);
	    	// var_dump($group);
	    	$group->mentors()->attach(request('mentor'));

        array_push($assignedGroups, $group->name);

    	}
    	
 		return redirect()->back()->with('status',$assignedGroups);
    }
}
