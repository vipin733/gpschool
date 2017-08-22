<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Course;
use Cache;


class TestingController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }

    public function yearpie(Request $request)
    {

    	$querycourse = $request->course;

    	if ($querycourse)
            {
            	 $student = Student::groupbyyearsearchcours()
                             ->where('course_id','=',$querycourse)->get()->toArray();
               $student = array_pluck($student, 'student_count');
            }
            else
            {
              $student = Cache::remember('student', 5, function()
              {
                 return  Student::groupbyyear();
               });
               $student = array_pluck($student, 'student_count');

            }
               $year = Cache::remember('year', 5, function()
              {
                 return  Student::yearname()->get()->toArray();
               });
                $year = array_pluck($year, 'year_count');

    	return view('testing.pie.pieyear')
    	       ->with('student',json_encode($student,JSON_NUMERIC_CHECK))
              ->with('year',json_encode($year,JSON_NUMERIC_CHECK));

    }

     public function coursespie(Request $request)
    {
    	$query = $request->year;

    	 if ($query)
            {
            	 $course_wise = Student::groupbycoursesearchyear()
                                        ->where('year_of_admission','=',$query)
                                        ->get()->toArray();
               $course_wise = array_column($course_wise, 'student_count');
            }
            else
            {
              $course_wise = Cache::remember('course_wise', 5, function()
              {
                 return  Student::groupbycourse();
               });
               $course_wise = array_column($course_wise, 'student_count');

            }

              $course_name = Cache::remember('course_name', 5, function()
              {
                 return  Course::coursename();
               });
              $course_name = array_column($course_name, 'course');

    	return view('testing.pie.piecourse')
    	  ->with('course_name',json_encode($course_name,JSON_NUMERIC_CHECK))
          ->with('course_wise',json_encode($course_wise,JSON_NUMERIC_CHECK));
    }


    public function yeardoughnut( Request $request)
    {

    	$querycourse = $request->course;

    	if ($querycourse)
            {
            	 $student = Student::groupbyyearsearchcours()
                             ->where('course_id','=',$querycourse)->get()->toArray();
               $student = array_pluck($student, 'student_count');
            }
            else
            {
              $student = Cache::remember('student', 5, function()
              {
                 return  Student::groupbyyear();
               });
               $student = array_pluck($student, 'student_count');

            }

               $year = Cache::remember('year', 5, function()
              {
                 return  Student::yearname()->get()->toArray();
               });
              $year = array_pluck($year, 'year_count');

    	return view('testing.doughnut.doughnutyear')
    	       ->with('student',json_encode($student,JSON_NUMERIC_CHECK))
              ->with('year',json_encode($year,JSON_NUMERIC_CHECK));

    }

    public function coursesdoughnut(Request $request)
    {

    	$query = $request->year;

    	 if ($query)
            {
            	 $course_wise = Student::groupbycoursesearchyear()
                                        ->where('year_of_admission','=',$query)
                                        ->get()->toArray();
               $course_wise = array_column($course_wise, 'student_count');
            }
            else
            {
              $course_wise = Cache::remember('course_wise', 5, function()
              {
                 return  Student::groupbycourse();
               });
              $course_wise = array_column($course_wise, 'student_count');

            }

             $course_name = Cache::remember('course_name', 5, function()
              {
                 return  Course::coursename();
               });
            $course_name = array_column($course_name, 'course');


    	return view('testing.doughnut.doughnutcourse')
    	  ->with('course_name',json_encode($course_name,JSON_NUMERIC_CHECK))
          ->with('course_wise',json_encode($course_wise,JSON_NUMERIC_CHECK));
    }


    public function yearpolar(Request $request)
    {
         $querycourse = $request->course;

    	if ($querycourse)
            {
            	 $student = Student::groupbyyearsearchcours()
                             ->where('course_id','=',$querycourse)->get()->toArray();
               $student = array_pluck($student, 'student_count');
            }
            else
            {
              $student = Cache::remember('student', 5, function()
              {
                 return  Student::groupbyyear();
               });
               $student = array_pluck($student, 'student_count');

            }

              $year = Cache::remember('year', 5, function()
              {
                 return  Student::yearname()->get()->toArray();
               });
              $year = array_pluck($year, 'year_count');


    	return view('testing.polar.polaryear')
    	       ->with('student',json_encode($student,JSON_NUMERIC_CHECK))
              ->with('year',json_encode($year,JSON_NUMERIC_CHECK));
    }

    public function coursespolar(Request $request)
    {
    	$query = $request->year;

    	 if ($query)
            {
            	 $course_wise = Student::groupbycoursesearchyear()
                                        ->where('year_of_admission','=',$query)
                                        ->get()->toArray();
               $course_wise = array_column($course_wise, 'student_count');
            }
            else
            {
              $course_wise = Cache::remember('course_wise', 5, function()
              {
                 return  Student::groupbycourse();
               });
               $course_wise = array_column($course_wise, 'student_count');

            }

               $course_name = Cache::remember('course_name', 5, function()
              {
                 return  Course::coursename();
               });
               $course_name = array_column($course_name, 'course');

    	return view('testing.polar.polarcourse')
    	  ->with('course_name',json_encode($course_name,JSON_NUMERIC_CHECK))
          ->with('course_wise',json_encode($course_wise,JSON_NUMERIC_CHECK));
    }
}
