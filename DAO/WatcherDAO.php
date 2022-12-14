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
         $query= "INSERT INTO watchers (idwatchers, name, lastName, birthDay,
          email, dni, reputation, password, petType, expectedPay, sizecare,
         firstDay, lastDay) VALUES (:idwatchers, :name, :lastName, :birthDay,
          :email, :dni, :reputation, :password, :petType, :expectedPay, :sizecare,
          :firstDay,:lastDay)";
                         
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
             $parameters["firstDay"] = $watcher->getFirstDay();
             $parameters["lastDay"] = $watcher->getLastDay();
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
                 $watcher= new Watcher($row["name"],$row["lastName"],$row["birthDay"],
                 $row["email"],$row["dni"],$row["password"],$row["idwatchers"],
                 $row["petType"],$row["expectedPay"],$row["reputation"],
                 $row["sizecare"],$row["firstDay"],$row["lastDay"]);
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
                $watcher= new Watcher($row["name"],$row["lastName"],$row["birthDay"],
                $row["email"],$row["dni"],$row["password"],$row["idwatchers"],$row["petType"],
                $row["expectedPay"],$row["reputation"],$row["sizecare"],$row["firstDay"],$row["lastDay"]);
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
                    $watcher= new Watcher($row["name"],$row["lastName"],$row["birthDay"],
                    $row["email"],$row["dni"],$row["password"],$row["idwatchers"],$row["petType"],
                    $row["expectedPay"],$row["reputation"],$row["sizecare"],$row["firstDay"],$row["lastDay"]);
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
        public function Edit(Watcher $watcherE)
        {
            try {
                $query= "UPDATE watchers SET idwatchers=:idwatchers, name=:name, lastName=:lastName,
                 birthDay=:birthDay, email=:email, dni=:dni, reputation=:reputation, password=:password,
                  petType=:petType, expectedPay=:expectedPay, sizecare=:sizecare,
                  firstDay=:firstDay, lastDay=:lastDay WHERE idwatchers=:idwatchers";

                $parameters["idwatchers"] = $watcherE->getId();
                $parameters["name"] = $watcherE->getName();
                $parameters["lastName"] = $watcherE->getLastName();
                $parameters["birthDay"] = $watcherE->getBirthDay();
                $parameters["email"] = $watcherE->getEmail();
                $parameters["dni"] = $watcherE->getDni();         
                $parameters["reputation"] = $watcherE->getReputation();
                $parameters["password"] = $watcherE->getPassword();
                $parameters["petType"] = $watcherE->getPetType();
                $parameters["expectedPay"] = $watcherE->getExpectedPay();
                $parameters["sizecare"] = $watcherE->getSizecare();
                $parameters["firstDay"] = $watcherE->getFirstDay();
                $parameters["lastDay"] = $watcherE->getLastDay();
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch (Exception $th) {
                throw $th;
            }
        }

        public function FilterByDates($first, $last)
            {
                $watchersList = array();
                try {
                    $this->connection = Connection::GetInstance();
                    $query = "SELECT * FROM watchers WHERE firstDay<=:first AND firstDay<=:last
                    AND lastDay>=:last AND lastDay>=:first";
                    $parameters["first"]=$first;
                    $parameters["last"]=$last;

                    $resultSet = $this->connection->Execute($query, $parameters);
                        
                    foreach ($resultSet as $row) 
                    {
                        $watcher= new Watcher($row["name"],$row["lastName"],$row["birthDay"],
                        $row["email"],$row["dni"],$row["password"],$row["idwatchers"],
                        $row["petType"],$row["expectedPay"],$row["reputation"],
                        $row["sizecare"],$row["firstDay"],$row["lastDay"]);
                        array_push($watchersList, $watcher);
                    }
                    return $watchersList;   
                } catch (Exception $th) {
                    throw $th;
                }
            }
        
}

 
 
     
 
 
 

    



?>