<?php 

namespace App\Models;

//Product Class
class UserModel implements \JsonSerializable
{
    
    private $id;
    private $username;
    private $password;
    
    
    
    
    
    public function __construct($id, $username, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        
    }
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
        
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    

    
}











?>