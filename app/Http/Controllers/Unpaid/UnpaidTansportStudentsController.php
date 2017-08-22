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

class UnpaidTansportStudentsController extends Controller
{
    public function __construct()
    {
       
        $this->middleware('auth');
            
    } 

      public function unpaid_trans()
    { 
    
        return view('students.unpaid.transport_unpaid');

    }

    public function unpaid_trans_ajax(Request $request)
    {
	   $coursewise = $request->course;
	   $month = $request->month;
     $stopage = $request->stopage;

	    $activesessionid = Asession::where('active',1)->select('id')->first(); 
	    $start=1;

	   $current_month = Carbon::now()->month;

	   if ($month && $stopage) {

	    if ($coursewise) {
	      
	            $query = Student::where(function($q) use($coursewise,$stopage){
                                $q->where('status',1)
                                ->where('transportation',1)
                                ->where('course_id',$coursewise)
                                ->where('stopage_id',$stopage);
	                         })->whereDoesntHave('transportfeecollections', function ($q) use($month,$activesessionid) {
                                $q->whereMonth('month','=',$month)
                                 ->where('asession_id',$activesessionid->id)
                                  //->where('completed',1)
                                  ->where('active',1);
                             })->with('courses','stopages');
		    }else{

		        $query = Student::where(function($q) use($stopage){
	                                $q->where('status',1)
	                                ->where('transportation',1)
                                   ->where('stopage_id',$stopage);
		                         })->whereDoesntHave('transportfeecollections', function ($q) use($month,$activesessionid) {
                                     $q->whereMonth('month','=',$month)
                                     ->where('asession_id',$activesessionid->id)
                                      //->where('completed',1)
                                      ->where('active',1);
                                    })->with('courses','stopages');
		    }    

	   }elseif ($coursewise) {

        if ($month) {
                  

              $query = Student::where(function($q) use($coursewise){
                                $q->where('status',1)
                                ->where('transportation',1)
                                ->where('course_id',$coursewise);
                          })->whereDoesntHave('transportfeecollections', function ($q) use($month,$activesessionid) {
                                  $q->whereMonth('month','=',$month)
                                  ->where('asession_id',$activesessionid->id)
                                  // ->where('completed',1)
                                  ->where('active',1);
                               })->with('courses','stopages');
        }

         else{

              $query = Student::where(function($q) use($coursewise){
                                $q->where('status',1)
                                ->where('transportation',1)
                                ->where('course_id',$coursewise);
                          })->whereDoesntHave('transportfeecollections', function ($q) use($current_month,$activesessionid) {
                                  $q->whereMonth('month','=',$current_month)
                                  ->where('asession_id',$activesessionid->id)
                                  // ->where('completed',1)
                                  ->where('active',1);
                               })->with('courses','stopages');

         }

	   }elseif($stopage) {

            if ($coursewise) {

              $query = Student::where(function($q) use($coursewise, $stopage){
                                  $q->where('status',1)
                                  ->where('transportation',1)
                                  ->where('course_id',$coursewise)
                                ->where('stopage_id',$stopage);
                             })->whereDoesntHave('transportfeecollections', function ($q) use($current_month,$activesessionid) {
                                    $q->whereMonth('month','=',$current_month)
                                    ->where('asession_id',$activesessionid->id)
                                     //->where('completed',1)
                                     ->where('active',1);
                                 })->with('courses','stopages');
             
            }else{


              $query = Student::where(function($q) use($stopage){
                                  $q->where('status',1)
                                  ->where('transportation',1)
                                ->where('stopage_id',$stopage);
                             })->whereDoesntHave('transportfeecollections', function ($q) use($current_month,$activesessionid) {
                                    $q->whereMonth('month','=',$current_month)
                                    ->where('asession_id',$activesessionid->id)
                                     //->where('completed',1)
                                     ->where('active',1);
                                 })->with('courses','stopages');

            }


	      }elseif($month){
        
              $query = Student::where(function($q){
                                  $q->where('status',1)
                                  ->where('transportation',1);
                             })->whereDoesntHave('transportfeecollections', function ($q) use($month,$activesessionid) {
                                    $q->whereMonth('month','=',$month)
                                    ->where('asession_id',$activesessionid->id)
                                     //->where('completed',1)
                                     ->where('active',1);
                                 })->with('courses','stopages');
        }else{

          $query = Student::where(function($q){
                                  $q->where('status',1)
                                  ->where('transportation',1);
                             })->whereDoesntHave('transportfeecollections', function ($q) use($current_month,$activesessionid) {
                                    $q->whereMonth('month','=',$current_month)
                                    ->where('asession_id',$activesessionid->id)
                                     //->where('completed',1)
                                     ->where('active',1);
                                 })->with('courses','stopages');
        }


	      $dataTable = Datatables::of($query)
	             ->addColumn('profile', function ($student) {
                  return '<a href="/student/'.$student->reg_no.'" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
              })->addColumn('pay_transport_fee', function ($student) {
                  return '<a href="/student/'.$student->reg_no.'/transport_fee/take" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
              })->addColumn('details_transport_fee', function ($student) {
                  return '<a href="/student/'.$student->reg_no.'/transport_fee/details" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
              })->addColumn('Serial_No', function ($employee) use (&$start) {
                return $start++;
              })->rawColumns(['profile','pay_transport_fee','details_transport_fee','Serial_No']);          

	      $columns = ['Serial_No','student_name', 'reg_no', 'courses.name','stopages.name','father_name', 'mother_name'];
	      $base = new DataTableBase($query, $dataTable, $columns);
	      return $base->render(null);

    }
}
