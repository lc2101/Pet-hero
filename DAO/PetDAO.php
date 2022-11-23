<?php
    namespace DAO;
    use Models\Pet as Pet;
    use DAO\Connection as Connection;
    use \Exception as Exception;
    use DAO\IPet as IPet;
    class PetDAO implements IPet
    {
        
        private $connection;
        
        
        public function Add(Pet $pet)
        {
            try
            {
                $query = "INSERT INTO pets (idpets, name, idowners, age, specie, size) VALUES (:idpets, :name, :idowners, :age, :specie, :size)";

                $parameters["idpets"] = $pet->getId();
                $parameters["name"] = $pet->getName();
                $parameters["idowners"] = $pet->getOwner_id();
                $parameters["age"] = $pet->getAge();
                $parameters["specie"] = $pet->getSpecie();
                $parameters["size"] = $pet->getSize();
                
                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
                
            }
            catch (Exception $e)
            {
                throw $e;
            }
        }
    
        public function GetAll()
        {
            $petList = array();

            try
            {
                $this->connection = Connection::GetInstance();
                $query = "SELECT * FROM pets";
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row) 
                {
                    $pet = new Pet($row['name'],$row['idowners'],$row['age'],
                    $row['specie'],$row['size'],$row['idpets']);
                    array_push($petList, $pet);
                }
                return $petList;
            }
            catch (Exception $e) 
            {
                throw $e;
            }

           
        }
    
        public function GetById($id){
           
            $petList = array();

            try 
            {
                $this->connection = Connection::GetInstance();
                $query = "SELECT * FROM pets WHERE idpets = :id";
                
                $parameters["id"] = $id;
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row) 
                {
                    $pet = new Pet($row['name'],$row['idowners'],$row['age'],
                    $row['specie'],$row['size'],$row['idpets']);
                    array_push($petList, $pet);
                }
                if(!empty($petList))
                {
                    return $petList[0];
                }else
                {
                    throw new Exception("No se encontró la mascota");
                    
                }
                
            } 
            catch (Exception $e) 
            {
                throw $e;
            }
            
        }
        
        public function GetByOwnerId($id){
           
            $petList = array();

            try 
            {
                $this->connection = Connection::GetInstance();
                $query = "SELECT * FROM pets WHERE idowners =:id";
                $parameters["id"] = $id;
                
                $resultSet = $this->connection->Execute($query, $parameters);
                
                if(empty($resultSet))
                {
                    
                return null;
                }else{
                foreach($resultSet as $row) 
                {
                    
                    $pet = new Pet($row['name'],$row['idowners'],$row['age'],
                    $row['specie'],$row['size'],$row['idpets']);
                    
                    array_push($petList, $pet);
                }
                }
                
                return $petList;
            } 
            catch (Exception $e) 
            {
                throw $e;
            }
            
        }
        public function Edit(Pet $petE)
        {
            try
            {
                $query = "UPDATE pets SET idpets=:idpets, name=:name, idowners=:idowners, age=:age, specie=:specie, size=:size
                WHERE idpets=:idpets";

                $parameters["idpets"] = $petE->getId();
                $parameters["name"] = $petE->getName();
                $parameters["idowners"] = $petE->getOwner_id();
                $parameters["age"] = $petE->getAge();
                $parameters["specie"] = $petE->getSpecie();
                $parameters["size"] = $petE->getSize();
                
                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
                
            }
            catch (Exception $e)
            {
                throw $e;
            }


        }
    
    
    
        
    }
?>    