<?php

namespace App\Http\Controllers\Add;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stopage;
use App\BusDetail;

class AddStopagesController extends Controller
{
     public function __construct()
    {

        $this->middleware('auth');
    }

    public function create()
    {

       $stopeages= Stopage::orderBy('id','desc')->with('buses')->paginate(5);

       $busdetails= BusDetail::pluck('name','id');

   	  return view('add.stopeages.add_stopeages',compact('stopeages','busdetails'));
    }

    public function store(Request $request, Stopage $stopage)
    {
    	$this->validate($request,[
            
            'name'       => 'required',
            'bus_detail' => 'required|integer'

   	  	]);

      $busdetail= BusDetail::where('id',$request->bus_detail)->select('id')->first();

        if (!$busdetail) {
          flash('Oops! its look like u want somthing else, please do not try!')->error();
             return back();
        }

        $data = [
           'name'       => $request->name,
           'remarks'    => $request->remarks,
           'bus_id'     => $busdetail->id
        ];
        
        Stopage::create($data);

        flash()->success('Successfully Stopage Created!');

        return back();
    }

    public function update(Request $request, Stopage $stopage)
    {
    	$this->validate($request,[

            'name'       => 'required',
            'bus_detail' => 'required|integer'

        ]);
     

        $busdetail= BusDetail::where('id',$request->bus_detail)->select('id')->first();

        if (!$busdetail) {
          flash('Oops! its look like u want somthing else, please do not try!')->error();
             return back();
        }
       
        $data = [
           'name'       => $request->name,
           'remarks'    => $request->remarks,
           'bus_id'     => $busdetail->id
        ];
        
        $stopage->update($data);

        flash()->success('Successfully Stopage Updated!');

        return back();
    }

}
