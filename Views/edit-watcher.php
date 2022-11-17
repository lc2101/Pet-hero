<?php 
    date_default_timezone_set("America/Argentina/Buenos_Aires");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing In</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div>
    <form action="<?php echo FRONT_ROOT . "Watcher/Edit" ?>"  method="post">
            <div>
                <label for="name">Nombre</label>
                <input type="text" name="name" value=<?php echo $watcher->getName()?> required>
            </div>
            <div>
                <label for="lastName">Apellido</label>
                <input type="text" name="lastName" value=<?php echo $watcher->getLastName()?> required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value=<?php echo $watcher->getEmail()?> required>
            </div>
            <div>
                <label for="password">Contraseña</label>
                <input type="password" name="password" value=<?php echo $watcher->getPassword()?> required>
            </div>
            <div>
                <label for="dni">DNI</label>
                <input type="text" name="dni" value=<?php echo $watcher->getDNI()?> required >
            </div>
            <div>
                <label for="birthDay">Fecha de Nacimiento</label>
                <input type="date" name="birthDay" min="1903-01-01" max="<?php echo date("Y-m-d")?>" value=<?php echo $watcher->getBirthDay()?> required>
            </div>
             <div>
            <label for="petType">Especie</label>
            <select name="petType" value=<?php echo $watcher->getPetType()?>>
                <option value="cat">gato</option>
                <option value="dog">perro</option>
                <option value="both">ambos</option>
            </select>           
            </div>
            <div>
            <label for="sizecare">Tamaño</label>
            <select name="sizecare" value=<?php echo $watcher->getSizecare()?>>
                <option value="pequeño">Pequeño</option>
                <option value="mediano">Mediano</option>
                <option value="grande">Grande</option>
                <option value="cualquiera">Cualquiera</option>
            </select>           
            </div>
            <div>
            <label for="expectedPay">Paga Esperada</label>
            <input type="number" name="expectedPay" value=<?php echo $watcher->getExpectedPay()?>>
            </div>
            <div>
            <button type="submit">Guardar</button>
            <a href=<?php echo FRONT_ROOT ."Watcher/HomeWatcher"?>>Atrás</a>
            </div>


        </form> 
    </div>
</body>
</html>

