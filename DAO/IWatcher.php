<?php 

namespace DAO;
use Models\Watcher as Watcher;

interface IWatcher
{
    public function Add(Watcher $watcher);
    public function GetAll();
    public function GetById($id);
    public function GetByEmail($email);
}

?>