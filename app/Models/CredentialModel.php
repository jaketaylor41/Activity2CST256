<?php

namespace App\model;

Class CredentialModel
{
    private $userName;
    private $password;
    
    function __construct($id, $userName, $password)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->password = $password;
    }
    
    public function jsonSerialize(){
        return get_object_vars($this);
    }
    
    public function getUserName()
    {
        return $this->userName;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    
}

?>