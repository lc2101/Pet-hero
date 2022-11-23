<?php

namespace Models;

class Reservation{
    private $id;
    private $idWatcher;
    private $idPet;
    private $idOwner;
    private $firstDay;
    private $lastDay;
    private $state;
    

    public function __construct($id=0, $idWatcher, $idPet, $idOwner, $firstDay,
     $lastDay, $state=false)
    {
        $this->id = $id;
        $this->idWatcher = $idWatcher;
        $this->idPet = $idPet;
        $this->idOwner = $idOwner;
        $this->firstDay = $firstDay;
        $this->lastDay = $lastDay;
        $this->state = $state;
        
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
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of lastDay
     */ 
    public function getLastDay()
    {
        return $this->lastDay;
    }

    /**
     * Set the value of lastDay
     *
     * @return  self
     */ 
    public function setLastDay($lastDay)
    {
        $this->lastDay = $lastDay;

        return $this;
    }

    /**
     * Get the value of firstDay
     */ 
    public function getFirstDay()
    {
        return $this->firstDay;
    }

    /**
     * Set the value of firstDay
     *
     * @return  self
     */ 
    public function setFirstDay($firstDay)
    {
        $this->firstDay = $firstDay;

        return $this;
    }

    /**
     * Get the value of idOwner
     */ 
    public function getIdOwner()
    {
        return $this->idOwner;
    }

    /**
     * Set the value of idOwner
     *
     * @return  self
     */ 
    public function setIdOwner($idOwner)
    {
        $this->idOwner = $idOwner;

        return $this;
    }

    /**
     * Get the value of idPet
     */ 
    public function getIdPet()
    {
        return $this->idPet;
    }

    /**
     * Set the value of idPet
     *
     * @return  self
     */ 
    public function setIdPet($idPet)
    {
        $this->idPet = $idPet;

        return $this;
    }

    /**
     * Get the value of idWatcher
     */ 
    public function getIdWatcher()
    {
        return $this->idWatcher;
    }

    /**
     * Set the value of idWatcher
     *
     * @return  self
     */ 
    public function setIdWatcher($idWatcher)
    {
        $this->idWatcher = $idWatcher;

        return $this;
    }
}
?>