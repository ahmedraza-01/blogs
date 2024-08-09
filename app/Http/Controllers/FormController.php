<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
     
        return view('front.form');
    }
    public function tiny()
    {
     
        return view('front.tiny');
    }
}
