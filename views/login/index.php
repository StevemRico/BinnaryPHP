<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form action="<?php echo constant('URL'); ?>/login/authenticate" method="POST">
        <p>
            <label for='username'>Username</label>
            <input type="text" name="username" id="username" >
        </p>
        <p>
            <label for='password'>password</label>
            <input type="text" name="password" id="password" >
        </p>
        <?php $this->showMessages(); ?>
        <p>
            <input type="submit" value="Login" >
        </p>
        <p>
            ¿No tienes cuenta? <a href="<?php echo constant('URL'); ?>/signup">Registrarse</a>
        </p>
    </form>
</body>
</html>