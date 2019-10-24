<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){
        return view('index', [
            'courses' => DB::table('courses')->paginate(9)
        ]);
    }
}
