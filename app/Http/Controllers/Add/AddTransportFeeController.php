<?php

namespace App\Http\Controllers\Add;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TransportFee;
use App\Stopage;
use App\Asession;
use Auth;

class AddTransportFeeController extends Controller
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

      $transportfees  = TransportFee::where('asession_id',$activesessionid->id)
                                         ->with('stopages','asessions')
                                         ->latest()->get();

      return view('add.transport_fee.trans_fee_structure',compact('transportfees','activesessionid'));
   }


   public function store(Request $r)
   {
    $activesessionid = Asession::where('active',1)
                                        ->select('id')
                                         ->first();

      $this->validate($r,[

            'stopage'          => 'required|integer|unique:transport_fees,stopage_id,NULL,NULL,asession_id, ' . $activesessionid->id,
            'transport_fee'    =>        'required|numeric',
            'late_fee'         =>        'nullable|numeric',
            'other_fee'        =>        'nullable|numeric',
            'remarks'          =>        'nullable'

         ]);

   
    
     $stopage = Stopage::where('id',$r->stopage)->first();

      $data = [
     
       'asession_id'     => $activesessionid->id,
       'stopage_id'      => $stopage->id,
       'transport_fee'   => $r->transport_fee,
       'late_fee'        => $r->late_fee,
       'other_fee'       => $r->other_fee,
       'remarks'         => $r->remarks

      ];


     TransportFee::create($data);

     flash()->success('Successfully Submited');

       return back();

   }

   public function update(Request $request,$transport_fee = null)
   {

      $transportfee = TransportFee::where('id',$transport_fee)->first();

      $this->validate($request,[
            'transport_fee'      =>  'required|numeric',
            'late_fee'           =>  'nullable|numeric',
            'other_fee'          =>  'nullable|numeric',
            'remarks'            =>  'nullable'

         ]);
    
      $transportfee->update($request->all());

      flash()->success('Successfully Updated');

      return back();

   }

   public function destroy($transport_fee = null)
   {       

      $transportfee = TransportFee::where('id',$transport_fee)->first();
      
        $transportfee->delete();

        flash()->success('Successfully Trnasport Fee Deleted!');

        return back();
   }
}
