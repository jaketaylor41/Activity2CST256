<?php

namespace App\Http\Controllers;
//Best practice: name your methods properly and clearly (index()
//is pretty bad for a Controller form Post
use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use App\Services\Utility\MyLogger1;

class Login3Controller extends Controller{
    
    public function index(Request $request){
        
        try{
            
            //Best Practice: Centralize your rules so you have a consistent architecture and even resuse your rules
            //Validate the form data (note will automatically redirect back to Login View if errors)
//             $this->validateForm($request);
            
            
            //Get the posted Form Data
            $username = $request->input('username');
            $password = $request->input('password');
            MyLogger1::info(" Parameters: ", array("username"=>$username, "password"=>$password));
            
            $this->validateForm($request);
            
            echo $username;
            echo $password;
            
            
            //Save posted Form Data in User Object Model
            $user = new UserModel(-1, $username, $password);
            
            
            
            //Call Security Business Service
            //Best Practice: pass course grained not fine grained parameters
            $service = new SecurityService();
            $status = $service->authenticate($user);
            
            
            
            //Render a failed or sucess response View and pass the User Model to it
            if($status)
            {
                MyLogger1::info("Exit Login4Controller.index() with login passed");
                
                $data = ['model' => $user];
                
                return view('loginPassed3')->with($data);
                
                
                
            } else {
                MyLogger1::info("Exit Login4Controller.index() with login failed");
                return view('loginFailed3');
            }
            
            
            
        }
        catch (ValidationException $e){
            
            
            //Note: This exception must be caught before Exception because ValidationException extends from Exception
            
            
            throw ($e);
        }
        catch(Exception $e2){
            //Display Global Exception Handler
            return view('SystemException');
            MyLogger1::error("Exception: ", array("message" => $e2->getMessage()));
        }
        
        
        
        
    }
    
    private function validateForm(Request $request)
    {
        //Best practice: Centralize your rules so you have a consistent architecture
        //and even resuse your rules
        //Bad Practice: Not using a defined Data Validation Framework, putting rules
        //all over your code, doing only on Client Side or Database
        //Setup Data Validation Rules for Login Form
        $rules = ['username' => 'Required | Between:4,10 | Alpha',
            'password' => 'Required | Between:4,10'];
        
        //Run data validation rules
        $this->validate($request, $rules);
    }
    
    
}




?>