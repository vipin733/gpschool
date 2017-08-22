<?php

namespace App\Http\Controllers\Fee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use App\Student;
use App\TransportFeeCollection;
use App\TransportFee;
use App\Asession;
use PDF;


class TransportFeeCollectionController extends Controller
{
    public function __construct()
    {

          $this->middleware('auth');
    }


     public function transport_fee_get($reg_no = null)
    { 
       
        $activesessionid = Asession::where('active',1)->select('id','name')->first(); 

        $student = Student::where('reg_no', $reg_no)
                           ->where('transportation',1)
                           ->with(['stopages.transportFee' => function($q) use($activesessionid){
                              $q->where('asession_id',$activesessionid->id);
                           }])->with('stopages','stopages.transportFee','courses')->first();
    $transports_transactions = TransportFeeCollection::where('active',1)
                                          ->whereHas('students',function($q) use($reg_no){
                                              $q->where('reg_no',$reg_no);
                                            })->with('asessions')->latest()->take(12)->get();                    
       $transportfees = TransportFee::where('asession_id',$activesessionid->id)
                                ->with('stopages')
                                ->orderBy('stopage_id')
                                ->get();
        
        return view('students.fee.transport.pay_fee_transport',compact('student','transports_transactions','transportfees','activesessionid'));
    }

     public function transport_fee_post(Request $request,$reg_no = null )
    {

        $student = Student::where('reg_no', $reg_no)->first();

        $activesessionid = Asession::where('active',1)->select('id')->first(); 
            
                 
        $this->validate($request,[

            'transport_fee'      => 'required|numeric',
            'month'              => 'required',
            'other_fee'          => 'nullable|numeric',
            'remarks'            => 'nullable|string',
            'late_fee'           => 'nullable|numeric',
            'course'             => 'required|integer',
            'stopage'            => 'required|integer',
            'completed'          => 'required|boolean'

        ]);

         $reciept_no = TransportFeeCollection::where('asession_id',$activesessionid->id)
                                            ->orderBy('reciept_no','desc')
                                            ->select('reciept_no')
                                            ->first(); 
        if ($reciept_no) {
          $reciept_nos=$reciept_no->reciept_no;
        }else{
            $reciept_nos = 0;
        }

        $data= [
         
         'transport_fee'      => $request->transport_fee,
         'month'              => $request->month,
         'reciept_no'         => $reciept_nos += 1,
         'remarks'            => $request->remarks,
         'other_fee'          => $request->other_fee,
         'late_fee'           => $request->late_fee,
         'course_id'          => $student->course_id,
         'stopage_id'         => $student->stopage_id,
         'taker_id'           => Auth::id(),
         'asession_id'        => $activesessionid->id,
         'active'             => 1,
         'completed'          => $request->completed

        ];

          $student->transportfeecollections()->create($data);

          flash()->success('Successfully fee submited'); 

          return back(); 

    }


    public function fee_detail_transport($reg_no = null)
    {

      $student = Student::where('reg_no', $reg_no)->with('courses')->first();
      $transportfees = TransportFeeCollection::where('student_id',$student->id)
                                       ->where('active',1)
                                       ->with('courses','asessions','stopages')
                                       ->paginate(10);
        return view('students.fee.transport.fee_detail_transport',compact('student','transportfees'));
    }

     public function transport_reciept($reg_no = null, $transport_fee = null)
   {
      $student = Student::where('reg_no', $reg_no)->first();
      $transportfee = TransportFeeCollection::where('id',$transport_fee)
                                      ->where('active',1)
                                      ->where('student_id',$student->id)
                                      ->with('takers','courses','asessions','stopages')
                                      ->first();
     $total = collect([$transportfee->transport_fee,$transportfee->late_fee, $transportfee->other_fee])->sum();

      return view('students.fee.transport.transport_reciept_view', compact('transportfee','total','student'));
   }

    public function print_transport_pdf($transport_fee = null)
   {
      $transportfee = TransportFeeCollection::where('id',$transport_fee)
                                        ->where('active',1)
                                        ->with('takers','courses','asessions','students','stopages')
                                        ->first();
      $total = collect([$transportfee->transport_fee,$transportfee->other_fee,$transportfee->late_fee])->sum();

      $pdf=PDF::loadView('students.fee.transport.transport_reciept_print',compact('transportfee','total'));

      return $pdf->stream($transportfee->students->student_name.'-transport-reciept'. '.' .'pdf');
   }


   public function delete_transport(TransportFeeCollection $transport_fee)
   {
         $data = [
            'active'        => 0,
            'deleted_at'    => Carbon::now(),
            'deleted_by_id' => Auth::id()
         ];
         $transport_fee->update($data);
        flash()->success('Successfully Tution Fee Deleted!');

        return back();
   }
}
