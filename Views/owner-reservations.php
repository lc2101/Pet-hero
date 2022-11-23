<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservaciones Owner</title>
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
                <th>Apellido Guardian</th>
                <th>Nombre Mascota</th>
                <th>Fecha Inicio</th>
                <th>Fecha Final</th>
                <th>Estado</th>
                                
               
            </tr>
            <tbody>                  
                    
                 <?php
                    foreach ($lista as $reservation) { 
                         foreach($listaW as $watcher)
                            {
                                foreach($listaP as $pet)
                                {
                                if($watcher->getId()==$reservation->getIdWatcher()
                                && $pet->getId()==$reservation->getIdPet())
                                {
                           ?>
                         <tr>
                            
                            <td><?php echo $watcher->getLastName()?></td>
                            <td><?php echo $pet->getName()?></td>
                            <td><?php echo $reservation->getFirstDay()?></td>
                            <td><?php echo $reservation->getLastDay()?></td>
                            <td><?php echo $reservation->getState()?></td>
                            <?php if($reservation->getState()=="aceptada"){ ?>
                            <td><form action="<?php echo FRONT_ROOT . "Owner/MakeReservation" ?>" method="post">
                            <button type="submit" name="idW" value=<?php echo $guardian->getId()?>>Pagar</button>
                            </form></td>
                            <?php }
                        
                        ?>
                         </tr>
                         <?php }}}}
                        
                        ?>
                </tbody>
            <?php
           
            ?>
        </table>
        
        </div>

        <?php
        if (isset($alert)){
        echo $alert["text"];}
         ?>
            
    </section>
    <a href=<?php echo FRONT_ROOT ."Owner/HomeOwner"?>>Atrás</a>

</body>
</html>