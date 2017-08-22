<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Student;
use App\Teacher;
use App\Course;
use App\Asession;
use App\TutionFeeCollection;
use App\TransportFeeCollection;
use App\RegistraionFeeCollection;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
         $user = Auth::user();
         $activesession = Asession::where('active',1)
                                        ->select('name','id')
                                        ->first();

        $firstsession = Asession::select('name','id')
                                        ->latest()
                                        ->first();

        $secondsession = Asession::select('name','id')
                                        ->latest()
                                        ->skip(1)->first();                                                                   
         //return $secondsession;
        if ($activesession) {
            $activesessionID  = $activesession->id;
      } else{

            $activesessionID  = 100000000000000000;
      }

     if ($firstsession) {
         $first_session[] = $firstsession->name;
         $firstsessionID = $firstsession->id;
     }else{

          $first_session[] = null;
          $firstsessionID = 100000000000000000;
     }

      if ($secondsession) {
           $second_session[] = $secondsession->name;
           $secondsessionID  =  $secondsession->id;
     }else{

          $second_session[] = null;
          $secondsessionID  = 100000000000000000;
     }
         //return $secondsession;
     
         $students = Student::get();

        $students =  $students->count();
          //return $students;
        $active_students =  Student::where('status',1)->count();

        $teachers =  Teacher::where('type',0)->count();

        $active_teachers = Teacher::where('type',0)->where('status',1)->count();

        $staffs =  Teacher::where('type',1)->count();
        $active_staffs = Teacher::where('type',1)->where('status',1)->count();


        $chart_tution_fees_firstsession= TutionFeeCollection::whereHas('asessions',function($q) use($firstsessionID){
                                      $q->where('id',$firstsessionID);
                                    })->selectRaw('sum(`tution_fee`) as tution_fee, sum(`late_fee`) as late_fee, sum(`other_fee`) as other_fee')
                                    ->groupBy('course_id')
                                    ->orderBy('course_id')
                                    ->get();
        $chart_tution_fees_secondsession= TutionFeeCollection::whereHas('asessions',function($q) use($secondsessionID){
                                      $q->where('id',$secondsessionID);
                                    })->selectRaw('sum(`tution_fee`) as tution_fee, sum(`late_fee`) as late_fee, sum(`other_fee`) as other_fee')
                                    ->groupBy('course_id')
                                    ->orderBy('course_id')
                                    ->get();                            
                   if (count($chart_tution_fees_firstsession)) {
                        foreach ($chart_tution_fees_firstsession as $key => $value) {                              
                          $charttutionfeesfirstsession[] = $value->tution_fee + $value->late_fee + $value->other_fee; 

                        }
                    }else{
                        $charttutionfeesfirstsession[] = [null];
                    }

                   if (count($chart_tution_fees_secondsession)) {
                        foreach ($chart_tution_fees_secondsession as $key => $value) {                              
                          $charttutionfeessecondsession[] = $value->tution_fee + $value->late_fee + $value->other_fee; 

                        }
                    }else{
                        $charttutionfeessecondsession[] = [null];
                    } 


        $chart_transport_fees_firstsession= TransportFeeCollection::whereHas('asessions',function($q) use($firstsessionID){
                                      $q->where('id',$firstsessionID);
                                    })->selectRaw('sum(`transport_fee`) as transport_fee, sum(`late_fee`) as late_fee, sum(`other_fee`) as other_fee')
                                    ->groupBy('course_id')
                                    ->orderBy('course_id')
                                    ->get();
        $chart_transport_fees_secondsession= TransportFeeCollection::whereHas('asessions',function($q) use($secondsessionID){
                                      $q->where('id',$secondsessionID);
                                    })->selectRaw('sum(`transport_fee`) as transport_fee, sum(`late_fee`) as late_fee, sum(`other_fee`) as other_fee')
                                    ->groupBy('course_id')
                                    ->orderBy('course_id')
                                    ->get();                            
                   if (count($chart_transport_fees_firstsession)) {
                        foreach ($chart_transport_fees_firstsession as $key => $value) {                              
                          $charttransportfeesfirstsession[] = $value->transport_fee + $value->late_fee + $value->other_fee; 

                        }
                    }else{
                        $charttransportfeesfirstsession[] = [null];
                    }

                   if (count($chart_transport_fees_secondsession)) {
                        foreach ($chart_transport_fees_secondsession as $key => $value) {                              
                          $charttransportfeessecondsession[] = $value->transport_fee + $value->late_fee + $value->other_fee; 

                        }
                    }else{
                        $charttransportfeessecondsession[] = [null];
                    } 


        $chart_registraion_fees_firstsession= RegistraionFeeCollection::whereHas('asessions',function($q) use($firstsessionID){
                                      $q->where('id',$firstsessionID);
                                    })->selectRaw('sum(`registraion_fee`) as registraion_fee, sum(`late_fee`) as late_fee')
                                    ->groupBy('course_id')
                                    ->orderBy('course_id')
                                    ->get();
        $chart_registraion_fees_secondsession= RegistraionFeeCollection::whereHas('asessions',function($q) use($secondsessionID){
                                      $q->where('id',$secondsessionID);
                                    })->selectRaw('sum(`registraion_fee`) as registraion_fee, sum(`late_fee`) as late_fee')
                                    ->groupBy('course_id')
                                    ->orderBy('course_id')
                                    ->get();                            
                   if (count($chart_registraion_fees_firstsession)) {
                        foreach ($chart_registraion_fees_firstsession as $key => $value) {                              
                          $chartregistraionfeesfirstsession[] = $value->registraion_fee + $value->late_fee; 

                        }
                    }else{
                        $chartregistraionfeesfirstsession[] = [null];
                    }

                   if (count($chart_registraion_fees_secondsession)) {
                        foreach ($chart_registraion_fees_secondsession as $key => $value) {                              
                          $chartregistraionfeessecondsession[] = $value->registraion_fee + $value->late_fee; 

                        }
                    }else{
                        $chartregistraionfeessecondsession[] = [null];
                    } 



                $feesfirstsession = array_map(function () {
                    return array_sum(func_get_args());
                }, $charttutionfeesfirstsession, $charttransportfeesfirstsession, $chartregistraionfeesfirstsession);

                $feessecondsession = array_map(function () {
                    return array_sum(func_get_args());
                }, $charttutionfeessecondsession, $charttransportfeessecondsession, $chartregistraionfeessecondsession);

        $feesfirstsession =  array_map(function ($a) { return round($a / 1000, 2); }, $feesfirstsession);
        $feessecondsession =  array_map(function ($a) { return round($a / 1000, 2); }, $feessecondsession);


        $tution_fees= TutionFeeCollection::whereHas('asessions',function($q) use($activesessionID){
                                      $q->where('id',$activesessionID);
                                    })->selectRaw('sum(`tution_fee`) as tution_fee, sum(`late_fee`) as late_fee, sum(`other_fee`) as other_fee')->first();
                                                                                                                        
        $total_tution_fee = $tution_fees->tution_fee +  $tution_fees->late_fee +  $tution_fees->other_fee;

        $registration_fees= RegistraionFeeCollection::whereHas('asessions',function($q) use($activesessionID){
                                      $q->where('id',$activesessionID);
                                    })->selectRaw('sum(`registraion_fee`) as registraion_fee, sum(`late_fee`) as late_fee')->first();
                                                                                                                        
        $total_registration_fee = $registration_fees->registraion_fee +  $registration_fees->late_fee ;      

        $transport_fees= TransportFeeCollection::whereHas('asessions',function($q) use($activesessionID){
                                      $q->where('id',$activesessionID);
                                    })->selectRaw('sum(`transport_fee`) as transport_fee, sum(`late_fee`) as late_fee, sum(`other_fee`) as other_fee')->first();
        $total_transport_fee = $transport_fees->transport_fee +  $transport_fees->late_fee +  $transport_fees->other_fee;


       
        $total_firstsession_student = Student::selectRaw("count(id) as tot_student")
                                        ->orderBy('created_course_id')
                                        //->groupBy('id')
                                        ->groupBy('created_course_id')
                                        ->where('created_asession_id',$firstsessionID)
                                        ->get();
        $total_secondsession_student = Student::selectRaw("count(id) as tot_student")
                                        ->orderBy('created_course_id')
                                        //->groupBy('id')
                                        ->groupBy('created_course_id')
                                        ->where('created_asession_id',$secondsessionID)
                                        ->get();                                

        $total_courses = Student::orderBy('created_course_id')
                                        //->groupBy('id')
                                        ->groupBy('created_course_id')
                                        ->orWhere('created_asession_id',$firstsessionID)
                                        ->orWhere('created_asession_id',$secondsessionID)
                                         ->with('created_courses')->get();   
                // return $total_courses;                        
                                                           
                    if (count($total_firstsession_student)) {
                        foreach ($total_firstsession_student as $key => $value) {                              
                          $firstsession_students[] = $value->tot_student; 

                        }
                    }else{
                        $firstsession_students[] = [null];
                    }

                    //return  $firstsession_students;
                     
                    if (count($total_secondsession_student)) {
                        foreach ($total_secondsession_student as $key => $value) {                              
                          $secondsession_students[] = $value->tot_student; 

                        }
                    }else{
                        $secondsession_students[] = [null];
                    }

                   // return $secondsession_students;

                    if (count($total_courses)) {
                        foreach ($total_courses as $key => $value) {                              
                          $course_names[] = $value->created_courses->name; 

                        }
                    }else{
                        $course_names[] = [null];
                    }  





        return view('home',compact('user','students','active_students','teachers','active_teachers','staffs','active_staffs','activesession','total_tution_fee','total_registration_fee','total_transport_fee' ))->with('firstsession_students',json_encode($firstsession_students))
            ->with('secondsession_students',json_encode($secondsession_students))
            ->with('feesfirstsession',json_encode($feesfirstsession))
            ->with('feessecondsession',json_encode($feessecondsession))
            ->with('course_names',json_encode($course_names))
            ->with('first_session',json_encode($first_session))
            ->with('second_session',json_encode($second_session));
    }



}
