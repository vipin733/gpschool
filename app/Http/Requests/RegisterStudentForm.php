<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Student;
//use Auth;



class RegisterStudentForm extends FormRequest
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
            'student_name'      => 'required',
            'course'            => 'required',
            'created_course'    => 'required',
            'date_of_admission' => 'required|date_format:d/m/Y',
            'asession'          => 'required|integer',
            'status'            => 'required|boolean',
            'reg_no'            => 'required|unique:students',
            'father_name'       => 'required',
            'mother_name'       => 'required',
            'date_of_birth'     => 'required|date_format:d/m/Y',
            'gender'            => 'required|boolean',
            'emer_no'           => 'required|digits:10',
            'father_no'         => 'nullable|digits:10',
            'father_email'      => 'nullable|email',
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
            'religion'          => 'nullable',
            'castec'            => 'nullable',
            'occupation'        => 'nullable',
            'caste'             => 'nullable'
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


        $create = Student::create([

            'student_name'        => $this->student_name,
            'course_id'           => $this->course,
            'created_course_id'   => $this->created_course,
            'created_asession_id' => $this->asession,
            'date_of_admission'   => $this->date_of_admission,
            'last_school'         => $this->last_school,
            'gender'              => $this->gender,
            'reg_no'              => $this->reg_no,
            'status'              => $this->status,
            'father_name'         => $this->father_name,
            'mother_name'         => $this->mother_name,
            'date_of_birth'       => $this->date_of_birth,
            'emer_no'             => $this->emer_no,
            'father_no'           => $this->father_no,
            'father_email'        => $this->father_email,
            'address'             => $this->address,
            'city_id'             => $this->district,
            'state_id'            => $this->state,
            'zip_pin'             => $this->zip_pin,
            'address1'            => $this->address1,
            'ccity_id'            => $this->district1,
            'cstate_id'           => $this->state1,
            'zip_pin1'            => $this->zip_pin1,
            'transportation'      => $this->transportation,
            'stopage_id'          => $stopage,
            'religion'            => $this->religion,
            'castec'              => $this->castec,
            'caste'               => $this->caste,
            'occupation'          =>$this->occupation,

            ]);
         $regnoo = $this->reg_no;

      flash()->success('Successfully Student Created and your Reg No. is '. $regnoo);

    }


}
