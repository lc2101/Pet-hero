<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservación</title>
</head>
<body>
<td><?php echo $guardian->getName()?></td>
 <td><?php echo $guardian->getLastName()?></td>
 <td><?php echo $guardian->getPetType()?></td>
 <td><?php echo $guardian->getSizecare()?></td>                           
 <td><?php echo $guardian->getExpectedPay()?></td>                           
<td><?php echo $guardian->getReputation()?></td>                          
 <td><?php echo $guardian->getEmail()?></td>                         
<td><?php echo $guardian->getFirstDay()?></td>                       
<td><?php echo $guardian->getLastDay()?></td> 



<td><form action="<?php echo FRONT_ROOT . "Pet/EditPet" ?>" method="post">

<label for="pet">Seleccionar Mascota</label>
<select name="pet">
    <?php
    foreach($petList as $pet)
    {
        if(($pet->getSpecie()==guardian->getPetType() || "both"==guardian->getPetType())&&
        ($guardian->getSizecare()=="cualquiera" ||$guardian->getSizecare()==$pet->getSize()))
        {
            ?>
            <option value="<?php echo $pet->getId();?>"><?php echo $pet->getName();?></option>
        <?php   }
    }




?>
</select>
<button type="submit" name="id" value=<?php echo $guardian->getId()?>>Iniciar Reservación</button>
</form></td>                                                      
</body>
</html>