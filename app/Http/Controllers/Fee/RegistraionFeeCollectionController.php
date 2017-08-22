<?php

namespace App\Http\Controllers\Fee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use App\Student;
use App\RegistraionFeeCollection;
use App\RegistraionFee;
use App\Asession;
use PDF;


class RegistraionFeeCollectionController extends Controller
{
    public function __construct()
    {

          $this->middleware('auth');
    }


     public function registration_fee_get($reg_no = null)
    { 
       
        $activesessionid = Asession::where('active',1)->select('id','name')->first(); 

        $student = Student::where('reg_no', $reg_no)
                           ->with(['courses.registraionfee' => function($q) use($activesessionid){
                              $q->where('asession_id',$activesessionid->id);
                           }])->with('courses','courses.registraionfee')->first();
        $registraion_transactions = RegistraionFeeCollection::where('active',1)
                                          ->whereHas('students',function($q) use($reg_no){
                                              $q->where('reg_no',$reg_no);
                                            })->with('asessions')->latest()->take(12)->get();                    
       $registraionfees = RegistraionFee::where('asession_id',$activesessionid->id)
                                ->with('courses')
                                ->orderBy('course_id')
                                ->get();
        
        return view('students.fee.registration.pay_fee_registration',compact('student','registraion_transactions','registraionfees','activesessionid'));
    }

     public function registration_fee_post(Request $request,$reg_no = null )
    {

        $student = Student::where('reg_no', $reg_no)->first();

        $activesessionid = Asession::where('active',1)->select('id')->first(); 
            
                 
        $this->validate($request,[

            'registraion_fee'      => 'required|numeric',
            'fee_details'          => 'required',
            'remarks'              => 'nullable|string',
            'late_fee'             => 'nullable|numeric',
            'course'               => 'required|integer',
            'completed'            => 'required|boolean',

        ]);

         $reciept_no = RegistraionFeeCollection::where('asession_id',$activesessionid->id)
                                            ->orderBy('reciept_no','desc')
                                            ->select('reciept_no')
                                            ->first(); 
        if ($reciept_no) {
          $reciept_nos=$reciept_no->reciept_no;
        }else{
            $reciept_nos = 0;
        }

        $data= [
         
         'registraion_fee'      => $request->registraion_fee,
         'reciept_no'           => $reciept_nos += 1,
         'remarks'              => $request->remarks,
         'fee_details'          => $request->fee_details,
         'late_fee'             => $request->late_fee,
         'course_id'            => $student->course_id,
         'taker_id'             => Auth::id(),
         'asession_id'          => $activesessionid->id,
         'active'               => 1,
         'completed'            => $request->completed

        ];

          $student->registraionfeecollections()->create($data);

          flash()->success('Successfully fee submited'); 

          return back(); 

    }


    public function fee_detail_registration($reg_no = null)
    {

      $student = Student::where('reg_no', $reg_no)->with('courses')->first();

      $registraionfees = RegistraionFeeCollection::where('student_id',$student->id)
                                       ->where('active',1)
                                       ->with('courses','asessions')
                                       ->latest()
                                       ->paginate(10);
        return view('students.fee.registration.fee_detail_registration',compact('student','registraionfees'));
    }

     public function registration_reciept($reg_no = null, $registrationfee_fee = null)
   {
      $student = Student::where('reg_no', $reg_no)->first();
      $registrationfee = RegistraionFeeCollection::where('id',$registrationfee_fee)
                                      ->where('active',1)
                                      ->where('student_id',$student->id)
                                      ->with('takers','courses','asessions')
                                      ->first();
     $total = collect([$registrationfee->registraion_fee,$registrationfee->late_fee])->sum();

      return view('students.fee.registration.registration_reciept_view', compact('registrationfee','total','student'));
   }

    public function print_registration_pdf($registration_fee = null)
   {
      $registrationfee = RegistraionFeeCollection::where('id',$registration_fee)
                                        ->where('active',1)
                                        ->with('takers','courses','asessions','students')
                                        ->first();
      $total = collect([$registrationfee->registraion_fee,$registrationfee->late_fee])->sum();

      $pdf=PDF::loadView('students.fee.registration.registration_reciept_print',compact('registrationfee','total'));

      return $pdf->stream($registrationfee->students->student_name.'-registration-reciept'. '.' .'pdf');
   }


   public function delete_registration(RegistraionFeeCollection $registration_fee)
   {
         $data = [
            'active'        => 0,
            'deleted_at'    => Carbon::now(),
            'deleted_by_id' => Auth::id()
         ];
         $registration_fee->update($data);
        flash()->success('Successfully Tution Fee Deleted!');

        return back();
   }
}
