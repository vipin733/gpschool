<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthControllerg extends Controller
{
    public function login()
    {
      return view('auth.login');
    }
}