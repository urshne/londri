<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TryController extends Controller
{
    public function index(){
        return view('Try.tryout');
    }
}
