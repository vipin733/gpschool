<?php

namespace App\Http\Controllers\Analysis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Student;
use App\Course;
use Cache;

class AnalysisLineController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }


    public function yearline(Request $request)
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

    	return view('testing.line.lineyear')
    	       ->with('student',json_encode($student,JSON_NUMERIC_CHECK))
              ->with('year',json_encode($year,JSON_NUMERIC_CHECK));

    }

    public function coursesline(Request $request)
    {
    	$query = $request->year;

        if ($query)
            {
                 $course_wise =Student::groupbycoursesearchyear()
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


        return view('testing.line.linecourse')
          ->with('course_name',json_encode($course_name,JSON_NUMERIC_CHECK))
          ->with('course_wise',json_encode($course_wise,JSON_NUMERIC_CHECK));

    }

    public function combinedcourseline(Request $request)
    {
        $queryyear = $request->year;

        if ($queryyear)
            {
                 $male_course = Student::groupbycoursesearchyearmale()
                                       ->where('year_of_admission','=',$queryyear)
                                       ->get()->toArray();
                 $male_course = array_pluck($male_course, 'male_count');

                 $female_course =Student::groupbycoursesearchyearfemale()
                     ->where('year_of_admission','=',$queryyear)
                     ->get()->toArray();
                 $female_course = array_pluck($female_course, 'female_count');

            }
            else
            {
                $male_course = Cache::remember('male_course', 5, function()
               {
                 return  Student::groupbycoursemale();
               });
                $male_course = array_pluck($male_course, 'male_count');

                $female_course = Cache::remember('female_course', 5, function()
               {
                 return  Student::groupbycoursefemale();
               });
                $female_course = array_pluck($female_course, 'female_count');

            }

               $course_name = Cache::remember('course_name', 5, function()
               {
                 return  Course::coursename();
               });
               $course_name = array_column($course_name, 'course');

             return view('testing.line.linecoursecombined')
               ->with('female_course',json_encode($female_course,JSON_NUMERIC_CHECK))
               ->with('male_course',json_encode($male_course,JSON_NUMERIC_CHECK))
              ->with('course_name',json_encode($course_name,JSON_NUMERIC_CHECK));
    }


    public function combinedyearline(Request $request)
    {
        $querycourse = $request->course;

        if ($querycourse)
            {
                 $female = Student::groupbyyearesearchcoursefemale()
                     ->where('course_id','=',$querycourse)
                     ->get()->toArray();
                $female = array_pluck($female, 'female_count');

                 $male = Student::groupbyyearesearchcoursemale()
                     ->where('course_id','=',$querycourse)
                     ->get()->toArray();
                $male = array_pluck($male, 'male_count');

            }
            else
            {
                $female = Cache::remember('female', 5, function()
               {
                 return  Student::groupbyyearfemale();
               });
                $female = array_pluck($female, 'female_count');

                $male = Cache::remember('male', 5, function()
               {
                 return  Student::groupbyyearmale();
               });
                $male = array_pluck($male, 'male_count');

            }

                $year = Cache::remember('year', 5, function()
               {
                 return  Student::yearname()->get()->toArray();
               });
                $year = array_pluck($year, 'year_count');

                return view('testing.line.lineyearcombined')
               ->with('female',json_encode($female,JSON_NUMERIC_CHECK))
               ->with('male',json_encode($male,JSON_NUMERIC_CHECK))
              ->with('year',json_encode($year,JSON_NUMERIC_CHECK));
    }
}
