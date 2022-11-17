<?php
namespace Models;
use Models\User as User;

class Watcher extends User
{
    private $petType;//tipo de mascota dispuesta a cuidar, ej: Juan perez, cuidador de loros(petType)
    private $expectedPay;//remuneracion que esperan cobrar (su precio)
    private $reputation;//reputacion del cuidador, indica si es bueno haciendo su trabajo. 
    private $id;
    private $sizecare;
    
    public function __construct($name, $lastName, $birthDay, $email, $dni, $password, $id=0, $petType="", $expectedPay=0, $reputation=0, $sizecare="")
        {
            $this->name=$name;
            $this->lastName=$lastName;
            $this->birthDay=$birthDay;
            $this->email=$email;
            $this->dni=$dni;
            $this->password=$password;
            $this->petType=$petType;
            $this->expectedPay=$expectedPay;
            $this->reputation=$reputation;
            $this->sizecare=$sizecare;
            $this->id=$id;
            
        }
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
     $this->password = $password;
    
        return $this;
    }
    public function getPetType()
    {
        return $this->petType;
    }

    public function setPetType($petType)
    {
        $this->petType = $petType;

        return $this;
    }

    public function getExpectedPay()
    {
        return $this->expectedPay;
    }

    public function setExpectedPay($expectedPay)
    {
        $this->expectedPay = $expectedPay;

        return $this;
    }

    public function getReputation()
    {
        return $this->reputation;
    }

    public function setReputation($reputation)
    {
        $this->reputation = $reputation;

        return $this;
    }
   

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of sizecare
     */ 
    public function getSizecare()
    {
        return $this->sizecare;
    }

    /**
     * Set the value of sizecare
     *
     * @return  self
     */ 
    public function setSizecare($sizecare)
    {
        $this->sizecare = $sizecare;

        return $this;
    }
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

   

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthDay()
    {
        return $this->birthDay;
    }

    public function setBirthDay($birthDay)
    {
        $this->birthDay = $birthDay;

        return $this;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }
}
?>