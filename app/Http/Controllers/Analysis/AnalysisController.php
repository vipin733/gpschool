<?php

namespace App\Http\Controllers\Analysis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Teacher;
use App\Course;
use Cache;


class AnalysisController extends Controller
{

  public function __construct()
    {

        $this->middleware('auth');
    }


	public function AnalysisBar()
    {
                $female = Cache::remember('female', 5, function()
              {
                 return Student::groupbyyearfemale();
               });

               $female = array_pluck($female, 'female_count');

              $female_course = Cache::remember('female_course', 5, function() 
              {
                 return Student::groupbycoursefemale();
               });
              $female_course = array_pluck($female_course, 'female_count');


              $male_course = Cache::remember('male_course',5, function()
              {
                 return  Student::groupbycoursemale();
               });
              $male_course = array_pluck($male_course, 'male_count');

                $male = Cache::remember('male', 5, function()
                {
                  return  Student::groupbyyearmale();
                 });
                $male = array_pluck($male, 'male_count');

                $student = Cache::remember('student', 5, function()
                {
                    return  Student::groupbyyear();
                 });
                $student = array_pluck($student, 'student_count');

                $year = Cache::remember('year', 5, function()
                {
                    return  Student::yearname()->get()->toArray();

                 });
                $year = array_pluck($year, 'year_count');

                $course_wise = Cache::remember('course_wise', 5, function()
                {
                    return  Student::groupbycourse();

                 });
                 $course_wise = array_column($course_wise, 'student_count');

                $course_name = Cache::remember('course_name', 5, function()
                {
                    return  Course::coursename();

                 });
                 $course_name = array_column($course_name, 'course');


       $students = Cache::remember('students', 5, function()
       {
           return Student::count();
        });

       $teachers = Cache::remember('teachers', 5, function()
       {
           return Teacher::count();
        });

        return view('analysis.bar.analysis_bar', compact('students','teachers'))
              ->with('female',json_encode($female,JSON_NUMERIC_CHECK))
              ->with('male',json_encode($male,JSON_NUMERIC_CHECK))
              ->with('student',json_encode($student,JSON_NUMERIC_CHECK))
              ->with('year',json_encode($year,JSON_NUMERIC_CHECK))
              ->with('course_name',json_encode($course_name,JSON_NUMERIC_CHECK))
              ->with('female_course',json_encode($female_course,JSON_NUMERIC_CHECK))
              ->with('male_course',json_encode($male_course,JSON_NUMERIC_CHECK))
              ->with('course_wise',json_encode($course_wise,JSON_NUMERIC_CHECK));
    }

    public function AnalysisLine()
    {
             $female = Cache::remember('female', 5, function()
              {
                 return Student::groupbyyearfemale();
               });

               $female = array_pluck($female, 'female_count');

              $female_course = Cache::remember('female_course', 5, function()
              {
                 return Student::groupbycoursefemale();
               });
              $female_course = array_pluck($female_course, 'female_count');


              $male_course = Cache::remember('male_course', 5, function()
              {
                 return  Student::groupbycoursemale();
               });
              $male_course = array_pluck($male_course, 'male_count');

                $male = Cache::remember('male', 5, function()
                {
                  return  Student::groupbyyearmale();
                 });
                $male = array_pluck($male, 'male_count');

                $student = Cache::remember('student', 5, function()
                {
                    return  Student::groupbyyear();
                 });
                $student = array_pluck($student, 'student_count');

                $year = Cache::remember('year', 5, function()
                {
                    return  Student::yearname()->get()->toArray();

                 });
                $year = array_pluck($year, 'year_count');

                $course_wise = Cache::remember('course_wise', 5, function()
                {
                    return  Student::groupbycourse();

                 });
                 $course_wise = array_column($course_wise, 'student_count');

                $course_name = Cache::remember('course_name', 5, function()
                {
                    return  Course::coursename();

                 });
                 $course_name = array_column($course_name, 'course');


       $students = Cache::remember('students', 5, function()
       {
           return Student::count();
        });

       $teachers = Cache::remember('teachers', 5, function()
       {
           return Teacher::count();
        });

        return view('analysis.line.analysis_line', compact('students','teachers'))
              ->with('female',json_encode($female,JSON_NUMERIC_CHECK))
              ->with('male',json_encode($male,JSON_NUMERIC_CHECK))
              ->with('student',json_encode($student,JSON_NUMERIC_CHECK))
              ->with('year',json_encode($year,JSON_NUMERIC_CHECK))
              ->with('course_name',json_encode($course_name,JSON_NUMERIC_CHECK))
              ->with('female_course',json_encode($female_course,JSON_NUMERIC_CHECK))
              ->with('male_course',json_encode($male_course,JSON_NUMERIC_CHECK))
              ->with('course_wise',json_encode($course_wise,JSON_NUMERIC_CHECK));
    }

    public function AnalysisRadar()
    {

             $female = Cache::remember('female', 5, function()
              {
                 return Student::groupbyyearfemale();
               });

               $female = array_pluck($female, 'female_count');

              $female_course = Cache::remember('female_course', 5, function()
              {
                 return Student::groupbycoursefemale();
               });
              $female_course = array_pluck($female_course, 'female_count');


              $male_course = Cache::remember('male_course', 5, function()
              {
                 return  Student::groupbycoursemale();
               });
              $male_course = array_pluck($male_course, 'male_count');

                $male = Cache::remember('male', 5, function()
                {
                  return  Student::groupbyyearmale();
                 });
                $male = array_pluck($male, 'male_count');

                $student = Cache::remember('student', 5, function()
                {
                    return  Student::groupbyyear();
                 });
                $student = array_pluck($student, 'student_count');

                $year = Cache::remember('year', 5, function()
                {
                    return  Student::yearname()->get()->toArray();

                 });
                $year = array_pluck($year, 'year_count');

                $course_wise = Cache::remember('course_wise', 5, function()
                {
                    return  Student::groupbycourse();

                 });
                 $course_wise = array_column($course_wise, 'student_count');

                $course_name = Cache::remember('course_name', 5, function()
                {
                    return  Course::coursename();

                 });
                 $course_name = array_column($course_name, 'course');


       $students = Cache::remember('students', 5, function()
       {
           return Student::count();
        });

       $teachers = Cache::remember('teachers', 5, function()
       {
           return Teacher::count();
        });

        return view('analysis.radar.analysis_radar', compact('students','teachers'))
              ->with('female',json_encode($female,JSON_NUMERIC_CHECK))
              ->with('male',json_encode($male,JSON_NUMERIC_CHECK))
              ->with('student',json_encode($student,JSON_NUMERIC_CHECK))
              ->with('year',json_encode($year,JSON_NUMERIC_CHECK))
              ->with('course_name',json_encode($course_name,JSON_NUMERIC_CHECK))
              ->with('female_course',json_encode($female_course,JSON_NUMERIC_CHECK))
              ->with('male_course',json_encode($male_course,JSON_NUMERIC_CHECK))
              ->with('course_wise',json_encode($course_wise,JSON_NUMERIC_CHECK));
    }

    public function AnalysisPolar()
    {
                $female = Cache::remember('female', 5, function()
              {
                 return Student::groupbyyearfemale();
               });

               $female = array_pluck($female, 'female_count');

              $female_course = Cache::remember('female_course', 5, function()
              {
                 return Student::groupbycoursefemale();
               });
              $female_course = array_pluck($female_course, 'female_count');


              $male_course = Cache::remember('male_course', 5, function()
              {
                 return  Student::groupbycoursemale();
               });
              $male_course = array_pluck($male_course, 'male_count');

                $male = Cache::remember('male', 5, function()
                {
                  return  Student::groupbyyearmale();
                 });
                $male = array_pluck($male, 'male_count');

                $student = Cache::remember('student', 5, function()
                {
                    return  Student::groupbyyear();
                 });
                $student = array_pluck($student, 'student_count');

                $year = Cache::remember('year', 5, function()
                {
                    return  Student::yearname()->get()->toArray();

                 });
                $year = array_pluck($year, 'year_count');

                $course_wise = Cache::remember('course_wise', 5, function()
                {
                    return  Student::groupbycourse();

                 });
                 $course_wise = array_column($course_wise, 'student_count');

                $course_name = Cache::remember('course_name', 5, function()
                {
                    return  Course::coursename();

                 });
                 $course_name = array_column($course_name, 'course');


       $students = Cache::remember('students', 5, function()
       {
           return Student::count();
        });

       $teachers = Cache::remember('teachers', 5, function()
       {
           return Teacher::count();
        });


        return view('analysis.polar.analysis_polar', compact('students','teachers'))
              ->with('female',json_encode($female,JSON_NUMERIC_CHECK))
              ->with('male',json_encode($male,JSON_NUMERIC_CHECK))
              ->with('student',json_encode($student,JSON_NUMERIC_CHECK))
              ->with('year',json_encode($year,JSON_NUMERIC_CHECK))
              ->with('course_name',json_encode($course_name,JSON_NUMERIC_CHECK))
              ->with('female_course',json_encode($female_course,JSON_NUMERIC_CHECK))
              ->with('male_course',json_encode($male_course,JSON_NUMERIC_CHECK))
              ->with('course_wise',json_encode($course_wise,JSON_NUMERIC_CHECK));
    }

    public function AnalysisPie()
    {
               $female = Cache::remember('female', 5, function()
              {
                 return Student::groupbyyearfemale();
               });

               $female = array_pluck($female, 'female_count');

              $female_course = Cache::remember('female_course', 5, function()
              {
                 return Student::groupbycoursefemale();
               });
              $female_course = array_pluck($female_course, 'female_count');


              $male_course = Cache::remember('male_course', 5, function()
              {
                 return  Student::groupbycoursemale();
               });
              $male_course = array_pluck($male_course, 'male_count');

                $male = Cache::remember('male', 5, function()
                {
                  return  Student::groupbyyearmale();
                 });
                $male = array_pluck($male, 'male_count');

                $student = Cache::remember('student', 5, function()
                {
                    return  Student::groupbyyear();
                 });
                $student = array_pluck($student, 'student_count');

                $year = Cache::remember('year', 5, function()
                {
                    return  Student::yearname()->get()->toArray();

                 });
                $year = array_pluck($year, 'year_count');

                $course_wise = Cache::remember('course_wise', 5, function()
                {
                    return  Student::groupbycourse();

                 });
                 $course_wise = array_column($course_wise, 'student_count');

                $course_name = Cache::remember('course_name', 5, function()
                {
                    return  Course::coursename();

                 });
                 $course_name = array_column($course_name, 'course');


       $students = Cache::remember('students', 5, function()
       {
           return Student::count();
        });

       $teachers = Cache::remember('teachers', 5, function()
       {
           return Teacher::count();
        });


        return view('analysis.pie.analysis_pie', compact('students','teachers'))
              ->with('female',json_encode($female,JSON_NUMERIC_CHECK))
              ->with('male',json_encode($male,JSON_NUMERIC_CHECK))
              ->with('student',json_encode($student,JSON_NUMERIC_CHECK))
              ->with('year',json_encode($year,JSON_NUMERIC_CHECK))
              ->with('course_name',json_encode($course_name,JSON_NUMERIC_CHECK))
              ->with('female_course',json_encode($female_course,JSON_NUMERIC_CHECK))
              ->with('male_course',json_encode($male_course,JSON_NUMERIC_CHECK))
              ->with('course_wise',json_encode($course_wise,JSON_NUMERIC_CHECK));
    }

    public function AnalysisDoughnut()
    {
               $female = Cache::remember('female', 5, function()
              {
                 return Student::groupbyyearfemale();
               });

               $female = array_pluck($female, 'female_count');

              $female_course = Cache::remember('female_course', 5, function()
              {
                 return Student::groupbycoursefemale();
               });
              $female_course = array_pluck($female_course, 'female_count');


              $male_course = Cache::remember('male_course', 5, function()
              {
                 return  Student::groupbycoursemale();
               });
              $male_course = array_pluck($male_course, 'male_count');

                $male = Cache::remember('male', 5, function()
                {
                  return  Student::groupbyyearmale();
                 });
                $male = array_pluck($male, 'male_count');

                $student = Cache::remember('student', 5, function()
                {
                    return  Student::groupbyyear();
                 });
                $student = array_pluck($student, 'student_count');

                $year = Cache::remember('year', 5, function()
                {
                    return  Student::yearname()->get()->toArray();

                 });
                $year = array_pluck($year, 'year_count');

                $course_wise = Cache::remember('course_wise', 5, function()
                {
                    return  Student::groupbycourse();

                 });
                 $course_wise = array_column($course_wise, 'student_count');

                $course_name = Cache::remember('course_name', 5, function()
                {
                    return  Course::coursename();

                 });
                 $course_name = array_column($course_name, 'course');


       $students = Cache::remember('students', 5, function()
       {
           return Student::count();
        });

       $teachers = Cache::remember('teachers', 5, function()
       {
           return Teacher::count();
        });


        return view('analysis.doughnut.analysis_doughnut', compact('students','teachers'))
              ->with('female',json_encode($female,JSON_NUMERIC_CHECK))
              ->with('male',json_encode($male,JSON_NUMERIC_CHECK))
              ->with('student',json_encode($student,JSON_NUMERIC_CHECK))
              ->with('year',json_encode($year,JSON_NUMERIC_CHECK))
              ->with('course_name',json_encode($course_name,JSON_NUMERIC_CHECK))
              ->with('female_course',json_encode($female_course,JSON_NUMERIC_CHECK))
              ->with('male_course',json_encode($male_course,JSON_NUMERIC_CHECK))
              ->with('course_wise',json_encode($course_wise,JSON_NUMERIC_CHECK));
    }
}
