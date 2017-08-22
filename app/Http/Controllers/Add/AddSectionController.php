<?php

namespace App\Http\Controllers\Add;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;


class AddSectionController extends Controller
{
   public function __construct()
    {

        $this->middleware('auth');
    }

    public function create()
    {
   	  $sections= Section::get();

   	  return view('add.sections.add_sections',compact('sections'));
    }

    public function store(Request $request, Section $section)
    {
    	$this->validate($request,[
            
            'name' => 'required'

   	  	]);

       flash()->success('Successfully Section Created!');

   	   $section->create($request->all());

  	    return back();
    }


    public function update(Request $request, Section $section)
    {
    	$this->validate($request,[
            
            'name' => 'required'

   	  	]);

       flash()->success('Successfully Section Updated!');

   	   $section->update($request->all());
   	   
  	    return redirect()->route('sections.create');
    }


}
