<?php
namespace App\Services\Data;

use App\Services\Utility\DatabaseException;
use App\Models\UserModel;
use Illuminate\Support\Facades\Log;
use PDO;
use PDOException;

class SecurityDAO{
    private $db = NULL;
    
    public function __construct($db){
        $this->db = $db;
    }
    
    public function findByUser(UserModel $user){
        Log::info("Entering SecurityDAO.findByUser()");
        try {
            
            $name = $user->getUsername();
            $pw = $user->getPassword();
            
            
            $stmt = $this->db->prepare("SELECT ID, USERNAME, PASSWORD FROM USERS WHERE USERNAME = :username AND PASSWORD = :password");
            
            
            $stmt->bindParam(':username', $name);
            $stmt->bindParam(':password', $pw);
            $r = $stmt->execute();
            
            print_r($r);
           
            
            if ($stmt->rowCount() == 1){
                Log::info("Exit SecurityDAO().findByUser() with true");
                return true;
            } else {
                Log::info("Exit SecurityDAO().findByUser() with false");
                return false;
            }
            
        } catch (PDOException $e) {
            Log::error("Exception: ", array("message"  => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
    
    
    public function findByUserID($id){
        Log::info("Entering SecurityDAO.findByUser()");
        try {
            
            
            
            $stmt = $this->db->prepare("SELECT ID, USERNAME, PASSWORD FROM USERS WHERE ID = :id");
            
            
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            
            
            if ($stmt->rowCount() == 0){
               return null;
            } else {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $user = new UserModel($row["ID"], $row["USERNAME"], $row["PASSWORD"]);
                return $user;
            }
            
        } catch (PDOException $e) {
            Log::error("Exception: ", array("message"  => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
    
    
    public function findAllUsers(){
        Log::info("Entering SecurityDAO.findByUser()");
        try {
            
            
            
            $stmt = $this->db->prepare("SELECT ID, USERNAME, PASSWORD FROM USERS");
            $stmt->execute();
            
            
            
            if ($stmt->rowCount() == 0){
                return array();
            } else {
                $index = 0;
                $users = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $user = new UserModel($row["ID"], $row["USERNAME"], $row["PASSWORD"]);
                    $users[$index++] = $user;
                }
                return $users;
            }
            
        } catch (PDOException $e) {
            Log::error("Exception: ", array("message"  => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
    
    

    
    
}