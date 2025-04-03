<?php

namespace App\services\Bo\User\Create;

use Illuminate\Support\Facades\Hash;

class CreateUserBo
{

    public ?string $name = null;
    public ?string $email = null;
    public ?string $password = null;

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = Hash::make($password);// hashing password
        return $this;
    }
    // func to store in array
    public function toArray(){
        $collection = [];
        if(isset($this->name)){
            $collection['name'] = $this->name;
        }
        if(isset($this->email)){
            $collection['email'] = $this->email;
        }
        if(isset($this->password)){
            $collection['password'] = $this->password;
        }
        return $collection;
    }
}
