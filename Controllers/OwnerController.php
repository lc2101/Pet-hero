<?php
namespace Controllers;

use Models\Owner as Owner;
// use JDAO\OwnerDAO as OwnerDAO;
use DAO\OwnerDAO as OwnerDAO;
use DAO\WatcherDAO as WatcherDAO;
use DAO\PetDAO as PetDAO;
use \Exception as Exception;

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
        $ownerDAO = new OwnerDAO();
        $watcherDAO = new WatcherDAO();
        if($ownerDAO->GetByEmail($email)===NULL && $watcherDAO->GetByEmail($email)===NULL)
        {
        try {
        $owner = new Owner($name, $lastName, $birthDay, $email, $dni, $password);
        
      
        
        $ownerDAO->Add($owner);
        }catch (Exception $th) {
            throw $th;
        }
        require_once(VIEWS_PATH . "LogIn.php");
        }else{
            throw new Exception("Ese email ya existe");
            
            
        }
    }catch (Exception $th) {
        $alert = [
            "type" => "danger",
            "text" => $th->getMessage()
        ];
        require_once(VIEWS_PATH . "owner-signin.php");
    }
              
        
    }
    public function EditOwner()
    {    
        
        
        if (isset($_SESSION['id']))
        {
            
           $ownerDAO = new OwnerDAO();
                       
            try {
                $owner=$ownerDAO->getById($_SESSION['id']);
                require_once(VIEWS_PATH."edit-owner.php");
            
            } catch (Exception $ex) {
                
                echo $ex->getMessage();
            }
             
        }else
            {
            header("location: " . FRONT_ROOT . "View/ShowLogin");
            }     
           
              
    }
    public function Edit($name, $lastName, $birthDay, $email, $dni, $password)
    {
        if (isset($_SESSION['id']))
        {
            
            $ownerDAO = new OwnerDAO();
            
            try{
                
            $owner=$ownerDAO->getById($_SESSION['id']);
            $ownerE=new Owner($name, $lastName, $birthDay, $email, $dni, $password, $owner->getId());                
            $ownerDAO->Edit($ownerE); 
            header("location: " .FRONT_ROOT . "Owner/EditOwner");
            }catch(Exception $ex){
                
                echo $ex->getMessage();
             }   
            

        }else{
                require_once FRONT_ROOT. "View/ShowLogIn";
        }
    }
    public function MakeReservation($idW)
        {
        if (isset($_SESSION['id']))       
        {
            $petDAO = new PetDAO();
            $watcherDAO= new WatcherDAO();
            try{
            
            $petList = $petDAO->GetByOwnerId($_SESSION['id']);
            $watcher=$watcherDAO->getById($idW);
            
            require_once(VIEWS_PATH."MakeReservation.php");
            }catch(Exception $ex){
             
            throw $ex;
            }
        }else{
            require_once FRONT_ROOT. "View/ShowLogIn";
        }
    }
    





}








?>