<?php

namespace App\Http\Controllers\Add;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TutionFee;
use App\Course;
use App\Asession;
use Auth;

class AddTutionFeeController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
         
    }

    public function create()
   {

      $activesessionid = Asession::where('active',1)
                                        ->select('id','name')
                                         ->first(); 

      $tutionfees  = TutionFee::where('asession_id',$activesessionid->id)
                                ->with('courses')
                                ->with('asessions')
                                ->latest()
                                ->get();

      return view('add.tution_fee.tution_fee_structure',compact('tutionfees','activesessionid'));
   }


   public function store(Request $r)
   {

      $activesessionid = Asession::where('active',1)
                                        ->select('id')
                                         ->first();

      $this->validate($r,[

            'course' => 'required|integer|unique:tution_fees,course_id,NULL,NULL,asession_id, ' . $activesessionid->id,
            'tution_fee'=>        'required|numeric',
            'late_fee'=>          'nullable|numeric',
            'other_fee'=>         'nullable|numeric',
            'remarks'   =>        'nullable'

         ]);

    $course = Course::where('id',$r->course)->first();

      $data = [
     
       'asession_id'     => $activesessionid->id,
       'tution_fee'      => $r->tution_fee,
       'late_fee'        => $r->late_fee,
       'other_fee'       => $r->other_fee,
       'course_id'       => $course->id,
       'remarks'         => $r->remarks

      ];
     

      TutionFee::create($data);

      flash()->success('Successfully Submited');
       return back();

   }


   public function update(Request $request, $tutionfee = null)
   {

      $this->validate($request,[
            'tution_fee'      =>  'required|numeric',
            'late_fee'        =>    'nullable|numeric',
            'other_fee'       =>     'nullable|numeric',
            'remarks'         =>    'nullable'

         ]);

      $tutionfee = TutionFee::where('id',$tutionfee)->first();

      $tutionfee->update($request->all());

      flash()->success('Successfully Updated');

       return back();

   }

   public function destroy($tutionfee = null)
   {
        $tutionfeed = TutionFee::where('id',$tutionfee)->first();

        $tutionfeed->delete();

        flash()->success('Successfully Tution Fee Deleted!');

        return back();
   }
}



