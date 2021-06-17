<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="<?php echo constant('URL'); ?>/signup/newUser" method="POST">
        <h2>Register</h2>
        <p>
            <label for='username'>Username</label>
            <input type="text" name="username" id="username" >
        </p>
        <p>
            <label for='email'>Email</label>
            <input type="text" name="email" id="email" >
        </p>
        <p>
            <label for='phone_number'>Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" >
        </p>
        <p>
            <label for='password'>password</label>
            <input type="text" name="password" id="password" >
        </p>
        <?php $this->showMessages(); ?>
        <p>
            <input type="submit" value="Register" >
        </p>
    </form>
</body>
</html>

