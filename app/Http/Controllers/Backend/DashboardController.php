<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class DashboardController extends Controller
{

    public function  index () {
        try {
            DB::beginTransaction();
            DB::commit();
            return view('backend.dashboard.dashboard') ;

        }catch (Exception $errors) {
            DB::rollBack();
            return redirect()->route('404') ;
        }

    }
}
