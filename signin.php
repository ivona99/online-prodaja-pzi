<?php include "config.php" ; 
?>
<!DOCTYPE html>
<html>
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
        
           <div class="header" style="margin-left:725px;">
              <h2>Izradite novi korisnički račun</h2>
           </div>
  
            <form method="post" action="signin.php" style="margin-left:500px;">
               <?php include('errors.php'); ?>
               <div class="form-group">
                 <label for="ime">Ime: </label>
                 <input type="text" class="form-control" name="ime" required maxlength="80" value="<?php echo $ime; ?>">
               </div> 
               <div class="form-group">
                 <label for="prezime">Prezime: </label>
                 <input type="text" class="form-control" name="prezime"  required maxlength="80" value="<?php echo $prezime; ?>">
                </div>

                <div class="form-group">
                 <label for="email">Email: </label>
                 <input type="email" class="form-control" name="email" required maxlength="80" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                 <label for="password">Lozinka: </label>
                 <input type="password" class="form-control" name="lozinka_1">
                </div>
                <div class="form-group">
                 <label for="confirmpassword">Ponovite lozinku: </label>
                 <input type="password" class="form-control" name="lozinka_2">
                </div>
                <div class="form-group">
                      <button type="submit" class="btt" name="reg_user">Registriraj me</button>
                </div>
                  <br/>
                  
               <p style="text-align:center; color:white;">
                  Već ste registrirani? <a href="login.php">Prijava</a></p>
            </form>
      </div>
 </body>
</html>
