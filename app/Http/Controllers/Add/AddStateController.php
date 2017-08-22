<?php

namespace App\Http\Controllers\Add;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;

class AddStateController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function create()
    {
   	  $states= State::get();

   	  return view('add.states.add_states',compact('states'));
    }

    public function store(Request $request, State $state)
    {
    	$this->validate($request,[
            
            'name' => 'required'

   	  	]);

       flash()->success('Successfully State Created!');

   	   $state->create($request->all());

  	    return back();
    }

    public function edit(State $state)
    {
    	return view('add.states.add_edit_states', compact('state'));
    }

    public function update(Request $request, State $state)
    {
    	$this->validate($request,[
            
            'name' => 'required'

   	  	]);

       flash()->success('Successfully State Updated!');

   	   $state->update($request->all());
   	   
  	    return redirect()->route('states.create');
    }

    public function destroy(State $state)
    {      

        $state->delete();  

        flash()->success('Successfully State Deleted!');     

        return back();
    }
}
