<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsMyNameController extends Controller
{
    
    public function index(Request $request)
    {
        
       //Display the form data
       $firstname = $request->input('firstname');
       $lastname = $request->input('lastname');
       echo "Your name is: " . $firstname . " " . $lastname;
       echo '<br>';
       
       //Render a response View and pass the Form Data to it
       //Associative array 
       $data = ['firstname' => $firstname, 'lastname' => $lastname];
       return view('thatswhoiam')->with($data);
       
        
    }
    
}


