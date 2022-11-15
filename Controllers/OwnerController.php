<?php
namespace Controllers;

use Models\Owner as Owner;
use DAO\OwnerDAO as OwnerDAO;
use Exception;

class OwnerController 
{
    public function HomeOwner()
    {    
        $owner_DAO = new OwnerDAO();
       

        $owner = $owner_DAO->GetById($_SESSION['id']);

        require_once (VIEWS_PATH . "mainOwner.php");          
    }
    public function Register($name, $lastName, $email, $password, $dni, $birthDay)
    {
       
        try {
        $owner = new Owner();
        $owner->setName($name);
        $owner->setLastName($lastName);
        $owner->setBirthDay($birthDay);
        $owner->setEmail($email);
        $owner->setDni($dni);          
        $owner->setPassword($password);

        $ownerDAO = new OwnerDAO();
        $ownerDAO->Add($owner);
        }catch (Exception $th) {
            throw $th;
        }
        require_once(VIEWS_PATH . "LogIn.php");
       
        
    }
    





}








?>