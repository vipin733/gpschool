<?php

namespace App\Http\Controllers\Fee\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\DataTables\DataTableBase;
use App\TransportFeeCollection;
use App\Asession;


class TransportTransactionsController extends Controller
{
   public function __construct()
    {

        $this->middleware('auth');         
    }


    public function transport_transactions()
    { 
       $activesessionid = Asession::where('active',1)->select('id')->first(); 

       
      $transport_fees = TransportFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where('active',1)->selectRaw('sum(`transport_fee`) as transport_fee, sum(`late_fee`) as late_fee, sum(`other_fee`) as other_fee')->first();

            $total = $transport_fees->transport_fee+$transport_fees->late_fee+$transport_fees->other_fee;
  
                          
        //,'other_fee','late_fee'
        return view('transactions.transport.transport_transcations',compact('total'));
    }

    public function transport_transactions_ajax(Request $request)
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
           $query = TransportFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where(function($q) use ($start,$end,$course){
                                        $q->whereDate('created_at','>=',$start)
                                         ->whereDate('created_at','<=',$end)
                                         ->where('course_id',$course)
                                         ->where('active',1);
                                    })->with('courses','students');


         }else {
           $query = TransportFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where(function($q) use ($start,$end){
                                        $q->whereDate('created_at','>=',$start)
                                         ->whereDate('created_at','<=',$end)
                                         ->where('active',1);
                                    })->with('courses','students');
         }
      }elseif($course){
        $query = TransportFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where(function($q) use ($course){
                                        $q->where('course_id',$course)
                                        ->where('active',1);
                                    })->with('courses','students');
                    
        }
      else{
             $query = TransportFeeCollection::whereHas('asessions',function($q) use($activesessionid){
                                      $q->where('id',$activesessionid->id);
                                    })->where('active',1)->with('courses','students');
      }

      $dataTable = Datatables::of($query)
          ->addColumn('total', function ($s) {
                 return $s->transport_fee + $s->late_fee + $s->other_fee ;
          })->addColumn('view_transport_fee', function ($q) {
                  return '<a href="/student/'.$q->students->reg_no.'/'.$q->id.'/transport/reciept" class="btn btn-sm btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>';
          })->addColumn('print_transport_fee', function ($q) {
                  return '<a href="/student/'.$q->id.'/transport/pdf" class="btn btn-sm btn-success"><i class="fa fa-download faa-vertical animated" aria-hidden="true"></i></a>';
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
       })->rawColumns(['total','view_transport_fee','print_transport_fee','Serial_No']); 

       $columns = ['Serial_No','students.reg_no','courses.name','created_at', 'transport_fee', 'late_fee', 'other_fee','total','remarks'];
      $base = new DataTableBase($query, $dataTable, $columns);
      return $base->render(null);
    }

}
