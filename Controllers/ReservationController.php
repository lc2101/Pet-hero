<?php
namespace Controllers;
use DAO\ReservationDAO as ReservationDAO;
use DAO\WatcherDAO as WatcherDAO;
use Models\Watcher as Watcher;
use DAO\PetDAO as PetDAO;
use DAO\OwnerDAO as OwnerDAO;
use Models\Pet as Pet;
use Models\Reservation as Reservation;
class ReservationController
{
    public function NewReservation($idWatcher, $idPet, $firstDay,
    $lastDay)
    {
        try {
            
            $reservation= new Reservation($idWatcher, $idPet,$_SESSION['id'],
            $firstDay, $lastDay);
            
            $reservationDAO= new ReservationDAO();
            
            $reservationDAO->Add($reservation);
            
        } catch (Exception $th) {
            throw $th;
        }
        header("location: " . FRONT_ROOT . "Watcher/WatcherList");
        
        
    }
    public function OwnerReservations()
    {
        try {
            
            $watcherDAO=new WatcherDAO();
            $listaW=$watcherDAO->GetAll();
            $petDAO=new PetDAO();
            $listaP=$petDAO->GetByOwnerId($_SESSION['id']);
            $reservationDAO= new ReservationDAO();
            
            $lista=$reservationDAO->GetByOwner($_SESSION['id']);
            require_once(VIEWS_PATH."owner-reservations.php");
            
        } catch (Exception $th) {
            throw $th;
            header("location: " . FRONT_ROOT . "Owner/HomeOwner");
        }
        
        
        
    }
    
    public function WatcherReservations()
    {
        try {
            
            $ownerDAO=new OwnerDAO();
            $listaO=$ownerDAO->GetAll();
            $petDAO=new PetDAO();
            $listaP=$petDAO->GetAll();
            $reservationDAO= new ReservationDAO();
            
            $lista=$reservationDAO->GetByWatcher($_SESSION['id']);
            
            require_once(VIEWS_PATH."watcher-reservations.php");
            
        } catch (Exception $th) {
            throw $th;
            header("location: " . FRONT_ROOT . "Watcher/HomeWatcher");
        }
        
        
        
    }

    public function StateChange($id, $state)
    {
        try {
            
            
            
            $reservationDAO= new ReservationDAO();
            $reservationDAO->StateChange($id, $state);
            
            header("location: " . FRONT_ROOT . "Reservation/WatcherReservations");
            
        } catch (Exception $th) {
            throw $th;
            header("location: " . FRONT_ROOT . "Owner/HomeOwner");
        }
        
        
        
    }


}






?>