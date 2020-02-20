
<?php 
session_start()
?>

<!DOCTYPE html>
<html>
 <head>
        <title>Admin naslovnica</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body class="home-welcome-text">
 <?php
    $link = mysqli_connect("localhost", "root", "", "cosmetic");
?>
  <div class="homepageheader" style="position: inherit;">
      <button class="logout" style="color:white;"><a href="adminlogin.php" style="color:white;">Odjava</a></button>
            <div style="float: left; margin: 5px 0px 0px 23px;">
                <a href="index.php">
                    <img style=" height: 75px; width: 130px;" src="slike/slika4.jpeg">
                </a>
           </div>
  </div>
   
     <div class="admin">
     <form action="" method="POST">
                        <div class="h2" style="color:black;">
                        <h3>Dodavanje novog proizvoda</h3>
                        </div>
                        <input placeholder="Naziv" type="text" name="naziv" required>
                        <input placeholder="Opis" type="text" name="opis" required>
                        <input type="file" name="slika" accept="image/*">
                        <button type="submit" value="submit" name="submit" class="btt">Dodaj proizvod</button>
                        <?php
                        if(isset($_POST['submit'])){
                            $insert_query = "INSERT INTO 
                            proizvod (  slika,
                                            naziv,
                                            opis)
                                            
                            VALUES (        'img/".$_POST['slika']."',
                                            '".$_POST["naziv"]."',
                                            '".$_POST["opis"]."')";
                            mysqli_query($link,$insert_query);}
                        ?>
                    </form>


    
     </div>
     



    </body>

</html>