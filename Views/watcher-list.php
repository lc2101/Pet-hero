
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Guardianes</title>
    <link rel="stylesheet" href="css/owner-style.css">
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
</style>
</head>
<body>
    <section class="table-box">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo de Mascota a cuidar</th>
                <th>Tamaño a Cuidar</th>
                <th>Paga</th>
                <th>Reputacion</th>
                <th>Email</th>
                <th>Primer Dia</th>
                <th>Ultimo Dia</th>
                
                <th></th>
            </tr>
            <tbody>                  
                    
                 <?php
                    foreach ($watcherList as $guardian) { 
                         ?>
                         <tr>
                            <td><?php echo $guardian->getName()?></td>
                            <td><?php echo $guardian->getLastName()?></td>
                            <td><?php echo $guardian->getPetType()?></td>
                            <td><?php echo $guardian->getSizecare()?></td>
                            <td><?php echo $guardian->getExpectedPay()?></td>
                            <td><?php echo $guardian->getReputation()?></td>
                            <td><?php echo $guardian->getEmail()?></td>
                            <td><?php echo $guardian->getFirstDay()?></td>
                            <td><?php echo $guardian->getLastDay()?></td>
                            <td><form action="<?php echo FRONT_ROOT . "Owner/MakeReservation" ?>" method="post">
                            <button type="submit" name="idW" value=<?php echo $guardian->getId()?>>Iniciar Reservación</button>
                            </form></td>
                           
                         </tr>
                         <?php
                        }
                        ?>
                </tbody>
            <?php
           
            ?>
        </table>
        <div>
            <form action="<?php echo FRONT_ROOT ."Watcher/FilterByDates"?>" method="post">
            <label for="first">Inicio</label>
            <input type="date" name="first" min="<?php echo date("Y-m-d"); ?>">
            <label for="last">Fin</label>
            <input type="date" name="last" min="<?php echo date("Y-m-d"); ?>">
            <button type="submit">Filtrar</button>
        
        
        </form>
        </div>

        <?php
        if (isset($alert)){
        echo $alert["text"];}
         ?>
            
    </section>
    <a href=<?php echo FRONT_ROOT ."Owner/HomeOwner"?>>Atrás</a>

</body>
</html>