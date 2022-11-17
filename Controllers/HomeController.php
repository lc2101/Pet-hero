<?php
    namespace Controllers;
    use Models\Watcher as Watcher;
    use Models\Owner as Owner;
    use Models\Pet as Pet;
    use JDAO\OwnerDAO as OwnerDAO;
    use JDAO\WatcherDAO as WatcherDAO;
    use \Exception as Exception;

    class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."LogIn.php");
        }   
        
        
        public function LogIn ($email , $password){
            
            session_destroy();
            try {
                
                $ownerdao= new OwnerDAO();
                $ownerI=$ownerdao->GetByEmail($email);
                
                
                $watcherdao= new WatcherDAO();
                $watcherI=$watcherdao->GetByEmail($email);
                
                if(($ownerI!=NULL) && ($ownerI->getPassword() === $password))
                {
                    
                    session_start();
                    $_SESSION['id']=$ownerI->getId();
                    header("location: " . FRONT_ROOT . "Owner/HomeOwner");
                    
                    
                }elseif(($watcherI!=NULL) && ($watcherI->getPassword() === $password))
                {
                    
                               
                    session_start();
                    $_SESSION["id"]=$watcherI->getId();                    
                    header("location: " . FRONT_ROOT . "Watcher/HomeWatcher");
                    
                    
                }else{
                    throw new Exception("Usuario o email incorrecto");
                }
                
            }catch(Exception $e){
                
                $alert = [
                    "type" => "danger",
                    "text" => $e->getMessage()
                ];
                require_once(VIEWS_PATH . "LogIn.php");
                
                
               
            }
            






            }
        public function LogOut()
        {
            session_destroy();
            // session_start();           
            // if ($_SESSION['id']) {
            // session_destroy();
            
            // }
            return header("location: " . FRONT_ROOT . "View/ShowLogin");
        }

    }
            
    
    
?>