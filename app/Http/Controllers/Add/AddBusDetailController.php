<?php

namespace App\Http\Controllers\Add;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BusDetail;
use Auth;

class AddBusDetailController extends Controller
{
    public function __construct()
    {

     $this->middleware('auth');
         
    }

    public function create()
    {
    	$busdetails= BusDetail::orderBy('id','desc')->paginate(5);

   	  return view('add.busdetails.add_busdetails',compact('busdetails'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            
            'name'           => 'required',
            'bus_no'         => 'required',

        ]);

        BusDetail::create($request->all());

       flash()->success('Successfully BusDetail created!');
       
        return back();
         	
    }

    public function update(Request $request, $busdetail=null)
    {
       
      $busdetail = BusDetail::where('id',$busdetail)->first();


        $this->validate($request,[
            
            'name'           => 'required',
            'bus_no'         => 'required',
        ]);


       flash()->success('Successfully BusDetail Updated!');

       $busdetail->update($request->all());
       
         return back();
     
    }
}
