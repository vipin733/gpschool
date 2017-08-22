<?php

namespace App\Http\Controllers\Add;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;

class AddCityController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function create()
    {
   	  $cities= City::get();

   	  return view('add.cities.add_cities',compact('cities'));
    }

    public function store(Request $request, City $city)
    {
    	$this->validate($request,[
            
            'name' => 'required'

   	  	]);

       flash()->success('Successfully City Created!');

   	   $city->create($request->all());

  	    return back();
    }

    public function edit(City $city)
    {
    	return view('add.cities.add_edit_cities', compact('city'));
    }

    public function update(Request $request, City $city)
    {
    	$this->validate($request,[
            
            'name' => 'required'

   	  	]);

       flash()->success('Successfully City Updated!');

   	   $city->update($request->all());
   	   
  	    return redirect()->route('cities.create');
    }

    public function destroy(City $city)
    {      

        $city->delete();  

        flash()->success('Successfully City Deleted!');     

        return back();
    }
}
