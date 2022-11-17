<?php
namespace Controllers;

use Models\Owner as Owner;
use DAO\OwnerDAO as OwnerDAO;
use Exception;

class OwnerController 
{
    public function HomeOwner()
    {    
        
        if (isset($_SESSION['id']))
        {
            $ownerDAO = new OwnerDAO();
            
            try {
            $owner=$ownerDAO->getById($_SESSION['id']);
            
            require_once(VIEWS_PATH."homeOwner.php");
            
            } catch (Exception $ex) {
                
                
                header("location: " . FRONT_ROOT . "View/ShowLogin");
                echo "No se encontro al usuario";
            }
            
        }else
            {
            header("location: " . FRONT_ROOT . "View/ShowLogin");
            }     

              
    }
    public function Register($name, $lastName, $email, $password, $dni, $birthDay)
    {
       
        try {
        $owner = new Owner($name, $lastName, $birthDay, $email, $dni, $password);
       
      
        $ownerDAO = new OwnerDAO();
        $ownerDAO->Add($owner);
        }catch (Exception $th) {
            throw $th;
        }
        require_once(VIEWS_PATH . "LogIn.php");
       
        
    }
    public function Edit()
    {
        
    }
    
    





}








?>