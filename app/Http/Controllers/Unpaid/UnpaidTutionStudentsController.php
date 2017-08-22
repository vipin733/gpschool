<?php

namespace App\Http\Controllers\Unpaid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\DataTables\DataTableBase;
use App\Student;
use App\Asession;
use Carbon\Carbon;
use Auth;

class UnpaidTutionStudentsController extends Controller
{
    public function __construct()
    {
       
           $this->middleware('auth');
            
    } 

      public function unpaid_tution()
    { 
       
        return view('students.unpaid.tution_unpaid');
    }

    public function unpaid_tution_ajax(Request $request)
    {
	    $coursewise = $request->course;
	    $month = $request->month;
	    $activesessionid = Asession::where('active',1)->select('id')->first(); 
	    $start=1;

	   $current_month = Carbon::now()->month;

	   if ($month) {

	    if ($coursewise) {
	      
	            $query = Student::where(function($q) use($coursewise){
                                $q->where('status',1)
                                ->where('course_id',$coursewise);
	                         })->whereDoesntHave('tutionfeecollections', function ($q) use($month,$activesessionid) {
                                $q->whereMonth('month','=',$month)
                                 ->where('asession_id',$activesessionid->id)
                                  //->where('completed',1)
                                ->where('active',1);
                             })->with('courses');
		    }else{

		        $query = Student::where(function($q){
	                                $q->where('status',1);
		                         })->whereDoesntHave('tutionfeecollections', function ($q) use($month,$activesessionid) {
                                     $q->whereMonth('month','=',$month)
                                     ->where('asession_id',$activesessionid->id)
                                      //->where('completed',1)
                                       ->where('active',1);
                                    })->with('courses');
		    }    

	   }elseif ($coursewise) {
	            $query = Student::where(function($q) use($coursewise){
                                $q->where('status',1)
                                ->where('course_id',$coursewise);
	                        })->whereDoesntHave('tutionfeecollections', function ($q) use($current_month,$activesessionid) {
                                  $q->whereMonth('month','=',$current_month)
                                  ->where('asession_id',$activesessionid->id)
                                   //->where('completed',1)
                                   ->where('active',1);
	                             })->with('courses');
	   }else {

	            $query = Student::where(function($q){
	                                $q->where('status',1);
		                         })->whereDoesntHave('tutionfeecollections', function ($q) use($current_month,$activesessionid) {
                                    $q->whereMonth('month','=',$current_month)
                                    ->where('asession_id',$activesessionid->id)
                                     //->orWhere('completed',1)
                                     ->where('active',1);
                                 })->with('courses');
	      }


	      $dataTable = Datatables::of($query)
	             ->addColumn('profile', function ($student) {
                  return '<a href="/student/'.$student->reg_no.'" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
              })->addColumn('pay_tutuion_fee', function ($student) {
                  return '<a href="/student/'.$student->reg_no.'/tution_fee/take" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
              })->addColumn('details_tutuion_fee', function ($student) {
                  return '<a href="/student/'.$student->reg_no.'/tution_fee/details" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
              })->addColumn('Serial_No', function ($employee) use (&$start) {
                return $start++;
              })->rawColumns(['profile','pay_tutuion_fee','details_tutuion_fee','Serial_No']);          

	      $columns = ['Serial_No','student_name', 'reg_no', 'courses.name','father_name', 'mother_name'];
	      $base = new DataTableBase($query, $dataTable, $columns);
	      return $base->render(null);

    }

}
