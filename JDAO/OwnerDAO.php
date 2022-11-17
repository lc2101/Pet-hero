<?php
namespace JDAO;

use DAO\IOwner as IOwner;
use Models\Owner as Owner;
class OwnerDAO implements IOwner
{
    private $ownerList = array();
    private $fileName= ROOT ."DATA/owners.json";

    public function Add(Owner $owner)
    {
        $this->retrieveData();
        
        array_push($this->ownerList, $owner);
        $this->saveData();
    }
    public function GetAll()
    {
        $this->retrieveData();
        return $this->ownerList;
    }
    //PHP TO JSON
    private function saveData()
    {
        $arrayToEncode= array();
        foreach($this->ownerList as $Owner)
        {
            $valuesArray["idowners"] = sizeof($arrayToEncode);
            $valuesArray["name"]= $Owner->getName();
            $valuesArray["lastName"]= $Owner->getLastName();
            $valuesArray["birthDay"]= $Owner->getBirthDay();
            $valuesArray["email"]= $Owner->getEmail();
            $valuesArray["password"]= $Owner->getPassword();
            $valuesArray["dni"] = $Owner->getDni(); 
            
                       
            array_push($arrayToEncode, $valuesArray);
        }
        $jsonContent= json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents($this->fileName, $jsonContent);
    }
    //JSON TO PHP
    private function retrieveData()
    {
        $this->ownerList= array();
        if(file_exists($this->fileName))
        {
            $jsonContent= file_get_contents($this->fileName);
            $arrayToDecode= ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach ($arrayToDecode as $valuesArray) {
                $Owner= new Owner($valuesArray["name"],$valuesArray["lastName"],$valuesArray["birthDay"],$valuesArray["email"],$valuesArray["dni"],$valuesArray["password"],$valuesArray["idowners"]);
                array_push($this->ownerList, $Owner);
            }
        }
    }
    public function GetById($id)
     {
        $this->RetrieveData();
        $owner=NULL;

        foreach($this->ownerList as $Owner)
        {
            if($Owner->getId()=== $id)
            {
                $owner=$Owner;
            }
        }
        return $owner;
        
    }
    public function GetByEmail($email)
    {
        $this->RetrieveData();
        
        $owner=NULL;
        
        foreach($this->ownerList as $Owner)
        {
            
            if($Owner->getEmail()=== $email)
            {
                
                $owner=$Owner;
            }
        }
        return $owner;
        
    }
}



?>