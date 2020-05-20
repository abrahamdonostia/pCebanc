<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function logear(){
        $name = Input::get('name', 'defaultValue');
        info($name);
       
        return view('login')
        ->with('name', $name);
        
    }

    public function login(){
        return view('login');
    }
}
