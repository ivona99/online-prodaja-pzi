<?php include ( "config.php" ); ?>

<!doctype html>
<html>
    <head>
        <title>Prijava</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body class="home-welcome-text"style="background-image: url(slike/slika5.jpeg);">
    <div class="homepageheader" style="position: inherit;">
            <div style="float: left; margin: 5px 0px 0px 23px;">
                <a href="index.php">
                    <img style=" height: 75px; width: 130px;" src="slike/slika4.jpeg">
                </a>
            </div>
            
        </div>
            <div class="container">
                <div>
                    <div>
                        <div class="signupform_content">
                           

                <div class="header">
                   <h2>Prijava</h2>
                </div> 
               
                 <form method="post" action="login.php">
                 <?php include('errors.php'); ?>
                  <div class="form-group">
                     <label for="ime">Ime: </label>
                     <input type="text" class="form-cont" name="ime" >
                  </div>
                 <div class="form-group">
                     <label for="password">Lozinka: </label>
                     <input type="password" class="form-cont" name="lozinka">
                 </div>
                 <div class="form-group">
                      <button type="submit" class="btt" name="login_user">Prijavi me</button>
                 </div>
                    <br/>
                    <br/>
                 <p style="text-align:center; color:white" ;>
                   Još niste registrirani? <a href="signin.php">Registracija</a> </p>
             </div>             
    </body>
</html>