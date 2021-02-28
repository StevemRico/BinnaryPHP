<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets\header.css">
    <link rel="stylesheet" href="../Assets/header.css">
    <title>Document</title>
  </head>
  <body>
    <?php
      session_start();
      if(empty($_SESSION['user'])){
    ?>
      <nav>
        <a class="logo" href="<?php echo base_url(); ?>">Binnary</a>
        <div class='header-menu'>
          <a class="LoginRegisterHeader" href="<?php echo base_url(); ?>User/Login">Login / Register</a>
        </div>
      </nav>
    <?php }else{ ?>
      <nav>
        <a class="logo" href="<?php echo base_url(); ?>">Binnary</a>
        <div class='sidemenu-menu-collapsed' id='sidemenu'>
          <div class='sidemenu-header'>
            <span>Binnary</span>
          </div>
          <div class='sidemenu-btn' onClick='sidebarexpanded()'>
            <i class='fas fa-bars'></i>
          </div>
          <div class='sidemenu-profile'>
                <div class='sidemanu-img-profile'>
                  <img src="https://lh3.googleusercontent.com/proxy/3wtiM4Ydyz0KUX5O6tk1KcZjn_Ul07E9nrETFC-7mJNAhFRJYnUOzAegzFmaPLq4MR-PimynFA3YzWpQoFiql_wTe8SVXR09kb9yuFUE0TmkUgzhXBiN" alt='0' />
                </div>
                <div class='sidemenu-username'>
                  <span><?php ECHO '@'.$_SESSION['user']['username']; ?></span>
                </div>
              <div class='sidemenu-follow'>
            </div>
          </div>
          <div class='sidemenu-items'>
            <!-- <a href='/' class='sidemenu-item-search'> -->
            <a class='sidemenu-item-search' href="<?php echo base_url() ?>">
              <div class='sidemenu-item-logo'>
                <i class='fas fa-search'></i>
              </div>
              <div class='sidemenu-item-text'>
                <input type='text' placeholder='Search' />
              </div>
            </a>
            <a class='sidemenu-item' href="<?php echo base_url() ?>">
              <div class='sidemenu-item-logo'>
                <i class='fas fa-home'></i>
              </div>
              <div class='sidemenu-item-text'>
                <span>Home</span>
              </div>
            </a>
            <!-- <a class='sidemenu-item' href="<?php echo base_url() ?>Publication/Post"> -->
            <a class='sidemenu-item' href="#" id="myBtn">
              <div class='sidemenu-item-logo'>
                <i class='fas fa-upload' ></i>
              </div>
              <div class='sidemenu-item-text'>
                <span>Post Publications</span>
              </div>
            </a>
            <a class='sidemenu-item' href="<?php echo base_url() ?>">
            <!-- <a href='Messages' class='sidemenu-item'> -->
              <div class='sidemenu-item-logo'>
                <i class='fas fa-comment-alt'></i>
              </div>
              <div class='sidemenu-item-text'>
                <span>Messages</span>
              </div>
            </a>
        </div>
        <div class='sidemenu-logout'>
          <a class='sidemenu-item' href="<?php echo base_url() ?>User/Logout">
            <div class='sidemenu-item-logo'>
              <i class='fas fa-power-off'></i>
            </div>
            <div class='sidemenu-item-text'>
              <span>Logout</span>
            </div>
          </a>
        </div>
        <!-- </div> -->
      </nav>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <?php base_url()."Publication/Post" ?>
  </div>

</div>
    <?php } ?>
  </body>
</html>
<script>
    function sidebarexpanded(){
      const side = document.querySelector('#sidemenu');
        // const sidewidth = document.querySelector(':root');
        side.classList.toggle("sidemenu-menu-expanded");
        side.classList.toggle("sidemenu-menu-collapsed");
        if (side.className === 'sidemenu-menu-expanded') {
            // sidewidth.style.setProperty('--sidemenu-width','250px');
        } else if (side.className === 'sidemenu-menu-collapsed') {
            // sidewidth.style.setProperty('--sidemenu-width','50px');
        }
    }
    
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
      modal.style.display = "block";
    }
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>