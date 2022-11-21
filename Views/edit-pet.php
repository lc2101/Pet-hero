<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mascota</title>
    <link rel="stylesheet" href="css/owner-style.css">
</head>
<body>
    <div>
        <form action="<?php echo FRONT_ROOT . "Pet/Edit" ?>" method="post">
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value=<?php $pet->getName()?>>
        </div>
        <div>
            <label for="specie">Especie</label>
            <select name="specie" id="specie">
                <option value="<?php $pet->getSpecie()?>"><?php $pet->getSpecie()?></option>
                <option value="cat">gato</option>
                <option value="dog">perro</option>
            </select>           
        </div>
        <div>
            <label for="age">Edad</label>
            <input type="number" name="age" id="age" value=<?php $pet->getAge()?>>
        </div>
        <div>
            <label for="size">Tamaño</label>
            <select name="size" id="size">
                <option value="<?php $pet->getSize()?>"><?php $pet->getSize()?></option>
                <option value="pequeño">Pequeño</option>
                <option value="mediano">Mediano</option>
                <option value="grande">Grande</option>
            </select>           
        </div>
    
        <div>
            <button type="submit">Guardar</button>
        </div>
        <a href=<?php echo FRONT_ROOT ."Pet/OwnerPetList"?>>Atrás</a>
        </form>
    </div>
    
</body>
</html>