<?php
/**
 * Created by PhpStorm.
 * User: evapamfil
 * Date: 26/10/2018
 * Time: 13:55
 */


namespace App\Model;


class User extends Model
{
    protected $email;
    protected $firstName;
    protected $lastName;
    protected $createdAt;
    protected $lastLogin;


    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setFirstName($firstName)
    {
        $this->$firstName = $firstName;
        return $this;
    }
    public function setLastName($lastName)
    {
        $this->$lastName = $lastName;
        return $this;
    }

    public function setCreatedAt($createdAt)
    {
        $this->$createdAt = $createdAt;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getFullName()
    {
        return $this->firstName . $this->lastName;
    }
}


