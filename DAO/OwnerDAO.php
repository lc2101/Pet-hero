<?php
namespace DAO;
use Models\Owner as Owner;
use DAO\Connection as Connection;
use \Exception as Exception;

class OwnerDao
{ 
       
    private $tableName="owners";  
    private $connection;

    public function Add(Owner $owner)
    {
       try {
        $query= "INSERT INTO owners (idowners, name, lastName, birthDay, email, dni, password) VALUES (:idowners, :name, :lastName, :birthDay, :email, :dni, :password)";
                        
            $parameters["idowners"] = 0;
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
                $owner= $this->LoadData($row);
                array_push($ownersList, $owner);
            }
            return $ownersList;    
        }
        catch (Exception $ex)
        {
            throw $ex;
        }

        
    }
    public function LoadData($resultSet)
    {
        $owner = new Owner();
        $owner->setId($resultSet["idowners"]);
        $owner->setName($resultSet["name"]);
        $owner->setLastName($resultSet["lastName"] );
        $owner->setBirthDay($resultSet["birthDay"]);
        $owner->setEmail($resultSet["email"]);
        $owner->setDni($resultSet["dni"]);
        $owner->setPassword($resultSet["password"]);
        return $owner;
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
                $owner= $this->LoadData($row);
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
                    $owner = $this->LoadData($row);
                    
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
}


    





?>