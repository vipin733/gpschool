<?php

namespace App\Http\Controllers\Fee\Deleted;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\DataTables\DataTableBase;
use App\TutionFeeCollection;
use App\Asession;

class DeleteTutionTransactionsController extends Controller
{
    public function __construct()
    {

       $this->middleware('auth');          
    }

     public function delete_tutions_transactions()
    { 
                                                                                                    
          return view('deletetransactions.tution.delete_tution_transcations');
    }

    public function delete_tutions_transactions_ajax(Request $request)
    { 
      $starts = $request->start_at;
      $ende = $request->end_at;
      $course = $request->course;
      $dates = str_replace('/', '-', $starts);
      $datee = str_replace('/', '-', $ende);
      $start = date('Y-m-d', strtotime($dates));
      $end = date('Y-m-d', strtotime($datee));
      $start_at_no=1;
      $activesessionid = Asession::where('active',1)->select('id')->first(); 


      if (($starts) && ($ende))
       {
         if ($course) {

          //dd($dates);
           $query = TutionFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where(function($q) use ($start,$end,$course){
                                        $q->whereDate('created_at','>=',$start)
                                         ->whereDate('created_at','<=',$end)
                                         ->where('course_id',$course)
                                         ->where('active',0);
                                    })->with('courses','students','deletedby');


         }else {
           $query = TutionFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where(function($q) use ($start,$end){
                                        $q->whereDate('created_at','>=',$start)
                                         ->whereDate('created_at','<=',$end)
                                         ->where('active',0);
                                    })->with('courses','students','deletedby');
         }
      }elseif($course){
        $query = TutionFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where(function($q) use ($course){
                                        $q->where('course_id',$course)
                                        ->where('active',0);
                                    })->with('courses','students','deletedby');
                    
        }
      else{
             $query = TutionFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where('active',0)->with('courses','students','deletedby');
      }

      $dataTable = Datatables::of($query)
          ->addColumn('total', function ($s) {
                 return $s->tution_fee + $s->late_fee + $s->other_fee ;
          })->addColumn('view_tuition_fee', function ($tuition_fee) {
                  return '<a href="/student/'.$tuition_fee->students->reg_no.'/'.$tuition_fee->id.'/tution/reciept" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
          })->addColumn('Serial_No', function ($employee) use (&$start_at_no) {
                return $start_at_no++;
          })->editColumn('deleted_at', function ($user) {
               return $user->deleted_at->format('d/m/Y h:i A');
           })->editColumn('remarks', function ($user) {
            if ($user->remarks) {
              return $user->remarks;
            }else {
              return $user->remarks = 'Monthly Fee Submited';
            }
       })->rawColumns(['total','view_tuition_fee','Serial_No']); 
       $columns = ['Serial_No','students.reg_no','courses.name','deleted_at','deletedby.name','total','remarks'];
      $base = new DataTableBase($query, $dataTable, $columns);
      return $base->render(null);
    }

     
}
