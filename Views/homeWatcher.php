<?php
    session_start();
    if(isset($_SESSION["loggedUser"]))
    {
        $loggedUser= $_SESSION["loggedUser"];
    }else{
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="./estilo.css">
</head>
<body>
<div class="header-box">
        <header>
            <div class="nav-box">
                <nav>
                    <a href=<?php echo FRONT_ROOT ."Owner/WatcherList"?>>Listado de Guardianes</a>
                    <a href=<?php echo FRONT_ROOT ."Pet/OwnerPetList"?>>Lista Mascotas</a>
                    <form action="<?php echo FRONT_ROOT . "Home/LogOut" ?>" method="post">
                    <button type="submit">LogOut</button>
                    </form>
                    
                </nav>
            </div>
        </header>
    </div>
    <div>
    <p><?php echo $watcher->getName()?></p>
    <p><?php echo $watcher->getLastName()?></p>
    
</body>
</html>