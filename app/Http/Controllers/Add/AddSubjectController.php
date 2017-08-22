<?php

namespace App\Http\Controllers\Add;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subject;

class AddSubjectController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function create()
    {
   	  $subjects= Subject::get();

   	  return view('add.subjects.add_subjects',compact('subjects'));
    }

    public function store(Request $request, Subject $subject)
    {
    	$this->validate($request,[
            
            'name' => 'required'

   	  	]);

       flash()->success('Successfully Subject Created!');

   	   $subject->create($request->all());

  	    return back();
    }

    public function edit(Subject $subject)
    {
    	return view('add.subjects.add_edit_subjects', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
    	$this->validate($request,[
            
            'name' => 'required'

   	  	]);

       flash()->success('Successfully Subject Updated!');

   	   $subject->update($request->all());
   	   
  	    return redirect()->route('subjects.create');
    }

    public function destroy(Subject $subject)
    {      

        $subject->delete();  

        flash()->success('Successfully Subject Deleted!');     

        return back();
    }
}
