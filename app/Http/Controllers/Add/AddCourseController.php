<?php

namespace App\Http\Controllers\Add;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;

class AddCourseController extends Controller
{

   public function __construct()
    {

        $this->middleware('auth');
    }

    public function create()
    {
    	$courses= Course::orderBy('id','desc')->paginate(5);

   	  return view('add.courses.add_courses',compact('courses'));
    }

    public function store(Request $request, Course $course)
    {
    	$this->validate($request,[
            
            'name' => 'required'

   	  	]);

       flash()->success('Successfully Course Created!');

   	   $course->create($request->all());

  	    return back();
    }


    public function update(Request $request, Course $course)
    {
    	$this->validate($request,[
            
            'name' => 'required'

   	  	]);

       flash()->success('Successfully Course Updated!');

   	   $course->update($request->all());
   	   
  	    return redirect()->route('courses.create');
    }

}
