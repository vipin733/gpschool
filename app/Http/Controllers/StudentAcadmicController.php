<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Auth;
use App\Student;
use App\Course;
use App\StudentAcadmic;
use App\Asession;


class StudentAcadmicController extends Controller
{

	   public function __construct()
    {

        $this->middleware('auth');          
    }

    public function courses_for_students_sections(Request $r)
    {         

      $courses = Course::get();   

      return view('students.attachment.courses_for_students_sections',compact('courses'));
    }

    public function section_student_get($course = null, $created_at = null)
    {

         $date=Carbon::createFromTimeStamp($created_at);
     
         $activesessionid = Asession::where('active',1)->select('id')->first(); 

         $courseid = Course::where('id',$course)->where('created_at',$date)->select('id','name')->first();                              
       
        $students = Student::where('status',1)
                             ->whereHas('courses',function($q) use ($courseid){
                              $q->where('id',$courseid->id);
                             })->whereDoesntHave('studentacadmic',function($q) use($activesessionid){
                                    $q->where('asession_id',$activesessionid->id);
                              })->with('courses','courses.sections')
                                ->get();  
        $studentscounts = StudentAcadmic::selectRaw('count(id) as student_count, section_id')
                                        ->groupBy('section_id')
                                        ->orderBy('section_id')
                                        ->whereHas('courses',function($q) use ($courseid){
                                           $q->where('id',$courseid->id);
                                         })->with('sections')->get();
      
      return view('students.attachment.section_student',compact('students','studentscounts','courseid'));
    }

    public function section_student_post(Request $r,$course = null, $created_at = null)
    {
    
      $date=Carbon::createFromTimeStamp($created_at);

      $activesessionid = Asession::where('active',1)->select('id')->first(); 
      
      $students = Student::where('status',1)
                             ->whereHas('courses',function($q) use ($course, $date){
                              $q->where('id',$course)
                                ->where('created_at',$date);
                             })->whereDoesntHave('studentacadmic',function($q) use($activesessionid){
                                    $q->where('asession_id',$activesessionid->id);
                              })->select('id','course_id')
                             ->get();              
          
        $this->validate($r,[

      'section' => 'required']);  

        $roll_no = StudentAcadmic::whereHas('courses',function($q) use($course, $date){
                                     $q->where('id',$course)
                                     ->where('created_at',$date);
                                   })->where('asession_id',$activesessionid->id)
                                   ->orderBy('roll_no','desc')
                                    ->select('roll_no')
                                    ->first(); 
        if ($roll_no) {
          $roll_nos=$roll_no->roll_no;
        }else{
          $roll_nos = 0;
        }
        
                                              
         $datetime = Carbon::now();   
           
         foreach ($students as $key => $value)
       {   
        
        $data = [
                 'section_id' => $r->section [$key],
                 'roll_no'    => $roll_nos += 1,
                 'course_id'  => $value->course_id,
                 'asession_id'=> $activesessionid->id,
                 'updated_at' => $datetime,
                 'created_at' => $datetime
          ];
          
          $value->studentacadmic()->create($data);
        
      }     

       flash()->success('Successfully students section assigned');
       return back();                            

    }
}
