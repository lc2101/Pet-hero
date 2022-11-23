<?php
namespace Controllers;
use DAO\ReservationDAO as ReservationDAO;
use DAO\WatcherDAO as WatcherDAO;
use Models\Watcher as Watcher;
use DAO\PetDAO as PetDAO;
use Models\Pet as Pet;
use Models\Reservation as Reservation;
class ReservationController
{
    public function NewReservation($idWatcher, $idPet, $firstDay,
    $lastDay)
    {
        try {
            
            $reservation= new Reservation($idWatcher, $idPet,isset($_SESSION['id']),
            $firstDay, $lastDay);
            
            $reservationDAO= new ReservationDAO();
            echo "boca";
            $reservationDAO->Add($reservation);
            
        } catch (Exception $th) {
            throw $th;
        }
        header("location: " . FRONT_ROOT . "Watcher/WatcherList");
        
        
    }
    


}






?>