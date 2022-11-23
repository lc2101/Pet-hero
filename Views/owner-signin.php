<?php 
    date_default_timezone_set("America/Argentina/Buenos_Aires");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="signin-form">
       <form action="<?php echo FRONT_ROOT . "Owner/Register" ?>"  method="post">
            <div>
                <label for="name">Nombre</label>
                <input type="text" name="name" placeholder="..."required>
            </div>
            <div>
                <label for="lastName">Apellido</label>
                <input type="text" name="lastName" placeholder="..." required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="ejemplo@gmail.com"required>
            </div>
            <div>
                <label for="password">Contraseña</label>
                <input type="password" name="password"required>
            </div>
            <div>
                <label for="dni">DNI</label>
                <input type="text" name="dni" required>
            </div>
            <div>
                <label for="birthDay">Fecha de Nacimiento</label>
                <input type="date" name="birthDay" min="1903-01-01" max="<?php echo date("Y-m-d")?>" required>
            </div>
            <div>
                <input type="submit" value="signin">
            </div>
        </form> 
    </div>
</body>
<?php
        if (isset($alert)){
        echo $alert["text"];}
         ?>
            
</html>