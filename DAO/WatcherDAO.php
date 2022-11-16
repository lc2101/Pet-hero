<?php
 namespace DAO;
 use Models\Watcher as Watcher;
 use DAO\Connection as Connection;
 use \Exception as Exception;
 
 class WatcherDao
 { 
        
         
     private $connection;
 
     public function Add(Watcher $watcher)
     {
        try {
         $query= "INSERT INTO watchers (idwatchers, name, lastName, birthDay, email, dni, reputation, password, petType, expectedPay, sizecare) VALUES (:idwatchers, :name, :lastName, :birthDay, :email, :dni, :reputation, :password, :petType, :expectedPay, :sizecare)";
                         
             $parameters["idwatchers"] = $watcher->getId();
             $parameters["name"] = $watcher->getName();
             $parameters["lastName"] = $watcher->getLastName();
             $parameters["birthDay"] = $watcher->getBirthDay();
             $parameters["email"] = $watcher->getEmail();
             $parameters["dni"] = $watcher->getDni();         
             $parameters["reputation"] = $watcher->getReputation();
             $parameters["password"] = $watcher->getPassword();
             $parameters["petType"] = $watcher->getPetType();
             $parameters["expectedPay"] = $watcher->getExpectedPay();
             $parameters["sizecare"] = $watcher->getSizecare();
         
             $this->connection = Connection::GetInstance();
             $this->connection->ExecuteNonQuery($query, $parameters);
        }catch (Exception $e)
        {
            throw $e;
        }              
             
     }
     public function GetAll()
     {
         $watchersList = array();
 
         try
         {
             $this->connection = Connection::GetInstance();
             $query = "SELECT * FROM watchers";
             $resultSet = $this->connection->Execute($query);
                 
             foreach ($resultSet as $row) 
             {
                 $watcher= new Watcher($row["name"],$row["lastName"],$row["birthDay"],$row["email"],$row["dni"],$row["password"],$row["idwatchers"],$row["petType"],$row["expectedPay"],$row["reputation"],$row["sizecare"]);
                 array_push($watchersList, $watcher);
             }
             return $watchersList;    
         }
         catch (Exception $e)
         {
             throw $e;
         }
 
         
     }
    
     public function GetById($id){

        $watchersList = array();

        try
        {
            $this->connection = Connection::GetInstance();
            $query = "SELECT * FROM watchers WHERE idwatchers = :id";
            $parameters["id"] = $id;
            $resultSet = $this->connection->Execute($query, $parameters);
                
            if(empty($resultSet))
            {
                return null;
            }else{
                foreach ($resultSet as $row) 
            {
                $watcher= new Watcher($row["name"],$row["lastName"],$row["birthDay"],$row["email"],$row["dni"],$row["password"],$row["idwatchers"],$row["petType"],$row["expectedPay"],$row["reputation"],$row["sizecare"]);
                array_push($ownersList, $watcher);
            }
            return $watchersList[0];  
            }  
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }
    public function GetByEmail($email)
        {
            $watchersList = array();
            
            
            try 
            {
                $this->connection = Connection::GetInstance();
                $query = "SELECT * FROM watchers WHERE email = :email";
                $parameters["email"] = $email;
                $resultSet = $this->connection->Execute($query, $parameters);
                if(empty($resultSet))
                {
                  
                 return null;
                }else{
                    foreach($resultSet as $row) 
                {
                    $watcher= new Watcher($row["name"],$row["lastName"],$row["birthDay"],$row["email"],$row["dni"],$row["password"],$row["idwatchers"],$row["petType"],$row["expectedPay"],$row["reputation"],$row["sizecare"]);
                    array_push($watchersList, $watcher);
                }

                return $watchersList[0];  
                } 
            }
            catch (Exception $e) 
            {
                throw $e;
            }

           
        }
 }
 
 
     
 
 
 

    



?>