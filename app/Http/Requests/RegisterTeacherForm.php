<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Teacher;
//use Auth;



class RegisterTeacherForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'teacher_name'      => 'required',
            'date_of_joining'   => 'required|date_format:d/m/Y',
            'type'              => 'required|boolean',
            'status'            => 'required|boolean',
            'reg_no'            => 'required|unique:teachers',
            'father_name'       => 'required',
            'mother_name'       => 'required',
            'date_of_birth'     => 'required|date_format:d/m/Y',
            'gender'            => 'required|boolean',
            'emergency_no'      => 'required|digits:10',
            'mob_no'            => 'required|digits:10',
            'email'             => 'nullable|email',
            'address'           => 'required',
            'district'          => 'required',
            'state'             => 'required',
            'zip_pin'           => 'required|digits:6',
            'address1'          => 'required',
            'district1'         => 'required',
            'state1'            => 'required',
            'zip_pin1'          => 'required|digits:6',
            'transportation'    => 'required|boolean',
            'stopeages'         => 'required_if:transportation,1',
            //'avatar'   => 'required'
        ];
    }

    public function storing()
    {
      if($this->transportation == 1){
            $stopage = $this->stopeages;
        }
            else{

                 $stopage = null;
            }

         $create = new Teacher([

            'teacher_name'      => $this->teacher_name,
            'type'              => $this->type,
            'date_of_joining'   => $this->date_of_joining,
            'reg_no'            => $this->reg_no,
            'last_school'       => $this->last_school,
            'experience'        => $this->experience,
            'gender'            => $this->gender,
            'status'            => $this->status,
            'father_name'       => $this->father_name,
            'mother_name'       => $this->mother_name,
            'date_of_birth'     => $this->date_of_birth,
            'emergency_no'      => $this->emergency_no,
            'mob_no'            => $this->mob_no,
            'email'             => $this->email,
            'address'           => $this->address,
            'city_id'           => $this->district,
            'state_id'          => $this->state,
            'zip_pin'           => $this->zip_pin,
            'address1'          => $this->address1,
            'tcity_id'          => $this->district1,
            'tstate_id'         => $this->state1,
            'tzip_pin'          => $this->zip_pin1,
            'transportation'    => $this->transportation,
            'stopage_id'        => $stopage,

          ]);


          $regg = $this->reg_no;

          flash()->success('Successfully Teacher Created and Reg No. '.$regg);

         $create->save();
    }
}
