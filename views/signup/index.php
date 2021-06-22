<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <?php echo '<link href="./public/css/Login.css" rel="stylesheet" type="text/css">'; ?>
</head>
<body>
        <form action="<?php echo constant('URL'); ?>signup/newUser" method="POST">
            <div class="parent">
                <div class="keypad-LoginRegister">
                    <a href="<?php echo constant('URL'); ?>" class='LoginRegister'> Iniciar Sesion </a>
                    <a href="<?php echo constant('URL'); ?>signup" class='LoginRegister'> Registrarse </a>
                </div>
                <div class="FormRegister">
                    <input type="text" name="username" id="username"  placeholder="Username" class='Register-Username'>
                    <input type="text" name="email" id="email"  placeholder="Email" class='Register-Email'>
                    <input type="text" name="phone" id="phone"  placeholder="Phone" class='Register-Phone'>
                    <input type="password" name="password" id="password"  placeholder="Password" class='Register-Password'>
                    <?php $this->showMessages();?>
                </div>
                <div class="RegisterSubmit">
                    <input type="submit" value="Registrarse" class="btn btn-primary"/>
                </div>
            </div>
        </form>
</body>
</html>