<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    //
    public  function  Errors() {
        return view('errors.404') ;
    }
}
