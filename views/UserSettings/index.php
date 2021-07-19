<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <?php echo '<link href="./public/css/UserSettings.css" rel"stylesheet" type="text/css">'; ?>
    </head>

    <!--Settings options-->
    
    <form action="<?php echo constant('URL');?>Setting/updateData" method="POST" enctype="multipart/form-data">
    <div class="container" style="margin-top:4%;">
    <div class="home-container">
    <div class="row justify-content-center">
    
    <div class="form-group">
    <label for="">Profile Photo</label><br>
    <input type="file" name="file" id="profile_image" placeholder="File" class="form-control-fileile">
    </div>

    <div class="form-group">
    <label for ="">username</label>
    <input type="text" name="username" class="form-control">
    </div>

    <div class="form-group">
    <label for ="">Email</label>
    <input type="text" name="email" class="form-control">
    </div>

    <div class="form-group">
    <label for ="">Phone number</label>
    <input type="number" name="Phone_number" class="form-control">
    </div>

    <div class="form-group">
    <label for ="">Password</label>
    <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
    <label for ="">Gender</label>
    <input type="text" name="gender" class="form-control">
    </div>

    <div class="form-group">
    <label for ="">Birthday day</label>
    <input type="date" name="birthday_day" class="form-control">
    </div>


    <div class="form-group">
    <button type="submit" name="Update" class="btn btn-primary">Update</button>
    </div>

    </form>
    </div>
    </div>
    </div> 
    </body>


</html>