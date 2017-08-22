<?php

namespace App\Http\Controllers\Fee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use App\Student;
use App\TutionFeeCollection;
use App\TutionFee;
use App\Asession;
use App\DeleteTution;
use PDF;


class TutionFeeCollectionController extends Controller
{
    public function __construct()
    {

          $this->middleware('auth');
    }


     public function tution_fee_get($reg_no = null)
    {

        $activesessionid = Asession::where('active',1)
                                        ->select('id','name')
                                        ->first();

        $student = Student::where('reg_no', $reg_no)
                           ->with(['courses.tutionfee' => function($q) use($activesessionid){
                              $q->where('asession_id',$activesessionid->id);
                           }])->with('courses','courses.tutionfee')
                           ->first();
    $tutions_transactions = TutionFeeCollection::where('active',1)
                                          ->whereHas('students',function($q) use($reg_no){
                                              $q->where('reg_no',$reg_no);
                                            })->with('asessions')->latest()->take(12)->get();
       $tutionfees = TutionFee::where('asession_id',$activesessionid->id)
                                ->with('courses')
                                ->orderBy('course_id')
                                ->get();
       // return $tutions_transactions;

        return view('students.fee.tution.pay_fee_tution',compact('student','tutions_transactions','tutionfees','activesessionid'));
    }

     public function tution_fee_post(Request $request,$reg_no = null )
    {

        $user= Auth::user();

        $student = Student::where('reg_no', $reg_no)->first();

        $activesessionid = Asession::where('active',1)->select('id')->first();


        $this->validate($request,[

            'tution_fee'      => 'required|numeric',
            'month'           => 'required',
            'other_fee'       => 'nullable|numeric',
            'remarks'         => 'nullable|string',
            'late_fee'        => 'nullable|numeric',
            'course'          => 'required',
            'completed'       => 'required|boolean'

   	  	]);

         $reciept_no = TutionFeeCollection::where('asession_id',$activesessionid->id)
                                            ->orderBy('reciept_no','desc')
                                            ->select('reciept_no')
                                            ->first();
        if ($reciept_no) {
          $reciept_nos=$reciept_no->reciept_no;
        }else{
            $reciept_nos = 0;
        }

        $data= [

         'tution_fee'      => $request->tution_fee,
         'month'           => $request->month,
         'reciept_no'      => $reciept_nos += 1,
         'remarks'         => $request->remarks,
         'other_fee'       => $request->other_fee,
         'late_fee'        => $request->late_fee,
         'course_id'       => $student->course_id,
         'taker_id'        => Auth::id(),
         'asession_id'     => $activesessionid->id,
         'active'          => 1,
         'completed'       => $request->completed

        ];

          $student->tutionfeecollections()->create($data);

          flash()->success('Successfully fee submited');
          return back();

    }


    public function fee_detail_tution($reg_no = null)
    {

      $student = Student::where('reg_no', $reg_no)->with('courses')->first();
      $tutionfees = TutionFeeCollection::where('student_id',$student->id)
                                       ->where('active',1)
                                       ->with('courses','asessions')
                                       ->paginate(10);
        return view('students.fee.tution.fee_detail_tution',compact('student','tutionfees'));
    }

     public function tution_reciept($reg_no = null, $tution_fee = null)
   {
      $student = Student::where('reg_no', $reg_no)->first();
      $tutionfee = TutionFeeCollection::where('id',$tution_fee)
                                      ->where('student_id',$student->id)
                                      ->with('takers','courses','asessions')
                                      ->first();
      $total = collect([$tutionfee->tution_fee,$tutionfee->other_fee,$tutionfee->late_fee])->sum();

      return view('students.fee.tution.tution_reciept_view', compact('tutionfee','total','student'));
   }

    public function print_tution_pdf($tution_fee = null)
   {
      $tutionfee = TutionFeeCollection::where('id',$tution_fee)
                                        ->where('active',1)
                                        ->with('takers','courses','asessions','students')
                                        ->first();
      $total = collect([$tutionfee->tution_fee,$tutionfee->other_fee,$tutionfee->late_fee])->sum();

      $pdf=PDF::loadView('students.fee.tution.tution_reciept_print',compact('tutionfee','total'));

      return $pdf->stream($tutionfee->students->student_name.'-tution-reciept'. '.' .'pdf');
   }


   public function delete_tution(TutionFeeCollection $tutionfee)
   {
         $data = [
            'active'        => 0,
            'deleted_at'    => Carbon::now(),
            'deleted_by_id' => Auth::id()
         ];
         $tutionfee->update($data);
        flash()->success('Successfully Tution Fee Deleted!');

        return back();
   }
}
