<?php

namespace Controllers;

// use JDAO\PetDAO as PetDAO;
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
    public function EditPet($id)
    {    
        
        
        if (isset($_SESSION['id']))
        {
            
           $petDAO = new PetDAO();
                       
            try {
                $pet=$petDAO->getById($id);
                echo $pet->getName();
                require_once(VIEWS_PATH."edit-pet.php");
            
            } catch (Exception $ex) {
                
                echo $ex->getMessage();
            }
             
        }else
            {
            header("location: " . FRONT_ROOT . "View/ShowLogin");
            }     
           
              
    }
    public function Edit($name, $age, $specie, $size, $id)
    {
        if (isset($_SESSION['id']))
        {
            
            $petDAO = new PetDAO();
            
            try{
                
            $pet=$petDAO->getById($id);
            $petE=new Pet($name, $_SESSION['id'], $age, $specie, $size, $id);                
            $petDAO->Edit($petE); 
            header("location: " .FRONT_ROOT . "Pet/OwnerPetList");
            }catch(Exception $ex){
                
                echo $ex->getMessage();
             }   
            

        }else{
                require_once FRONT_ROOT. "View/ShowLogIn";
        }
    }
    



}



?>
