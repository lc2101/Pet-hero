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
                <th>Apellido Dueño</th>
                <th>Nombre Mascota</th>
                <th>Raza Mascota</th>
                <th>Tamaño Mascota</th>
                <th>Fecha Inicio</th>
                <th>Fecha Final</th>
                <th>Estado</th>
                                
               
            </tr>
            <tbody>                  
                    
                 <?php
                    foreach ($lista as $reservation) { 
                         foreach($listaO as $owner)
                            {
                                foreach($listaP as $pet)
                                {
                                    
                                if($owner->getId()==$reservation->getIdOwner()
                                && $pet->getId()==$reservation->getIdPet())
                                {
                           ?>
                         <tr>
                            
                            <td><?php echo $owner->getLastName()?></td>
                            <td><?php echo $pet->getName()?></td>
                            <td><?php echo $pet->getSpecie()?></td>
                            <td><?php echo $pet->getSize()?></td>
                            <td><?php echo $reservation->getFirstDay()?></td>
                            <td><?php echo $reservation->getLastDay()?></td>
                            <td><?php echo $reservation->getState()?></td>
                            <?php if($reservation->getState()=="indefinido"){ ?>
                            <td><form action="<?php echo FRONT_ROOT . "Reservation/StateChange" ?>" method="post">
                            <select name="state">
                                <option value="indefinido">Indefinido</option>    
                                <option value="aceptada">Aceptar</option>
                                <option value="rechazada">Rechazar</option>
                                
                            </select>
                            <button type="submit" name="id" value=<?php echo $reservation->getId()?>>Enviar</button>
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
    <a href=<?php echo FRONT_ROOT ."Watcher/HomeWatcher"?>>Atrás</a>

</body>
</html>