<?php echo '<link href="./public/css/header.css" rel="stylesheet" type="text/css">'; ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="public/js/header.js"></script>


<nav class='nav'>
    <span class="logo">Binnary</span>
        <div class='sidemenu-menu-collapsed' id='sidemenu'>
            <div class='sidemenu-header'>
                <span>Binnary</span>
            </div>
            <div class='sidemenu-btn' onclick="sidebarexpanded()">
                <i class="fas fa-bars"></i>
            </div>
            <div class='sidemenu-items'>
                <a to='/' class='sidemenu-item-search'>
                    <div class='sidemenu-item-logo'>
                        <i class="fas fa-search"></i>
                    </div>
                    <div class='sidemenu-item-text'>
                        <input type='text' placeholder='Search' />
                    </div>
                </a>
                <a href="<?php echo constant('URL'); ?>Home" class='sidemenu-item'>
                    <div class='sidemenu-item-logo'>
                        <i class="fas fa-home"></i>
                    </div>
                    <div class='sidemenu-item-text'>
                        <span>Home</span>
                    </div>
                </a>
                <a href="" class='sidemenu-item'>
                    <div class='sidemenu-item-logo'>
                        <i class="fas fa-upload"></i>
                    </div>
                    <div class='sidemenu-item-text'>
                        <span>Post Publications</span>
                    </div>
                </a>
                <a href="" class='sidemenu-item'>
                    <div class='sidemenu-item-logo'>
                        <i class="fas fa-comment-alt"></i>
                    </div>
                    <div class='sidemenu-item-text'>
                        <span>Messages</span>
                    </div>
                </a>
            </div>
            <div class='sidemenu-logout'>
                <a href="<?php echo constant('URL'); ?>logout" class='sidemenu-item'>
                    <div class='sidemenu-item-logo'>
                        <i class="fas fa-power-off"></i>
                    </div>
                    <div class='sidemenu-item-text'>
                        <span>Logout</span>
                    </div>
                </a>
            </div>
        </div>
</nav>