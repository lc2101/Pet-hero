<?php
    namespace Controllers;
    use Models\Watcher as Watcher;
    use Models\Owner as Owner;
    use Models\Pet as Pet;
    use DAO\OwnerDAO as OwnerDAO;
    use DAO\WatcherDAO as WatcherDAO;
    use Exception;

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
                
                if(($ownerI==NULL) && ($watcherI==NULL))
                {
                    
                    header("location: " . FRONT_ROOT . "View/ShowLogin");
                    
                }else{
                    
                   if($ownerI->getPassword() === $password)
                    {
                        
                        session_start();
                        $_SESSION['id']=$ownerI->getId();
                        header("location: " . FRONT_ROOT . "Owner/HomeOwner");
                    }elseif($watcherI->getPassword()===$password)
                    {
                        session_start();
                        $_SESSION["id"]=$watcherI->getId();
                        header("location: " . FRONT_ROOT . "");
                    }
                }
            }   catch(Exception $e){
                
                throw $e;
                
                //header("location: " . FRONT_ROOT . "Home/ShowLogin"); 
            }
            






            }
        public function LogOut()
        {
        session_start();
        if ($_SESSION['id']) {
            session_destroy();
            return header("location: " . FRONT_ROOT . "View/ShowLogin");
        }
        }

        }
            
    
    
?>