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
        }else{
            require_once FRONT_ROOT. "View/ShowLogIn";
        }
    
    }
    public function Register($name, $age, $specie, $size)
    {
        
        try {
            
        $pet = new Pet($name,($_SESSION['id']), $age, $specie, $size);
               
        

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
