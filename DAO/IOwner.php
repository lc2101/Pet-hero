<?php 

namespace DAO;
use Models\Owner as Owner;

interface IOwner
{
    public function Add(Owner $owner);
    public function GetAll();
    public function GetById($id);
    public function GetByEmail($email);
}

?>