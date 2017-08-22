<?php

namespace App\Http\Controllers\Fee\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\DataTables\DataTableBase;
use App\RegistraionFeeCollection;
use App\Asession;


class RegistrationTransactionsController extends Controller
{
   public function __construct()
    {

         $this->middleware('auth');              
    }

    

    public function registraion_transactions()
    { 
      $activesessionid = Asession::where('active',1)->select('id')->first();


        $registraion_fees = RegistraionFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where('active',1)->selectRaw('sum(`registraion_fee`) as registraion_fee, sum(`late_fee`) as late_fee')->first();
     
         $total = $registraion_fees->registraion_fee+$registraion_fees->late_fee;
     
        
        return view('transactions.registraion.registraion_transcations',compact('total'));
    }

    public function registraion_transactions_ajax(Request $request)
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
           $query = RegistraionFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where(function($q) use ($start,$end,$course){
                                        $q->whereDate('created_at','>=',$start)
                                         ->whereDate('created_at','<=',$end)
                                         ->where('course_id',$course)
                                         ->where('active',1);
                                    })->with('courses','students');


         }else {
           $query = RegistraionFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where(function($q) use ($start,$end){
                                        $q->whereDate('created_at','>=',$start)
                                         ->whereDate('created_at','<=',$end)
                                         ->where('active',1);
                                    })->with('courses','students');
         }
      }elseif($course){
        $query = RegistraionFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where(function($q) use ($course){
                                        $q->where('course_id',$course)
                                        ->where('active',1);
                                    })->with('courses','students');
                    
        }
      else{
             $query = RegistraionFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where('active',1)->with('courses','students');
      }

      $dataTable = Datatables::of($query)
          ->addColumn('total', function ($s) {
                 return $s->registraion_fee + $s->late_fee ;
          })->addColumn('view_registraion_fee', function ($q) {
                  return '<a href="/student/'.$q->students->reg_no.'/'.$q->id.'/registration/reciept" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
          })->addColumn('print_registraion_fee', function ($q) {
                  return '<a href="/student/'.$q->id.'/registration/pdf" class="btn btn-sm btn-success"><i class="fa fa-download faa-vertical animated" aria-hidden="true"></i></a>';
          })->addColumn('Serial_No', function ($query) use (&$start_at_no) {
                return $start_at_no++;
          })->editColumn('created_at', function ($user) {
               return $user->created_at->format('d/m/Y');
           })->editColumn('late_fee', function ($user) {
              if ($user->late_fee) {
                return $user->late_fee;
              }else {
                return $user->late_fee = 0;
              }
         })->editColumn('remarks', function ($user) {
            if ($user->remarks) {
              return $user->remarks;
            }else {
              return $user->remarks = 'Fee Submited';
            }
       })->rawColumns(['total','view_registraion_fee','print_registraion_fee','Serial_No']); 
       $columns = ['Serial_No','students.reg_no','courses.name','created_at', 'registraion_fee', 'late_fee', 'total','remarks'];
      $base = new DataTableBase($query, $dataTable, $columns);
      return $base->render(null);
    }

    
}
