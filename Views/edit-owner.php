<?php 
    date_default_timezone_set("America/Argentina/Buenos_Aires");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EditOwner</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div>
    <form action="<?php echo FRONT_ROOT . "Owner/Edit" ?>"  method="post">
            <div>
                <label for="name">Nombre</label>
                <input type="text" name="name" value=<?php echo $owner->getName()?> required>
            </div>
            <div>
                <label for="lastName">Apellido</label>
                <input type="text" name="lastName" value=<?php echo $owner->getLastName()?> required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value=<?php echo $owner->getEmail()?> required>
            </div>
            <div>
                <label for="password">Contraseña</label>
                <input type="password" name="password" value=<?php echo $owner->getPassword()?> required>
            </div>
            <div>
                <label for="dni">DNI</label>
                <input type="text" name="dni" value=<?php echo $owner->getDNI()?> required >
            </div>
            <div>
                <label for="birthDay">Fecha de Nacimiento</label>
                <input type="date" name="birthDay" min="1903-01-01" max="<?php echo date("Y-m-d")?>" value=<?php echo $owner->getBirthDay()?> required>
            </div>
             <div>
            
            <div>
            <button type="submit">Guardar</button>
            <a href=<?php echo FRONT_ROOT ."Owner/HomeOwner"?>>Atrás</a>
            </div>


        </form> 
    </div>
</body>
</html>

