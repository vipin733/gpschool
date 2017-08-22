<?php

namespace App\Http\Controllers\Add;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Asession;

class AddAsessionController extends Controller
{
     public function __construct()
    {

      $this->middleware('auth');
         
    }

    public function create()
    {
    	
    	$asessions= Asession::orderBy('id','desc')->paginate(5);

   	  return view('add.asessions.add_asessions',compact('asessions'));
    }

    public function store(Request $request)
    {


      $asessions= Asession::where('active',1)->count();

      if ($request->active == 1) {
            if (!$asessions > 0) {
        $this->validate($request,[
            
            'name'           => 'required|max:9|min:9',
            'active'         => 'required|boolean',

        ],
           [
            'name.required' => 'Session field is required',
            'name.max'      => 'Session should be like 2009-2010',
            'name.min'      => 'Session should be like 2009-2010',
           ]
        );

        Asession::create($request->all());

       flash()->success('Successfully Session created!');
       
        return back();

      }else{

        flash('Sorry! Only one session should be active.', 'danger');

        return back();
      }
      }else{
       $this->validate($request,[
            
            'name'           => 'required|max:9|min:9',
            'active'         => 'required|boolean',

        ],
           [
            'name.required' => 'Session field is required',
            'name.max'      => 'Session should be like 2009-2010',
            'name.min'      => 'Session should be like 2009-2010',
           ]
        );


       Asession::create($request->all());

      flash()->success('Successfully Session created!');
       
        return back();
      }


    	
    }


    public function update(Request $request,$asession=null)
    {
       
      $asessions= Asession::where('active',1)->count();
      $asession = Asession::where('id',$asession)->first();

       if ($request->active == 1) {
            if (!$asessions > 0) {
        $this->validate($request,[
            
            'name'           => 'required|max:9|min:9',
            'active'         => 'required|boolean',

        ],
           [
            'name.required' => 'Session field is required',
            'name.max'      => 'Session should be like 2009-2010',
            'name.min'      => 'Session should be like 2009-2010',
           ]
        );

       $asession->update($request->all());
       
       flash()->success('Successfully Session Updated!');

        return redirect()->route('asessions.create');

      }else{

        flash('Sorry! Only one session should be active.', 'danger');

        return back();
      }
      }else{
       $this->validate($request,[
            
            'name'           => 'required|max:9|min:9',
            'active'         => 'required|boolean',

        ],
           [
            'name.required' => 'Session field is required',
            'name.max'      => 'Session should be like 2009-2010',
            'name.min'      => 'Session should be like 2009-2010',
           ]
        );

       
       $asession->update($request->all());

       flash()->success('Successfully Session Updated!');

       
        return redirect()->route('asessions.create');
      }

     
    }

}
