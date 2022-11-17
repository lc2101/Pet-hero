<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="icon" href="Views/favicon.ico">
</head>
<?php $alert?>
<body>
    <div>
        <form action=<?php echo FRONT_ROOT ."Home/LogIn"?> method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <button type="submit">LogIn</button>
        </div>
        </form>
    </div>
    <div>
    <a href=<?php echo FRONT_ROOT ."View/ShowAccountType"?>>Sing In</a>
    </div>
    <?php if($alert!=NULL){echo $alert["text"];}  ?>
    
    
</body>
</html>