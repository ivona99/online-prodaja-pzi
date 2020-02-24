<?php 
// inicijalizacija klase  
require_once 'cart.class.php'; 
$cart = new Cart; 
 
 
require_once 'config.php'; 
  
$redirectLoc = 'index.php'; 
 
//odradi zahtjev baziran na odredjenoj akciji 
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){ 
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){ 
        $productID = $_REQUEST['id']; 
         
        // dohvati detalje o proizvodu  
        $query = $con->query("SELECT * FROM proizvod WHERE id = ".$productID); 
        $row = $query->fetch_assoc(); 
        $itemData = array( 
            'id' => $row['id'], 
            'name' => $row['naziv'], 
            'price' => $row['cijena'], 
            'qty' => 1 
        ); 
         
        // ubaci ih u kosaru 
        $insertItem = $cart->insert($itemData); 
         
        // prebaci na stranicu sa kosaricom 
        $redirectLoc = $insertItem?'viewCart.php':'index.php'; 
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){ 
        // azuriraj proizvod u kosari  
        $itemData = array( 
            'rowid' => $_REQUEST['id'], 
            'qty' => $_REQUEST['qty'] 
        ); 
        $updateItem = $cart->update($itemData); 
         
        // vrati status 
        echo $updateItem?'ok':'err';die; 
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){ 
        // ukloni proizvod iz kosare 
        $deleteItem = $cart->remove($_REQUEST['id']); 
         
        // prebaci na stranicu s kosarom 
        $redirectLoc = 'viewCart.php'; 
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0){ 
        $redirectLoc = 'checkout.php'; 
         
        // pohrani post podatke 
        $_SESSION['postData'] = $_POST; 
     
        $first_name = strip_tags($_POST['first_name']); 
        $last_name = strip_tags($_POST['last_name']); 
        $email = strip_tags($_POST['email']); 
        $phone = strip_tags($_POST['phone']); 
        $address = strip_tags($_POST['address']); 
         
        $errorMsg = ''; 
        if(empty($first_name)){ 
            $errorMsg .= 'Please enter your first name.<br/>'; 
        } 
        if(empty($last_name)){ 
            $errorMsg .= 'Please enter your last name.<br/>'; 
        } 
        if(empty($email)){ 
            $errorMsg .= 'Please enter your email address.<br/>'; 
        } 
        if(empty($phone)){ 
            $errorMsg .= 'Please enter your phone number.<br/>'; 
        } 
        if(empty($address)){ 
            $errorMsg .= 'Please enter your address.<br/>'; 
        } 
         
        if(empty($errorMsg)){ 
            //ubaci podatke korisnika u bazu  
            $insertCust = $con->query("INSERT INTO korisnik (ime, prezime, email, mobitel, adresa) VALUES ('".$first_name."', '".$last_name."', '".$email."', '".$phone."', '".$address."')"); 
             
            if($insertCust){ 
                $custID = $con->insert_id; 
                 
                // ubaci podatke o narudzbi u bazue 
                $insertOrder = $con->query("INSERT INTO narudzba (kupac_id, grand_total, created, status) VALUES ($custID, '".$cart->total()."', NOW(), 'u tijeku')"); 
             
                if($insertOrder){ 
                    $orderID = $con->insert_id; 
                     
                    // povrati cart proizvode 
                    $cartItems = $cart->contents(); 
                     
                    // sql statement za ubacivanje narudzbe  
                    $sql = ''; 
                    foreach($cartItems as $item){ 
                        $sql .= "INSERT INTO stavka_narudzbe (narudzba_id, proizvod_id, kolicina) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');"; 
                    } 
                     
                    // ubacivenje u bazu  
                    $insertOrderItems = $con->multi_query($sql); 
                     
                    if($insertOrderItems){ 
                        // Remove all items from cart 
                        $cart->destroy(); 
                         
                        // prebaci na status stranicu  
                        $redirectLoc = 'orderSuccess.php?id='.$orderID; 
                    }else{ 
                        $sessData['status']['type'] = 'error'; 
                        $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
                    } 
                }else{ 
                    $sessData['status']['type'] = 'error'; 
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
                } 
            }else{ 
                $sessData['status']['type'] = 'error'; 
                $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
            } 
        }else{ 
            $sessData['status']['type'] = 'error'; 
            $sessData['status']['msg'] = 'Please fill all the mandatory fields.<br>'.$errorMsg;  
        } 
        $_SESSION['sessData'] = $sessData; 
    } 
} 
 
// prebaci na specificnu stranicu  
header("Location: $redirectLoc"); 
exit();
