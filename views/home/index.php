<?php
    $publications             = $this->d['publications'];
    $user                     = $this->d['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php echo '<link href="./public/css/home.css" rel="stylesheet" type="text/css">'; ?>
    <?php echo '<link href="./public/css/Publication.css" rel="stylesheet" type="text/css">'; ?>
</head>

<body class=''>
    <div class="container" style="margin-top: 5%;">
        <div class="home-container">
            <div class="row justify-content-center">
            <?php
            foreach ($publications as $publication ) { ?>
                <div class='Publication-card '>
                    <div class='Publication-card-header'>
                            <img src="<?php echo $publication['profile_image'] ?>" alt="">
                            <label><?php echo $publication['username'] ?></label>
                    </div>
                    <div class='Publication-card-body'>
                        <img src="<?php echo $publication['file'] ?>" alt='0'>
                    </div>
                    <div class='Publication-card-description'>
                        <div class='Publication-card-description-header'>
                            <img src="<?php echo $publication['profile_image'] ?>" alt="">
                            <label><?php echo $publication['username'] ?></label>
                        </div>
                        <label class='Publication-card-description-desc'><?php echo $publication['description'] ?></label>
                    </div>
                    <!-- <div class='Publication-card-Comments'>
                        <label><?php //echo $publication['description'] ?></label>
                    </div> -->
                </div>
                <br>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>