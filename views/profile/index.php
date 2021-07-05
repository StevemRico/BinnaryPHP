<?php
    $publications             = $this->d['publications'];
    $user                     = $this->d['user'];
    $hola                     = $this->d['hole'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php echo '<link href="./public/css/Profile.css" rel="stylesheet" type="text/css">'; ?>
</head>
<body class=''>
    <div class="container" >
        <div class='Profile-container'>
            <div class='Profile-Info'>
                <div class='Profile-Info-img'>
                    <img src="<?php echo $user->getPicture() ?>" alt="" >
                </div>
                <div class='Profile-Info-Data'>
                    <h1><?php echo $user->getUsername() ?></h1>
                    <p class='Profile-Info-Data-Description'><?php echo $user->getProfileDescription() ?></p>
                    <div class='Publication-card'>
                        <?php
                        foreach ($publications as $publication ) { ?>
                            <div class='Publication-card-body'>
                                <img src="<?php echo $publication['file'] ?>" alt='0'>
                            </div>
                        <?php } ?>
                        <!-- Hacer el slider -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>