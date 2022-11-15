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
            require_once(VIEWS_PATH."entry.php");
        }   
        public function ShowAccountType()
        {
        require_once(VIEWS_PATH . "SignIn.php");
        }
        public function ShowLogIn()
        {
        require_once(VIEWS_PATH . "LogIn.php");
        }
        public function SignInWatcher()
        {
        require_once (VIEWS_PATH."watcher-signin.php");
        }

        public function SignInOwner()
        {
         require_once(VIEWS_PATH."owner-signin.php");
        }
        public function LogIn ($email , $password){
            try {
                $ownerdao= new OwnerDAO();
                $owner=$ownerdao->GetByEmail($email);
                $watcherdao= new WatcherDAO();
                $watcher=$watcherdao->GetByEmail($email);
                if(($owner==NULL || $owner->getPassword()!=$password) && ($watcher==NULL || $watcher->getPassword()!=$password))
                {
                header("location: " . FRONT_ROOT . "Home/ShowLogin"); 
                }else{
                    if($owner->getPassword()==$password)
                    {
                        session_start();
                        $_SESSION['id']=$owner->getId();
                        header("location: " . FRONT_ROOT . "Owner/HomeOwner");
                    }elseif($watcher->getPassword()==$password)
                    {
                        session_start();
                        $_SESSION['id']=$watcher->getId();
                        header("location: " . FRONT_ROOT . "");
                    }
                }
            }   catch(Exception $e){
                throw $e;
                header("location: " . FRONT_ROOT . "Home/ShowLogin"); 
            }
            






            }

        }
            
    
    
?>