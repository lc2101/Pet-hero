<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservación</title>
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
                
                
            </tr>
            <tbody>  
            <tr> 
<td><?php echo $watcher->getName()?></td>
 <td><?php echo $watcher->getLastName()?></td>
 <td><?php echo $watcher->getPetType()?></td>
 <td><?php echo $watcher->getSizecare()?></td>                           
 <td><?php echo $watcher->getExpectedPay()?></td>                           
<td><?php echo $watcher->getReputation()?></td>                          
 <td><?php echo $watcher->getEmail()?></td>                         
<td><?php echo $watcher->getFirstDay()?></td>                       
<td><?php echo $watcher->getLastDay()?></td> 
</tr>
</tbody>
</table>

<td><form action="<?php echo FRONT_ROOT . "Reservation/NewReservation" ?>" method="post">

<label for="idPet">Seleccionar Mascota</label>
<select name="idPet">
    <?php
    
    foreach($petList as $pet)
    {
       
        if(($pet->getSpecie()==$watcher->getPetType() || "both"==$watcher->getPetType())&&
        ($watcher->getSizecare()=="cualquiera" ||$watcher->getSizecare()==$pet->getSize()))
        {
            ?>
            <option value="<?php echo $pet->getId();?>"><?php echo $pet->getName();?></option>
        <?php   }
    }




?>
</select>
<label for="first">Inicio</label>
<input type="date" name="firstDay" min="<?php echo $watcher->getFirstDay();?>" max="<?php echo $watcher->getLastDay();?>">
<label for="last">Fin</label>
<input type="date" name="lastDay" min="<?php echo $watcher->getFirstDay();?>" max="<?php echo $watcher->getLastDay();?>">
    
<button type="submit" name="idWatcher" value=<?php echo $watcher->getId()?>>Iniciar Reservación</button>
</form></td>
<a href=<?php echo FRONT_ROOT ."Watcher/WatcherList"?>>Atrás</a>                                                      
</body>
</html>