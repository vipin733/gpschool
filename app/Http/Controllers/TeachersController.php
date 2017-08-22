<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterTeacherForm;
use App\Http\Requests\UpdateTeacherForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Teacher;
use Carbon\Carbon;



class TeachersController extends Controller
{
   public function __construct()
    {

        $this->middleware('auth');
    }

    public function create()
    {
    	$characters = 'TNCP';
      $year = Carbon::now()->year;
      $regno = $characters.$year. mt_rand(1000, 9999);

    	return view('teachers.create.create_teacher',compact('regno'));
    }

    public function Store(RegisterTeacherForm $form)
    {
     

          $regnoo = $form->reg_no;

          $form->storing();

         return redirect()->to('/teacher/' . $regnoo);

    }


    public function show($reg_no = null)
    {
        $teacher = Teacher::where('reg_no', $reg_no)->with('states','city','tcity','tstates','stopages')->first();

        return view('teachers.teacher_profile',compact('teacher'));
    }

    public function edit($reg_no = null)
    {
        $t = Teacher::where('reg_no', $reg_no)->with('states','city','tcity','tstates','stopages')->first();
        return view('teachers.edit.edit_teacher',compact('t'));
    }

    public function update(UpdateTeacherForm $form)
    {

         $regnoo = $form->reg_no;

          $form->storing();

         return redirect()->to('/teacher/' . $regnoo);
    }

     public function update_avatar(Request $request)
    {
      $t = Teacher::where('reg_no', $reg_no)->first();
         $this->validate($request,[

            'avatar' => 'required|image|max:10240',

        ]);

         if ($t->avatar)
         {
              $path= 'public/image/';

             $delete = Storage::delete($path . $t->avatar);
         }

        if ($request->hasFile('avatar'))
         {
            $avatar = $request->file('avatar');
            $filename = $t->reg_no.'-'. time() . '.' . $avatar->getClientOriginalExtension();
               Image::make($avatar)->resize(300,300)->save(public_path('image/'.$filename));

               $t->avatar = $filename;

              $t->update();
        }
          flash()->success('Successfully Profile Pic. Updated');

          return back();
    }
}
