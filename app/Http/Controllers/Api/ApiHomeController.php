<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;

class ApiHomeController extends Controller
{
   public function index()
    {
        
               $user = Student::where('status',1)->with('city','courses')->get();

               return $user;
    }
}
