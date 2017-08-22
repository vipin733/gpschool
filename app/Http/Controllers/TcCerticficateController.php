<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Carbon\Carbon;
use App\TCCer;
use PDF;

class TcCerticficateController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function trans_certi_get($reg_no = null)
   {
     $s = Student::where('reg_no', $reg_no)->with('courses')->first();
    $sub= \DB::table("subjects")->pluck("name");
   	 return view('certificate.t_c.tc_certi',compact('s','sub'));
   }

   public function trans_certi_post(Request $request, Student $s)
   {
      

       flash()->success('Successfully Transfer Certificate Record Submited');

       $s->tc_certis()->create($request->all());

      return redirect()->to('/acadmic/' . $s->reg_no.'/t_c_view');
        
    }

   public function trans_certi_view($reg_no = null)
   {
     $s = Student::where('reg_no', $reg_no)->with('courses','tc_certis')->first();

     $day = $s->date_of_birth->format('d');
     $month = $s->date_of_birth->format('F');
     $year = $s->date_of_birth->format('Y');
     $lc = $s->tc_certis['lclass'];

     $f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT );
     $word = $f->format($day);
     $wordy = $f->format($year);
     $lclassword = $f->format($lc);

     $pday = ucfirst(strtolower($word));
     $pyear = ucfirst(strtolower($wordy));

   	 return view('certificate.t_c.tc_certi_view',compact('s','pday','month','pyear','lclassword'));
   }

   public function trans_certi_edit($reg_no = null, TCCer $t)
   {
     $s = Student::where('reg_no', $reg_no)->with('courses','tc_certis')->first();

     return view('certificate.t_c.tc_certi_edit',compact('s','t'));
   }

   public function trans_certi_update(Request $request, TCCer $t)
   {
     

       flash()->success('Successfully Transfer Certificate Record Updated');

        $t->update($request->all());

        return redirect()->to('/acadmic/' . $t->students->reg_no.'/t_c_view');
        
   }

   public function trans_certi_print(TCCer $t)
   {
    
     $day = $t->students->date_of_birth->format('d');
     $month = $t->students->date_of_birth->format('F');
     $year = $t->students->date_of_birth->format('Y');
     $lc = $t['lclass'];

     $f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT );
     $word = $f->format($day);
     $wordy = $f->format($year);
     $lclassword = $f->format($lc);

     $pday = ucfirst(strtolower($word));
     $pyear = ucfirst(strtolower($wordy));

       $pdf=PDF::loadView('certificate.t_c.tc_certi_print',compact('t','pday','month','pyear','lclassword'))
       ->setOption('page-width', '263')
        ->setOption('page-height', '350')
        ->setOption('margin-top',20)
       ;
     
      return $pdf->stream($t->students->student_name.'-trans_certi' . '.' .'pdf');
   }

   public function download_trans_certi_print(TCCer $t)
   {
    
     $day = $t->students->date_of_birth->format('d');
     $month = $t->students->date_of_birth->format('F');
     $year = $t->students->date_of_birth->format('Y');
     $lc = $t['lclass'];
     $f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT );
     $word = $f->format($day);
     $wordy = $f->format($year);
     $lclassword = $f->format($lc);

     $pday = ucfirst(strtolower($word));
     $pyear = ucfirst(strtolower($wordy));

       $pdf=PDF::loadView('certificate.t_c.tc_certi_print',compact('t','pday','month','pyear','lclassword'))
       ->setOption('page-width', '263')
        ->setOption('page-height', '365')
        ->setOption('margin-top',20)
       ;

      return $pdf->download($t->students->student_name.'-trans_certi' . '.' .'pdf');
   }
}
