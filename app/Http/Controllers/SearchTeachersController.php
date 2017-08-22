<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\DataTables\DataTableBase;
use App\Teacher;

class SearchTeachersController extends Controller
{
   
	   public function __construct()
    {

        $this->middleware('auth');          
    }

    public function home()
    {
        return view('teachers.search_teacher');
    }

    public function home_ajax(Request $request)
    {
      
        $doj = $request->yeor_of_joining;

        $startkk=1;

	    if ($doj) {
	        	           
		    $query = Teacher::whereYear('date_of_joining',$doj)->latest();

         }else{
			$query = Teacher::latest();
		}    
             
       $dataTable = Datatables::of($query)
	             ->addColumn('profile', function ($q) {
                  return '<a href="/teacher/'.$q->reg_no.'" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
              })->addColumn('Serial_No', function ($employee) use (&$startkk) {
                return $startkk++;
              })->editColumn('created_at', function ($user) {
               return $user->created_at->format('d/m/Y');
           })->editColumn('date_of_joining', function ($user) {
               return $user->date_of_joining->format('d/m/Y');
           })->editColumn('status', function ($q) {
	              if ($q->status == 1) {
	                return 'Active';
	              }else {
	                return 'Deactivate';
	              }
           })->editColumn('transportation', function ($q) {
	              if ($q->transportation == 1) {
	                return 'Yes';
	              }else {
	                return 'No';
	              }
           })->rawColumns(['profile','Serial_No']);          

	      $columns = ['Serial_No','created_at', 'date_of_joining','reg_no','teacher_name','status','transportation','father_name', 'mother_name'];
	      $base = new DataTableBase($query, $dataTable, $columns);
	      return $base->render(null);       
        
    }


}
