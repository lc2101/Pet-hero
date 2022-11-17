<?php
namespace Controllers;

use Models\Watcher as Watcher;
use DAO\WatcherDAO as WatcherDAO;
use Exception;

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

    }
    





}
