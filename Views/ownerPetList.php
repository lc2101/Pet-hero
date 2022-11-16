<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetList</title>
    <link rel="stylesheet" href="./owner-style.css">
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
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Edad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($petList as $mascota) { 
                         ?>
                         <tr>
                            <td><?php echo $mascota->getName()?></td>
                            <td><?php echo $mascota->getSpecie()?></td>
                            <td><?php echo $mascota->getAge()?></td>
                         </tr>
                         <?php
                        }
                        ?>
                </tbody>
            </table>
    </section>
    
    

    <a href=<?php echo FRONT_ROOT ."View/NewPet"?>>Nueva Mascota</a>
    <a href=<?php echo FRONT_ROOT ."View/ShowHomeOwner"?>>Atrás</a>
    
</body>
</html>