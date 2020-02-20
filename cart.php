<?php include "config.php" ; 
?>
<head>
 <title>Registracija</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body class="home-welcome-text" style="background-image: url(slike/slika5.jpeg);">
    <div class="homepageheader" style="position: inherit;">
      
      <div style="float: left; margin: 5px 0px 0px 23px;">
        <a href="index.php">
          <img style=" height: 75px; width: 130px;" src="slike/slika4.jpeg">
        </a>
      </div>
      
      </div>
    </div>
<!DOCTYPE html>
<html>
<div class="row-one" style="margin-left:500px;">
        <div style="clear: both"></div>
        <h3 class="title2">Shopping Košara detalji</h3>
        <div class="table-responsive" style="border:1px solid #6d5454;">
            <table class="table table-bordered" style="border:1px solid #6d5454;">
        <tr style="border:1px solid #6d5454;">
          <th style="border:1px solid #6d5454; width=30%;">Naziv proizvoda</th>
          <th style="border:1px solid #6d5454; width=10%;">Kolicina</th>
          <th style="border:1px solid #6d5454; width=13%;">Cijena</th>
          <th style="border:1px solid #6d5454; width=10%;">Total cijena</th>
          <th style="border:1px solid #6d5454; width=17%;">Ukloni</th>
          </tr>
        
          <?php
          if(!empty($_SESSION["cart"])){
              $total=0;
              foreach($_SESSION["cart"] as $key=>$value){
        ?>
        
        <tr>
          <td><?php echo $value["item_name"]; ?></td>
          <td><?php echo $value["item_quantity"]; ?></td>
          <td>km <?php echo $value["product_price"]; ?></td>
          <td>km <?php echo number_format($value["item_quantity"] * $value["product_price"]); ?></td>
          <td><a href="index.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="text-danger">Ukloni proizvod</span></a></td>
        </tr>
        <?php
        $total=$total + ($value["item_quantity"] * $value["product_price"]);
              }
        ?>
        <tr>
        <td colspan="3" text-align="right">Total</td>
        <th text-align="right">km <?php echo number_format($total, 2); ?></th>
        <td></td>
        </tr>
        <?php
              }
        ?>
        </table>
        </div>
            </div>
        </div> 
</html>
    