<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStudentForm;
use App\Http\Requests\UpdateStudentForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Student;
use Carbon\Carbon;

//use Auth;

class StudentsController extends Controller
{
     public function __construct()
    {

        $this->middleware('auth');
    }

    public function create()
    {
    	$characters = 'NCP';
      $year = Carbon::now()->year;
      $regno = $characters.$year. mt_rand(10000, 99999);

    	return view('students.create.create_students',compact('regno'));
    }

    public function Store(RegisterStudentForm $form)
    {

      $regnoo = $form->reg_no;

      $form->storing();

      //return back();
      return redirect()->to('/student/' . $regnoo.'/registration_fee/take');
    }

  

    public function show($reg_no = null)
    {
        $student = Student::where('reg_no', $reg_no)->with('courses','states','city','ccity','sstates','transportfeecollections','asessions','created_courses','stopages')->first();

        return view('students.profile.student_profile',compact('student'));
    }

    public function edit($reg_no = null)
    {
        $s = Student::where('reg_no',$reg_no)->with('courses','states','city','ccity','sstates','asessions','created_courses','stopages')->first();

        return view('students.edit.edit_students',compact('s'));
    }

    public function update(UpdateStudentForm $form)
    {
          $regnoo = $form->reg_no;

          $form->storing();

         return redirect()->to('/student/' . $regnoo);
    }

    public function update_avatar(Request $request, Student $s)
    {
         $this->validate($request,[

            'avatar' => 'required|image|max:10240',

        ]);

         if ($s->avatar)
         {
              $path= 'public/image/';
              

             $delete = Storage::delete($path . $s->avatar);
         }

        if ($request->hasFile('avatar'))
         {
            $avatar = $request->file('avatar');
            $filename = $s->reg_no.'-'. time() . '.' . $avatar->getClientOriginalExtension();
               Image::make($avatar)->resize(300,300)->save(public_path('image/'.$filename));

               $s->avatar = $filename;

              $s->update();
        }
          flash()->success('Successfully Profile Pic. Updated');

          return back();
    }

}

