<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;



class Login2Controller extends Controller {
    public function loginUser(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        
        
        $user = new UserModel(-1, $username, $password);
        
        
        
        $service = new SecurityService();
        $status = $service->login($user);
        
        if ($status){
            $data = ['model' => $user];
            return view('loginPassed2')->with($data);
        } else {
            return view('loginFailed2');
        }
    }
}
