<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\DataTables\DataTableBase;
use App\StudentAcadmic;
use App\Asession;
use App\Teacher;
use App\Student;

class SearchStudentController extends Controller
{

	public function __construct()
    {

        $this->middleware('auth');
    }

    public function home()
    {
        return view('students.search_students');
    }

    public function home_ajax(Request $request)
    {
      
        $starts = $request->start_at;
        $ende = $request->end_at;
        $addmission_course = $request->addmission_course;
        $current_course = $request->current_course;
        $dates = str_replace('/', '-', $starts);
        $datee = str_replace('/', '-', $ende);
        $start = date('Y-m-d', strtotime($dates));
        $end = date('Y-m-d', strtotime($datee));

        $startkk=1;

	    if ($addmission_course && $current_course) {
	        
	           if ($starts && $ende) {
	        	    $query = Student::whereDate('created_at','>=',$start)
                                     ->whereDate('created_at','<=',$end)
                                     ->where('created_course_id',$addmission_course)
                                     ->where('course_id',$current_course)
                                     ->with('courses','created_courses')->latest();

                                    // dd($end);
	            }else{
		            $query = Student::where('created_course_id',$addmission_course)
                                     ->where('course_id',$current_course)
                                     ->with('courses','created_courses')->latest();
		        }

		}elseif($current_course){
                
                if ($starts && $ende) {
                	$query = Student::whereDate('created_at','>=',$start)
                                     ->whereDate('created_at','<=',$end)
                                     ->where('course_id',$current_course)
                                     ->with('courses','created_courses')->latest();
                }else{
                   $query = Student::where('course_id',$current_course)
                                     ->with('courses','created_courses')->latest();
                }
		         
		}elseif ($addmission_course) {
              
              if ($starts && $ende) {
                	$query = Student::whereDate('created_at','>=',$start)
                                     ->whereDate('created_at','<=',$end)
                                     ->where('created_course_id',$addmission_course)
                                     ->with('courses','created_courses')->latest();
                }else{
                	$query = Student::where('created_course_id',$addmission_course)
                                     ->with('courses','created_courses')->latest();
                }
			
		}elseif (($starts) && ($ende)) {
			    $query = Student::whereDate('created_at','>=',$start)
                                     ->whereDate('created_at','<=',$end)
                                     ->with('courses','created_courses')->latest();
		}else{
			$query = Student::with('courses','created_courses')->latest();
		}    
             
       $dataTable = Datatables::of($query)
	             ->addColumn('profile', function ($student) {
                  return '<a href="/student/'.$student->reg_no.'" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
              })->addColumn('details_tutuion_fee', function ($student) {
                  return '<a href="/student/'.$student->reg_no.'/tution_fee/details" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
              })->addColumn('Serial_No', function ($employee) use (&$startkk) {
                return $startkk++;
              })->editColumn('created_at', function ($user) {
               return $user->created_at->format('d/m/Y');
           })->editColumn('status', function ($q) {
	              if ($q->status == 1) {
	                return 'Active';
	              }else {
	                return 'Deactivate';
	              }
           })->rawColumns(['profile','pay_tutuion_fee','details_tutuion_fee','Serial_No']);          

	      $columns = ['Serial_No','created_at', 'reg_no','student_name', 'created_courses.name','courses.name','status','father_name', 'mother_name'];
	      $base = new DataTableBase($query, $dataTable, $columns);
	      return $base->render(null);       
        
    }


    public function searchstudent()
    {
	   	 	   		   
	   return view('search.results_student');
    }
    
    public function searchstudent_ajax(Request $request)
    {
    	$section = $request->section;
    	$course = $request->course;
    	$session = $request->session;

	    $activesessionid = Asession::where('active',1)->select('id')->first(); 

	    $start=1;

	    if ($section && $course) {
	        
	           if ($session) {
	        	    $query = StudentAcadmic::where(function($q) use($course,$section,$session){
                                $q->where('course_id',$course)
                                ->where('section_id',$section)
                                ->where('asession_id',$session);
	                            })->with('courses','asessions','sections','students');
	            }else{
		            $query = StudentAcadmic::where(function($q) use($course,$section,$activesessionid){
	                                $q->where('course_id',$course)
	                                ->where('section_id',$section)
	                                ->where('asession_id',$activesessionid->id);
		                            })->with('courses','asessions','sections','students');
		        }

		}elseif($course){
                
                if ($session) {
                	$query = StudentAcadmic::where(function($q) use($course,$session){
                                $q->where('course_id',$course)
                                 ->where('asession_id',$session);
	                            })->with('courses','asessions','sections','students');
                }else{
                	$query = StudentAcadmic::where(function($q) use($course,$activesessionid){
                                $q->where('course_id',$course)
                                 ->where('asession_id',$activesessionid->id);
	                            })->with('courses','asessions','sections','students');
                }
		         
		}elseif ($section) {
              
              if ($session) {
                	$query = StudentAcadmic::where(function($q) use($section,$session){
                                $q->where('section_id',$section)
                                 ->where('asession_id',$session);
	                            })->with('courses','asessions','sections','students');
                }else{
                	$query = StudentAcadmic::where(function($q) use($section,$activesessionid){
                                $q->where('section_id',$section)
                                 ->where('asession_id',$activesessionid->id);
	                            })->with('courses','asessions','sections','students');
                }
			
		}elseif ($session) {
			     $query = StudentAcadmic::where(function($q) use($session){
                                $q->where('asession_id',$session);
	                            })->with('courses','asessions','sections','students');
		}else{
			$query = StudentAcadmic::where(function($q) use($activesessionid){
                                $q->where('asession_id',$activesessionid->id);
	                            })->with('courses','asessions','sections','students');
		}    


	      $dataTable = Datatables::of($query)
	             ->addColumn('profile', function ($q) {
                  return '<a href="/student/'.$q->students->reg_no.'" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
              })->editColumn('status', function ($q) {
	              if ($q->students->status == 1) {
	                return 'Active';
	              }else {
	                return 'Deactivate';
	              }
              })->addColumn('Serial_No', function ($employee) use (&$start) {
                return $start++;
              })->rawColumns(['profile','Serial_No']);          

	      $columns = ['Serial_No','students.student_name', 'students.reg_no', 'courses.name','sections.name','asessions.name','students.father_name', 'students.mother_name','status'];
	      $base = new DataTableBase($query, $dataTable, $columns);
	      return $base->render(null);

	}
    

    public function stopage_wise()
    {
                       
       return view('search.stopage_wise_students_search');
    }
    
    public function stopage_wise_ajax(Request $request)
    {
        $course = $request->course;
        $stopage = $request->stopage;

        $start=1;

        if ($stopage) {
            
               if ($course) {
                    $query = Student::where(function($q) use($course,$stopage){
                                $q->where('course_id',$course)
                                ->where('stopage_id',$stopage)
                                ->where('transportation',1)
                                ->where('status',1);
                                })->with('courses','stopages');
                }else{
                    $query = Student::where(function($q) use($stopage){
                                $q->where('stopage_id',$stopage)
                                 ->where('transportation',1)
                                  ->where('status',1);
                                })->with('courses','stopages');
                }

        }elseif($course){
                
                $query = Student::where(function($q) use($course){
                                $q->where('course_id',$course)
                                 ->where('transportation',1)
                                  ->where('status',1);
                                })->with('courses','stopages');
                 
        }else{
            $query = Student::where(function($q){
                                $q->where('transportation',1)
                                 ->where('status',1);
                                })->with('courses','stopages');
        }    


          $dataTable = Datatables::of($query)
                 ->addColumn('profile', function ($q) {
                  return '<a href="/student/'.$q->reg_no.'" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
              })->addColumn('Serial_No', function ($employee) use (&$start) {
                return $start++;
              })->rawColumns(['profile','Serial_No']);          

          $columns = ['Serial_No','student_name', 'reg_no', 'courses.name','stopages.name','father_name', 'mother_name','status'];
          $base = new DataTableBase($query, $dataTable, $columns);
          return $base->render(null);

    }
}

