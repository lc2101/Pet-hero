<?php
namespace DAO;
use Models\Owner as Owner;
use DAO\Connection as Connection;
use \Exception as Exception;
use DAO\IOwner as IOwner;

class OwnerDAO implements IOwner
{ 
       
    private $tableName="owners";  
    private $connection;

    public function Add(Owner $owner)
    {
       try {
        $query= "INSERT INTO owners (idowners, name, lastName, birthDay, email, dni, password) VALUES (:idowners, :name, :lastName, :birthDay, :email, :dni, :password)";
                        
            $parameters["idowners"] = $owner->getId();
            $parameters["name"] = $owner->getName();
            $parameters["lastName"] = $owner->getLastName();
            $parameters["birthDay"] = $owner->getBirthDay();
            $parameters["email"] = $owner->getEmail();
            $parameters["dni"] = $owner->getDni();         
            $parameters["password"] = $owner->getPassword();
        
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $parameters);
            
       }catch (Exception $ex)
       {
           throw $ex;
       }              
            
    }
    public function GetAll()
    {
        $ownersList = array();

        try
        {
            $this->connection = Connection::GetInstance();
            $query = "SELECT * FROM owners";
            $resultSet = $this->connection->Execute($query);
                
            foreach ($resultSet as $row) 
            {
                $owner = new Owner($row["name"],$row["lastName"],$row["birthDay"],$row["email"],$row["dni"],$row["password"],$row["idowners"]);
                array_push($ownersList, $owner);
            }
            return $ownersList;    
        }
        catch (Exception $ex)
        {
            throw $ex;
        }

        
    }
    public function GetById($id){

        $ownersList = array();

        try
        {
            $this->connection = Connection::GetInstance();
            $query = "SELECT * FROM owners WHERE idowners =:id";
            
            $parameters["id"] = $id;
            $resultSet = $this->connection->Execute($query, $parameters);
                
            if(empty($resultSet))
            {
                
                return null;
            }else{
                foreach ($resultSet as $row) 
            {
                $owner = new Owner($row["name"],$row["lastName"],$row["birthDay"],$row["email"],$row["dni"],$row["password"],$row["idowners"]);
                array_push($ownersList, $owner);
                
            }
            return $ownersList[0];  
            }  
        }
        catch (Exception $ex)
        {
            
            throw $ex;
        }
    }
    public function GetByEmail($email)
        {
            $ownersList = array();
            
            try 
            {
                $this->connection = Connection::GetInstance();
                
                $query = "SELECT * FROM owners WHERE email = :email";
                $parameters["email"] = $email;
                $resultSet = $this->connection->Execute($query, $parameters);
                
                if(empty($resultSet))
                {
                    
                    return null;
                }else{
                    
                    foreach($resultSet as $row) 
                    {
                    $owner = new Owner($row["name"], $row["lastName"],$row["birthDay"],$row["email"],$row["dni"],$row["password"],$row["idowners"]);
                    array_push($ownersList, $owner);
                    }

                    return $ownersList[0];  
                } 
            }
            catch (Exception $ex) 
            {
                throw $ex;
            }

           
        }
        public function Edit(Owner $ownerE)
        {
            try {
                $query= "UPDATE owners SET idowners=:idowners, name=:name, lastName=:lastName,
                 birthDay=:birthDay, email=:email, dni=:dni, password=:password WHERE idowners=:idowners";

                $parameters["idowners"] = $ownerE->getId();
                $parameters["name"] = $ownerE->getName();
                $parameters["lastName"] = $ownerE->getLastName();
                $parameters["birthDay"] = $ownerE->getBirthDay();
                $parameters["email"] = $ownerE->getEmail();
                $parameters["dni"] = $ownerE->getDni();         
                $parameters["password"] = $ownerE->getPassword();
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch (Exception $th) {
                throw $th;
            }
        }
       
    
}


    





?>