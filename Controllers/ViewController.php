<?php
namespace Controllers;
class ViewController 
{
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
        public function ShowHomeOwner()
        {
         require_once(VIEWS_PATH."homeOwner.php");
        }
        public function ShowOwnerPetList()
        {
         require_once(VIEWS_PATH."homeOwner.php");
        }


}



?>