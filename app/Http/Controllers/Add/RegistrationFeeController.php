<?php

namespace App\Http\Controllers\Add;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RegistraionFee;
use App\Asession;
use Auth;

class RegistrationFeeController extends Controller
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

      $registraionfees  = RegistraionFee::where('asession_id',$activesessionid->id)
                                ->with('courses')
                                ->with('asessions')->latest()->get();

      return view('add.registraion_fee.registraion_fee_structure',compact('registraionfees','activesessionid'));
   }


   public function store(Request $r)
   {


      $activesessionid = Asession::where('active',1)->select('id')->first();

      $this->validate($r,[

            'course' => 'required|integer|unique:registraion_fees,course_id,NULL,NULL,asession_id, ' . $activesessionid->id,
            'fee_details'        => 'required',
            'registraion_fee'    => 'required|numeric',
            'late_fee'           => 'nullable|numeric',
            'remarks'            => 'nullable'

         ]);

      $data = [
     
       'asession_id'          => $activesessionid->id,
       'course_id'            => $r->course,
       'fee_details'          => $r->fee_details,
       'registraion_fee'      => $r->registraion_fee,
       'late_fee'             => $r->late_fee,
       'remarks'              => $r->remarks

      ];
    
      RegistraionFee::create($data);

      flash()->success('Successfully Submited');

      return back();

   }

   public function update(Request $request,$registraion_fee = null)
   {

      $this->validate($request,[
            'fee_details'         =>  'required',
            'registraion_fee'     =>  'required|numeric',
            'late_fee'            =>  'nullable|numeric',
            'remarks'             =>  'nullable'

         ]);
    
      $registraionfee = RegistraionFee::where('id',$registraion_fee)->first();
     
      $registraionfee->update($request->all());

       flash()->success('Successfully Updated');

       return back();

   }

   public function destroy($registraion_fee = null)
   {
             
       $registraion_fee = RegistraionFee::where('id',$registraion_fee)->first();
      
        $registraion_fee->delete();

        flash()->success('Successfully Registraion Fee Fee Deleted!');

        return back();
   }
}
