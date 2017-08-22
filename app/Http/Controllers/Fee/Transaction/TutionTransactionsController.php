<?php

namespace App\Http\Controllers\Fee\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\DataTables\DataTableBase;
use App\TutionFeeCollection;
use App\Asession;

class TutionTransactionsController extends Controller
{
    public function __construct()
    {

       $this->middleware('auth');          
    }

     public function tutions_transactions()
    { 
        $activesessionid = Asession::where('active',1)->select('id')->first(); 

          $tution_fees = TutionFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where('active',1)->selectRaw('sum(`tution_fee`) as tution_fee, sum(`late_fee`) as late_fee, sum(`other_fee`) as other_fee')->first();

          $total = $tution_fees->tution_fee+$tution_fees->late_fee+$tution_fees->other_fee;                                                                                              
          return view('transactions.tution.tution_transcations',compact('total'));
    }

    public function tutions_transactions_ajax(Request $request)
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
                                         ->where('active',1);
                                    })->with('courses','students');


         }else {
           $query = TutionFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where(function($q) use ($start,$end){
                                        $q->whereDate('created_at','>=',$start)
                                         ->whereDate('created_at','<=',$end)
                                         ->where('active',1);
                                    })->with('courses','students');
         }
      }elseif($course){
        $query = TutionFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where(function($q) use ($course){
                                        $q->where('course_id',$course)
                                        ->where('active',1);
                                    })->with('courses','students');
                    
        }
      else{
             $query = TutionFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where('active',1)->with('courses','students');
      }

      $dataTable = Datatables::of($query)
          ->addColumn('total', function ($s) {
                 return $s->tution_fee + $s->late_fee + $s->other_fee ;
          })->addColumn('view_tuition_fee', function ($tuition_fee) {
                  return '<a href="/student/'.$tuition_fee->students->reg_no.'/'.$tuition_fee->id.'/tution/reciept" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
          })->addColumn('print_tuition_fee', function ($tuition_fee) {
                  return '<a href="/student/'.$tuition_fee->id.'/tution/pdf" class="btn btn-sm btn-success"><i class="fa fa-download faa-vertical animated" aria-hidden="true"></i></a>';
          })->addColumn('Serial_No', function ($employee) use (&$start_at_no) {
                return $start_at_no++;
          })->editColumn('created_at', function ($user) {
               return $user->created_at->format('d/m/Y');
           })->editColumn('late_fee', function ($user) {
              if ($user->late_fee) {
                return $user->late_fee;
              }else {
                return $user->late_fee = 0;
              }
         })->editColumn('other_fee', function ($user) {
        if ($user->other_fee) {
          return $user->other_fee;
        }else {
          return $user->other_fee = 0;
              }
         })->editColumn('remarks', function ($user) {
            if ($user->remarks) {
              return $user->remarks;
            }else {
              return $user->remarks = 'Monthly Fee Submited';
            }
       })->rawColumns(['total','view_tuition_fee','print_tuition_fee','Serial_No']); 
       $columns = ['Serial_No','students.reg_no','courses.name','created_at', 'tution_fee', 'late_fee', 'other_fee','total','remarks'];
      $base = new DataTableBase($query, $dataTable, $columns);
      return $base->render(null);
    }

     
}
