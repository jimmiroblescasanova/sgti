<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){
        return view('front.index', [
            'courses' => DB::table('courses')
               ->orderBy('created_at', 'DESC')
               ->paginate(9)
        ]);
    }
}
