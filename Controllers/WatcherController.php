<?php
namespace Controllers;

use Models\Watcher as Watcher;
// use JDAO\WatcherDAO as WatcherDAO;
use DAO\WatcherDAO as WatcherDAO;
use DAO\OwnerDAO as OwnerDAO;
use \Exception as Exception;

class WatcherController 
{
    public function HomeWatcher()
    {    
        
        
        if (isset($_SESSION['id']))
        {
            
           $watcherDAO = new WatcherDAO();
                       
            try {
                $watcher=$watcherDAO->getById($_SESSION['id']);
                require_once(VIEWS_PATH."homeWatcher.php");
            
            } catch (Exception $ex) {
                
                throw $ex;
            }
             
        }else
            {
            header("location: " . FRONT_ROOT . "View/ShowLogin");
            }     
           
              
    }
    public function EditWatcher()
    {    
        
        
        if (isset($_SESSION['id']))
        {
            
           $watcherDAO = new WatcherDAO();
                       
            try {
                $watcher=$watcherDAO->getById($_SESSION['id']);
                require_once(VIEWS_PATH."edit-watcher.php");
            
            } catch (Exception $ex) {
                
                echo $ex->getMessage();
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
        $watcher = new Watcher($name, $lastName, $birthDay, $email, $dni, $password);        
        $watcherDAO = new WatcherDAO();
        $watcherDAO->Add($watcher);
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
    require_once(VIEWS_PATH . "watcher-signin.php");
}
       
        
    }
    public function WatcherList()
    {
        if (isset($_SESSION['id']))
        {
            $watcherDAO = new WatcherDAO();
        
            try{
            
            $watcherList=$watcherDAO->GetAll();
            
            require_once(VIEWS_PATH."watcher-list.php");
            }catch(Exception $ex){
             
            throw $ex;
            }
        }else{
            require_once FRONT_ROOT. "View/ShowLogIn";
        }
    }
    public function Edit($name, $lastName, $birthDay, $email, $dni, $password,
     $petType, $expectedPay, $sizecare,$firstDay, $lastDay)
    {
        if (isset($_SESSION['id']))
        {
            
            $watcherDAO = new WatcherDAO();
            
            try{
                
            $watcher=$watcherDAO->getById($_SESSION['id']);
            $watcherE=new Watcher($name, $lastName, $birthDay, $email, $dni, $password,
            $watcher->getId(), $petType, $expectedPay, $watcher->getReputation(),
            $sizecare,$firstDay, $lastDay);
            $watcherDAO->Edit($watcherE);                
            header("location: " .FRONT_ROOT . "Watcher/EditWatcher");
            }catch(Exception $ex){
                
                echo $ex->getMessage();
             }   
            

        }else{
                require_once FRONT_ROOT. "View/ShowLogIn";
        }
    }
    public function FilterByDates($first="", $last="")
    {
        if (isset($_SESSION['id']))
        {
            $watcherDAO = new WatcherDAO();
        
            try{
            if($first!=NULL && $last!=NULL)
            {
               $watcherList=$watcherDAO->FilterByDates($first, $last); 
            }else{
                $watcherList=$watcherDAO->GetAll();
            }
            
            
            require_once(VIEWS_PATH."watcher-list.php");
            }catch(Exception $ex){
             
            throw $ex;
            }
        }else{
            require_once FRONT_ROOT. "View/ShowLogIn";
        }
    }
    





}
