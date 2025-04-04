<?php

namespace App\Services\Bo\User\Get;

class GetUserBo
{
    public ?string $name = null;
    public ?string $email = null;

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
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
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function toArray(){
        $collection = [];
        if(isset($this->name)){ $collection['name'] = $this->name;}
        if(isset($this->email)){ $collection['email'] = $this->email;}
        return $collection;
    }
}
