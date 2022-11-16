
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <link rel="stylesheet" href="owner-style.css">
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
    <p><?php echo $owner->getName()?></p>
    <p><?php echo $owner->getLastName()?></p>
    </div>
</body>
</html>