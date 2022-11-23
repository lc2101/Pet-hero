<?php
 namespace DAO;
 use Models\Reservation as Reservation;
 use DAO\Connection as Connection;
 use \Exception as Exception;

class ReservationDAO
{

    private $connection;
 
    public function Add(Reservation $reservation)
    {
       try {
        $query= "INSERT INTO reservations (idreservations, idwatchers,idpets,
        idowners,firstDay,lastDay,state) VALUES (:idreservations, :idwatchers,
        :idpets,:idowners,:firstDay,:lastDay,:state)";
                        
            $parameters["idreservations"] = $reservation->getId();
            $parameters["idwatchers"] = $reservation->getIdWatcher();
            $parameters["idpets"] = $reservation->getIdPet();
            $parameters["idowners"] = $reservation->getIdOwner();
            $parameters["firstDay"] = $reservation->getFirstDay();
            $parameters["lastDay"] = $reservation->getLastDay();         
            $parameters["state"] = $reservation->getState();
            
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $parameters);
       }catch (Exception $e)
       {
           throw $e;
       }              
            
    }
    public function GetAll()
    {
        $reservationsList = array();

        try
        {
            $this->connection = Connection::GetInstance();
            $query = "SELECT * FROM reservations";
            $resultSet = $this->connection->Execute($query);
                
            foreach ($resultSet as $row) 
            {
                $reservation= new Reservation($row["idwatchers"],
                $row["idpets"],$row["idowners"],$row["firstDay"],$row["lastDay"],
                $row["idreservations"],$row["state"]);
                array_push($reservationsList, $reservation);
            }
            return $reservationsList;    
        }
        catch (Exception $e)
        {
            throw $e;
        }

        
    }
   
    public function GetById($id)
    {

        $reservationsList = array();

       try
       {
           $this->connection = Connection::GetInstance();
           $query = "SELECT * FROM reservations WHERE idreservations = :id";
           $parameters["id"] = $id;
           $resultSet = $this->connection->Execute($query, $parameters);
               
           if(empty($resultSet))
           {
               return null;
           }else{
               foreach ($resultSet as $row) 
           {
            $reservation= new Reservation($row["idwatchers"],
            $row["idpets"],$row["idowners"],$row["firstDay"],$row["lastDay"],
            $row["idreservations"], $row["state"]);
            array_push($reservationsList, $reservation);
           }
           return $reservationsList[0];  
           }  
       }
       catch (Exception $e)
       {
           throw $e;
       }
   }
   public function GetByWatcher($id)
    {
        $reservationsList = array();

        try
        {
            $this->connection = Connection::GetInstance();
            $query = "SELECT * FROM reservations WHERE idwatchers = :id";
            $parameters["id"] = $id;
            $resultSet = $this->connection->Execute($query, $parameters);
                
            if(empty($resultSet))
            {
                return null;
            }else{
            foreach ($resultSet as $row) 
            {
             $reservation= new Reservation($row["idwatchers"],
             $row["idpets"],$row["idowners"],$row["firstDay"],$row["lastDay"],
             $row["idreservations"],$row["state"]);
             array_push($reservationsList, $reservation);
            }
            return $reservationsList;  
            }  
           
        

        }catch(Exception $e) 
           {
               throw $e;
           }  
       
    }
    public function GetByOwner($id)
    {
        $reservationsList = array();

        try
        {
            $this->connection = Connection::GetInstance();
            $query = "SELECT * FROM reservations WHERE idowners = :id";
            $parameters["id"] = $id;
            $resultSet = $this->connection->Execute($query, $parameters);
                
            if(empty($resultSet))
            {
                return null;
            }else{
            foreach ($resultSet as $row) 
            {
             $reservation= new Reservation($row["idwatchers"],
             $row["idpets"],$row["idowners"],$row["firstDay"],$row["lastDay"],
             $row["idreservations"],$row["state"]);
             array_push($reservationsList, $reservation);
            }
            return $reservationsList;  
            }  
           
        

        } catch (Exception $e) 
           {
               throw $e;
           } 
       
    }
    public function StateChange($id, $state)
    {
        try{
            

            $query = "UPDATE reservations SET state = :state WHERE idreservations = :id";

            $parameters['id'] = $id;
            $parameters['state'] = $state;
            $this->connection = Connection::GetInstance();
            $this->connection->Execute($query, $parameters);
        }catch (Exception $e) {
            throw $e;
        }
    }
      
       
}



    


 ?>
 