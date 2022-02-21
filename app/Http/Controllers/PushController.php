<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PushController extends Controller
{
    public function user_first(){
        return view('user_first');

    }
    public function user_second(){
        return view('user_second');
    }
}
