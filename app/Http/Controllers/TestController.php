<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    
    public function test(){
        return "Hello World from my Test Controller";
    }
    
    public function test2(){
        return view('helloworld');
    }
    
}


