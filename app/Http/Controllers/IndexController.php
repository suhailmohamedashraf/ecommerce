<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
}
