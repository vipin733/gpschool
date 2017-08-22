<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Section;

class CourseSectionAcadmicController extends Controller
{
	 public function __construct()
    {

        $this->middleware('auth');
    }


     public function course_section_get()
    {
        $coursess = Course::with('sections')->get();

      return view('students.attachment.course_section',compact('coursess'));
    }

     public function course_section_post(Request $request)
    {
          $courses  =  $request->course;
          $sections = $request->section;

       $this->validate($request, [
        'course' => 'required|unique:course_section,course_id,NULL,NULL,section_id, ' . $request['section'],
        'section' => 'required|unique:course_section,section_id,NULL,NULL,course_id, ' . $request['course'],
    ]);

      $course = Course::where('id',$courses)->first();
      $section = Section::where('id',$sections)->first();
      
      $course->sections()->attach($section);

      flash()->success('Successfully ' .$section->name. ' Added to class '. $course->name);

       return back();
    }
}
