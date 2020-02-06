<?php

namespace App\Services\Business;

use App\Services\Data\SecurityDAO;
use App\Models\UserModel;
use Illuminate\Support\Facades\Log;
use \PDO;

class SecurityService {
    
    public function login(UserModel $user) {
        Log::info("Entering SecurityService.login()");
        
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $port = config("database.connections.mysql.port");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        $db = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $service = new SecurityDAO($db);
        $flag = $service->findByUser($user);
        
        $db = null;
        
        Log::info("Exit SecurityService.login() with " . $flag);
        return $flag;
    }
    
}