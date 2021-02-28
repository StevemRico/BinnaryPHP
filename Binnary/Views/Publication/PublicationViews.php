<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/Assets/products.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
$url_actual = $_SERVER["REQUEST_URI"];
if($url_actual == "/binnary/Publication/Get"){ ?>
    <div class="product-grid">
    <?php foreach($data as $item){ ?>
        <div class="product">
            <a href="./GetUnique/<?php echo $item['id_publication'] ?>">
                <div class="product-img"> 
                    <img alt="<?php echo $item['description'] ?>" src="<?php echo $item['file'] ?>"/> 
                </div>
                <div class="product-footer">
                    <label class="product-model"><?php echo $item['description'] ?></label>
                    <br/>
                    <label class="product-price"><?php echo $item['PRICE'] ?></label>
                </div>
            </a>    
        </div>
    <?php } ?>
    </div>    
    <?php }else if($url_actual == "/binnary/Publication/GetUnique/".$data['ID_PROD'].""){ ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/products.css">
            <div class="single-product">
                <label class="single-product-model"><?php echo $data['MODEL'] ?></label>
                <div class="single-product-img"> 
                    <img alt="<?php echo $data['MODEL'] ?>" src="<?php echo $data['PROD_IMAGE'] ?>"/> 
                </div>
                <div class="single-product-footer">
                    <label class="single-product-price"><?php echo $data['PRICE'] ?></label>
                </div>
                <!-- <a href="<?php //echo base_url(); ?>Cart/AddCartP/<?php //echo $data['ID_PROD'] ?>" class="btn btn-info"> Añadir al Carrito</a> -->
            </div>              
    <?php }?>
</body>
</html>