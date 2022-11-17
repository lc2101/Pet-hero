<?php 

namespace DAO;
use Models\Pet as Pet;

interface IPet
{
    public function Add(Pet $pet);
    public function GetAll();
    public function GetById($id);
    public function GetByOwnerId($id);
}

?>