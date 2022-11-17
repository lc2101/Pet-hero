<?php
namespace Controllers;

use Models\Watcher as Watcher;
use JDAO\WatcherDAO as WatcherDAO;
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
        $watcher = new Watcher($name, $lastName, $birthDay, $email, $dni, $password);        
        $watcherDAO = new WatcherDAO();
        $watcherDAO->Add($watcher);
        }catch (Exception $th) {
            throw $th;
        }
        require_once(VIEWS_PATH . "LogIn.php");
       
        
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
    public function Edit($name, $lastName, $birthDay, $email, $dni, $password, $petType, $expectedPay, $sizecare)
    {
        if (isset($_SESSION['id']))
        {
            
            $watcherDAO = new WatcherDAO();
            
            try{
                
            $watcher=$watcherDAO->getById($_SESSION['id']);
            $watcherE=new Watcher($name, $lastName, $birthDay, $email, $dni, $password,
            $watcher->getId(), $petType, $expectedPay, $watcher->getReputation(), $sizecare);
            $watcherDAO->Edit($watcherE);                
            require_once(VIEWS_PATH."edit-watcher.php");
            }catch(Exception $ex){
                
                echo $ex->getMessage();
             }   
            

        }else{
                require_once FRONT_ROOT. "View/ShowLogIn";
        }
    }
    





}
