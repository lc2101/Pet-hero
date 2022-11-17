<?php
namespace JDAO;

use DAO\IWatcher as IWatcher;
use Models\Watcher as Watcher;
use \Exception as Exception;
class WatcherDAO implements IWatcher
{
    private $watcherList = array();
    private $fileName= ROOT ."DATA/watchers.json";

    public function Add(Watcher $watcher)
    {
        $this->retrieveData();
        
        array_push($this->watcherList, $watcher);
        $this->saveData();
    }
    public function GetAll()
    {
        $this->retrieveData();
        return $this->watcherList;
    }
    //PHP TO JSON
    private function saveData()
    {
        $arrayToEncode= array();
        foreach($this->watcherList as $Watcher)
        {
            $valuesArray["idwatchers"] = sizeof($arrayToEncode);
            $valuesArray["name"]= $Watcher->getName();
            $valuesArray["lastName"]= $Watcher->getLastName();
            $valuesArray["birthDay"]= $Watcher->getBirthDay();
            $valuesArray["email"]= $Watcher->getEmail();
            $valuesArray["password"]= $Watcher->getPassword();
            $valuesArray["dni"] = $Watcher->getDni();
            $valuesArray["petType"] = $Watcher->getPetType(); 
            $valuesArray["expectedPay"] = $Watcher->getExpectedPay(); 
            $valuesArray["reputation"] = $Watcher->getReputation(); 
            $valuesArray["sizecare"] = $Watcher->getSizecare(); 
           
                       
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
                $Watcher= new Watcher($valuesArray["name"],$valuesArray["lastName"],$valuesArray["birthDay"],$valuesArray["email"],$valuesArray["dni"],$valuesArray["password"],$valuesArray["idwatchers"],
                $valuesArray["petType"],$valuesArray["expectedPay"],$valuesArray["reputation"],$valuesArray["sizecare"]);
                array_push($this->watcherList, $Watcher);
                
            }
            
        }
    }
    public function GetById($id)
     {
        $this->RetrieveData();
        $watcher=NULL;

        foreach($this->watcherList as $Watcher)
        {
            if($Watcher->getId()=== $id)
            {
                $watcher=$Watcher;
            }
        }
        return $watcher;
        
    }
    public function GetByEmail($email)
    {
        $this->RetrieveData();
        
        $watcher=NULL;
        
        foreach($this->watcherList as $Watcher)
        {
            
            if($Watcher->getEmail()=== $email)
            {
                
                $watcher=$Watcher;
            }
        }
        return $watcher;
        
    }
    public function Edit(Watcher $watcherE)
    {
        //$this->RetrieveData();
        
               
        foreach($this->watcherList as $Watcher)
        {
            
           
            if($Watcher->getId() === $watcherE->getId()){
                echo"sadasdassda";
                $Watcher=$watcherE;
            }else{
                throw new Exception("Id No encontrado");
                
            }
        }
        $this->saveData();
        
    }
}



?>