<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php echo '<link href="./public/css/Publication.css" rel="stylesheet" type="text/css">'; ?>
</head>
<body>
    <div id="PostPublication" class="PostPublication container">
        <form action="<?php echo constant('URL'); ?>publication/newPublication" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="PostPublicationForm">
                    <input type="text" name="description" id="description"  placeholder="Description" class='Publi-Description'>
                    <input type="file" name="file" id="file"  placeholder="File" class='form-control'>
                    <?php $this->showMessages();?>
                </div>
                <div class="PostSubmit row justify-content-center">
                    <input type="submit" value="Post" class="btn btn-primary"/>
                </div>
            </div>
        </form>
    </div>
</body>
</html>