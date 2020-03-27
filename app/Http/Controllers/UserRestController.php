<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Services\Business\SecurityService;
use App\Services\Utility\MyLogger2;
use App\Models\DTO;

class UserRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //Call Service to get all users
            $service = new SecurityService();
            $users = $service->getAllUsers();
            
            //Create DTO
            $dto = new DTO(0, "OK", $users);
            
            //Serialize the DTO to JSON
            $json = json_encode($dto);
            
            //Return JSON back to caller
            return $json;
        } catch (Exception $e1) {
            
            //Log Exception
            MyLogger2::error("Exception: ", array("message" => $e1->getMessage()));
            
            //Return an error back to the user in the DTO
            $dto = new DTO(-2, $e1->getMessage(), "");
            return json_encode($dto);
        }
        
        
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        try {
            //Call Service to get all users
            $service = new SecurityService();
            $user = $service->getUser($id);
            
            //Create DTO
            $dto = new DTO(0, "OK", $user);
            
            //Serialize the DTO to JSON
            $json = json_encode($dto);
            
            //Return JSON back to caller
            return $json;
        } catch (Exception $e1) {
            
            //Log Exception
            MyLogger2::error("Exception: ", array("message" => $e1->getMessage()));
            
            //Return an error back to the user in the DTO
            $dto = new DTO(-2, $e1->getMessage(), "");
            return json_encode($dto);
        }
        
        
        
        
    }

    
}
