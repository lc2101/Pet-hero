<?php

namespace Controllers;

use DAO\PetDAO as PetDAO;
use Models\Pet as Pet;
use \Exception as Exception;


class PetController
{
    public function OwnerPetList()
    {
        if (isset($_SESSION['id']))
        {
            $petDAO = new PetDAO();
        
            try{
            
            $petList = $petDAO->GetByOwnerId($_SESSION['id']);
            
            require_once VIEWS_PATH."ownerPetList.php";
            }catch(Exception $ex){
             
            throw $ex;
            }
        }
    
    }
    public function Register($name, $age, $specie, $size)
    {
       
        try {
            
        $pet = new Pet();
        $pet->setName($name);
        $pet->setOwner_id(isset($_SESSION['id']));
        
        $pet->setAge($age);
        $pet->setSpecie($specie);
        $pet->setSize($size);          
        

        $petDAO = new PetDAO();
        
        $petDAO->Add($pet);
        
        }catch (Exception $th) {
            
            throw $th;
        }
        $petList = $petDAO->GetByOwnerId($_SESSION['id']);
        require_once VIEWS_PATH."ownerPetList.php";
       
        
    }



}



?>