<?php echo '<link href="./public/css/header.css" rel="stylesheet" type="text/css">'; ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="public/js/header.js"></script>

<?php
    $user = $this->d['user'];
?>

<nav class='nav'>
    <span class="logo">Binnary</span>
        <div class='sidemenu-menu-collapsed' id='sidemenu'>
            <div class='sidemenu-header'>
                <span>Binnary</span>
            </div>
            <br>
            <div class='sidemenu-btn' onclick="sidebarexpanded()">
                <i class="fas fa-bars"></i>
            </div>
            <div class='sidemenu-items'>
                <a href="<?php echo constant('URL')?>profile" style="text-decoration: none;">
                    <div class='sidemenu-profile'>
                        <div class='sidemanu-img-profile'>
                            <img src="<?php echo $user->getPicture() ?>" alt='0' />
                        </div>
                        <div class='sidemenu-username'>
                            <span style="text-decoration: none;">
                                <?php echo $user->getUsername() ?>
                            </span>                                
                        </div>
                        <div class='sidemenu-follow'>
                        </div>
                    </div>
                </a>
                <a href="" class='sidemenu-item-search'>
                    <div class='sidemenu-item-logo'>
                        <i class="fas fa-search"></i>
                    </div>
                    <div class='sidemenu-item-text'>
                        <input type='text' placeholder='Search' />
                    </div>
                </a>
                <a href="<?php echo constant('URL'); ?>home" class='sidemenu-item'>
                    <div class='sidemenu-item-logo'>
                        <i class="fas fa-home"></i>
                    </div>
                    <div class='sidemenu-item-text'>
                        <span>Home</span>
                    </div>
                </a>
                <a href="<?php echo constant('URL'); ?>publication" class='sidemenu-item'>
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

                <!-- Settings-->
                <a href="<?php echo constant('URL'); ?>Setting" class='sidemenu-item'>
                <div class='sidemenu-item-logo'>
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class='sidemenu-item-text'>
                    <span>Settings</span>
                </div>
                </a>

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

<?php //require_once './controllers/PublicationController.php'; ?>


