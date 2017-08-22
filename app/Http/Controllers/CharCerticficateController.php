<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Carbon\Carbon;
use App\CharCer;
use PDF;

class CharCerticficateController extends Controller
{
     public function __construct()
    {

        $this->middleware('auth');
    }

    public function chare_certi_get($reg_no = null)
   {
     $s = Student::where('reg_no', $reg_no)->with('courses')->first();

   	 return view('certificate.char_certi',compact('s'));
   }

   public function chare_certi_post(Request $request, Student $s)
   {
   	  $this->validate($request,[

            'year_10' => 'required|numeric',
            'year_12' =>'nullable|numeric',
            'grade_10'   => 'required|string',
            'grade_12' => 'nullable|string'

   	  	]);

       flash()->success('Successfully Charector Certificate Record Submited');

   	   $s->char_certis()->create($request->all());

        return redirect()->to('/acadmic/' . $s->reg_no.'/c_c_view');
  	    
    }

     public function chare_certi_view($reg_no = null)
   {
     $s = Student::where('reg_no', $reg_no)->with('courses','char_certis','created_courses')->first();
   
    
     $day = $s->date_of_birth->format('d');
     $month = $s->date_of_birth->format('F');
     $year = $s->date_of_birth->format('Y');

     $f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT );
     $word = $f->format($day);
     $wordy = $f->format($year);

     $pday = ucfirst(strtolower($word));
     $pyear = ucfirst(strtolower($wordy));

     	 return view('certificate.char_certi_view',compact('s','pday','month','pyear'));
   	
   }

   public function chare_certi_print(CharCer $c)
   {
    
   	 $day = $c->students->date_of_birth->format('d');
     $month = $c->students->date_of_birth->format('F');
     $year = $c->students->date_of_birth->format('Y');

     $f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT );
     $word = $f->format($day);
     $wordy = $f->format($year);

     $pday = ucfirst(strtolower($word));
     $pyear = ucfirst(strtolower($wordy));

   	   $pdf=PDF::loadView('certificate.char_certi_print',compact('c','pday','month','pyear'));

      return $pdf->stream($c->students->student_name.'-char_certi' . '.' .'pdf');
   }

   public function download_chare_certi_print(CharCer $c)
   {
    
     $day = $c->students->date_of_birth->format('d');
     $month = $c->students->date_of_birth->format('F');
     $year = $c->students->date_of_birth->format('Y');

     $f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT );
     $word = $f->format($day);
     $wordy = $f->format($year);

     $pday = ucfirst(strtolower($word));
     $pyear = ucfirst(strtolower($wordy));

       $pdf=PDF::loadView('certificate.char_certi_print',compact('c','pday','month','pyear'));

      return $pdf->download($c->students->student_name.'-char_certi' . '.' .'pdf');
   }

   
   public function chare_certi_edit($reg_no = null, CharCer $c)
   {
     $s = Student::where('reg_no', $reg_no)->with('courses')->first();

   	 return view('certificate.char_certi_edit',compact('s','c'));
   }

   public function chare_certi_update(Request $request,  CharCer $c)
   {
   	  $this->validate($request,[

            'year_10' => 'required|numeric',
            'year_12' =>'nullable|numeric',
            'grade_10'   => 'required|string',
            'grade_12' => 'nullable|string'

   	  	]);

       flash()->success('Successfully Charector Certificate Record Updated');

   	    $c->update($request->all());

        return redirect()->to('/acadmic/' . $c->students->reg_no.'/c_c_view');
  	    
    }
 
}

