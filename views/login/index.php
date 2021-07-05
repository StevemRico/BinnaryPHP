<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php echo '<link href="./public/css/Login.css" rel="stylesheet" type="text/css">'; ?>
</head>         
<body>
    <form action="<?php echo constant('URL'); ?>login/authenticate" method="POST">
        <div class="parent">
            <div class="keypad-LoginRegister">
                <a href="<?php echo constant('URL'); ?>" class='LoginRegister'> Iniciar Sesion </a>
                <a href="<?php echo constant('URL'); ?>signup" class='LoginRegister'> Registrarse </a>
            </div>
            <div class="FormLogin">
                <input type="text" name="username" id="username" autocomplete="off" placeholder="Username" class='Login-Username'>
                <input type="password" name="password" id="password" autocomplete="off" placeholder="Password" class='Login-Password'>
                <?php $this->showMessages();?>
            </div>
            <div class="LoginSubmit">
                <input type="submit" value="Iniciar sesión" class="btn btn-primary"/>
            </div>
        </div>
    </form>
</body>
</html>