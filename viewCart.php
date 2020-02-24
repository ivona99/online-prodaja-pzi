<?php 
 
include_once 'cart.class.php'; 
$cart = new Cart; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Pregled košarice</title>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="/js/homeslideshow.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
        crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
         crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
         crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
        crossorigin="anonymous"></script>

<script>
function updateCartItem(obj,id){
    $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
        if(data == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>
</head>
<body>
<header style="height:82px;width:100%;background-color:#6d5454;">
<a href="index.php">
                    <img style=" height: 75px; width: 130px; margin-left:23px; margin-top:3px;" src="slike/slika4.jpeg">
                </a>
</header>
<div class="container">
    <h1 style="text-align:center;">Shopping košarica</h1>
    <div class="row" style="width:1100px;">
        <div class="cart" style="width:1100px;">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="45%">Proizvod</th>
                                <th width="10%">Cijena</th>
                                <th width="15%">Količina</th>
                                <th class="text-right" width="20%">Ukupno</th>
                                <th width="10%"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($cart->total_items() > 0){ 
                                // dohvari kosaricine stvari iz sesije 
                                $cartItems = $cart->contents(); 
                                foreach($cartItems as $item){ 
                            ?>
                            <tr>
                                <td><?php echo $item["name"]; ?></td>
                                <td><?php echo ''.$item["price"].' KM'; ?></td>
                                <td><input class="form-control" type="number" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"/></td>
                                <td class="text-right"><?php echo ''.$item["subtotal"].' KM'; ?></td>
                                <td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Jeste li sigurni?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;"><i class="itrash"></i> X</button> </td>
                            </tr>
                            <?php } }else{ ?>
                            <tr><td colspan="5"><p>Vaša košarica je prazna</p></td>
                            <?php } ?>
                            <?php if($cart->total_items() > 0){ ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Ukupno u košarici</strong></td>
                                <td class="text-right"><strong><?php echo ''.$cart->total().' KM'; ?></strong></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="index.php" class="btn btn-block btn-light">Nastavite kupovati</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <?php if($cart->total_items() > 0){ ?>
                        <a href="checkout.php" class="btn btn-lg btn-block btn-primary" style="background-color:#6d5454; border:none;">Provjera</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
