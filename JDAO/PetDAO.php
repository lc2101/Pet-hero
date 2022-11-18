<?php
namespace JDAO;

use Models\Pet as Pet;
use DAO\IPet as IPet;
use \Exception as Exception;
class PetDAO implements IPet
{
    private $petList = array();
    private $fileName= ROOT ."DATA/pets.json";

    public function Add(Pet $pet)
    {
        $this->retrieveData();
        
        array_push($this->petList, $pet);
        $this->saveData();
    }
    public function GetAll()
    {
        $this->retrieveData();
        return $this->petList;
    }
    //PHP TO JSON
    private function saveData()
    {
        $arrayToEncode= array();
        foreach($this->petList as $pet)
        {
                      
            $parameters["idpets"] = sizeof($arrayToEncode);
            $parameters["name"] = $pet->getName();
            $parameters["idowners"] = $pet->getOwner_id();
            $parameters["age"] = $pet->getAge();
            $parameters["specie"] = $pet->getSpecie();
            $parameters["size"] = $pet->getSize();
                       
            array_push($arrayToEncode, $parameters);
        }
        $jsonContent= json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents($this->fileName, $jsonContent);
    }
    //JSON TO PHP
    private function retrieveData()
    {
        $this->petList= array();
        if(file_exists($this->fileName))
        {
            $jsonContent= file_get_contents($this->fileName);
            $arrayToDecode= ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach ($arrayToDecode as $row) {
                $pet = new Pet($row['name'],$row['idowners'],$row['age'],
                $row['specie'],$row['size'],$row['idpets']); 
                array_push($this->petList, $pet);
            }
        }
    }
    public function GetById($id)
     {
        $this->RetrieveData();
        $pet=NULL;

        foreach($this->petList as $Pet)
        {
            if($Pet->getId()=== $id)
            {
                $pet=$pet;
            }
        }
        return $pet;
        
    }
    public function GetByOwnerId($id)
     {
        $this->RetrieveData();
        $petList=array();

        foreach($this->petList as $Pet)
        {
            if($Pet->getOwner_id()=== $id)
            {
                array_push($petList, $Pet);
            }
        }
        return $petList;
        
    }
    public function Edit(Pet $petE)
    {
        
               
        for ($i=0; $i < sizeof($this->petList); $i++) 
        { 
           
        
            
            if($this->petList[$i]->getId()=== $petE->getId())
            {
                
                $this->petList[$i]=$petE;
            }
        }
        $this->saveData();
        $this->RetrieveData();
        
    }
}



?>