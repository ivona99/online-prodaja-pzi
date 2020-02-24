<?php include "config.php";?>
<?php 
include_once 'cart.class.php'; 
$cart = new Cart; 

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['ime']);
    header("location: index.php");
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dobrodošli u Anthos</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <div class="content">
      <!-- notification message -->
       <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
   <?php endif ?>
  
   </div>
    <body>
    <header>
         <div class="homepageheader"> 
         <?php if( isset($_SESSION['ime']) && !empty($_SESSION['ime']) )
           {
          ?>
          <button class="logout" style="color:white;"><a href="index.php?logout='1'" style="color:white;">Odjava</a></button>
          <button class="logout" style="color:white;"><a href="viewCart.php" style="color:white;">Košarica</a></button>
            <?php }else{ ?>
          <button class="signin" style="color:white;"><a href="signin.php" style="color:white;">Registracija</a></button>
          <button class="login" style="color:white;"><a href="login.php" style="color:white;">Prijava</a></button>
           
            
             <?php } ?>    
         <div class="logo">
             <a href="index.php">
                  <img style=" height: 75px; width: 130px;" src="slike/slika4.jpeg">
              </a>
          </div>

          <nav clas="izb">
              <ul>
                  <li><a href="index.php" ><i class="fa fa-home"></i> Naslovnica</a></li>
                  <li><a href="#proizvodi" ><i class="fas fa-caret-right"></i> Proizvodi</a></li>
                  <li><a href="#onama" ><i class="fab fa-adn"></i> O nama</a></li>
                  <li><a href="#kontakt" ><i class="fa fa-envelope"></i> Kontakt</a></li>
                  <li><a href="adminlogin.php" ><i class="fa fa-gear"></i> Admin</a></li>

              </ul>
            </nav>
      </header>
        
      </div>
       
       
         
       
        <div class="home-welcome">
            <div class="home-welcome-text" style="background-image: url(slike/slika6.png); height: 380px; ">
                <h1 style="margin: 0px;">Dobrodošli u Anthos</h1>
                <h2>Prodaja prirodne kozmetike</h2>
            </div>
        </div>

        <div class="onama" id="onama"></br></br></br></br>
       
        <div class="row">
              <div class = "column">
                       <div class= "column-left">
                           <img style =" width:400px; height: 500px;" src="slike/slika8.jpg"></br></br></br></br></br></br>
                          
                        </div>
                        
                             
                 </div>
            <div class="row">
            <div class="column-right">
                <h3 style="text-align:center;" >O nama</h3>
                <p class="anthos">Anthos je jednostavan način kako da dođete do sigurnih,prirodnih i ručno rađenih 
                  proizvoda za njegu vaše </br>kože. Mi se samo brinemo da ono što nam priroda već daje
                  dođe do vas u najčišćem i najjednostavnijem </br>obliku, tako da ste kroz našu kozmetiku 
                  zaštićeni od parabena, umjetnih bojila i konzervansa. Najveći luksuz</br> koji sebi možete 
                  priuštiti je netaknuta priroda i njezini darovi u bilo kojem obliku. Zamislite što se 
                  događa</br> kada svoju kožu hranite moćnim i pomno biranim sastojcima iz prirode. Vaša koža
                  ponovno diše, postaje nahranjena, hidratizirana, riješava se svih sitnih nedostataka 
                  bez da razmišljate jeste li unijeli neku supstancu </br>koja dugoročnom upotrebnom može nanijeti
                  štetu vašem zdravlju. </br>
                  Nitko od nas neće svjesno trovati sebe niti svoje najmilije, ali da li se zapitate što to sve
                  unosite u organizam zapakirano u očaravajući miris i još primamljiviju ambalažu?
                  Koliko smo doista uštedjeli kupujući jeftine proizvode koje nam nameću trendovi?
                  Zar sami ne znamo koliko truda i novca košta npr. jedan zdrav i kvalitetan obrok s 
                  domaćim sastojcima, a zar nije isto tako i sa proizvodima koje stavljamo na svoju kožu?
                  Koža je naš najveći organ i sve što stavimo na nju dospijeva u naš organizam.Pročitajte 
                  još jedanput sastav svoje kreme koju trenutno koristite; da li u njoj ima nešto sumnjivo?
                  </br>Mi Vam donosimo čistu prirodu u ambalaži koju možete nositi svugdje sa sobom.
                  Više vam nije potrebna cijela</br> kupaonica kada krećete na put; sa naša tri osnovna proizvoda 
                  blistati ćete gdje god stignete!Zbog sadržaja i učinka linije proizvoda u koju je uloženo
                  vrijeme, znanje, trud, ali najviše od svega ljubav, vaša će koža dobiti svu potrebnu njegu, 
                  a vi ćete biti zadovoljni svojim novim, prirodno lijepim izgledom.Redovnim i ispravnim 
                  korištenjem proizvoda, koji ne sadrže niti jedan štetan sastojak, doći ćete do trenutka
                  kada će vam se u ogledalu osmjehnuti novo lice prirodne ljepote.

                </p>
               </div>
                        
               </div>
        </div>
        <div class="home-prodlist">
            <div id = "proizvodi"></br></br></br></br>
        
            <h3 style="text-align: center;">Proizvodi</h3>
            </div>
  <?php if( isset($_SESSION['ime']) && !empty($_SESSION['ime']) )
  
           {?>
          <div class="row">
          <?php
           $result = $con->query("SELECT * FROM proizvod ORDER BY id ASC"); 
           if($result->num_rows > 0){  
               while($row = $result->fetch_assoc()){ 
          ?>
          
          <div class="col-md-3">
          <form method="post" style="margin:auto 200px;">
          <div class="products">
          <img src="<?php echo $row["slika"] ?>" class="img-responsive"style="width:250px; height:300px;">
          <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" class="btn btn-primary" style="background-color:#6d5454; border:none;width:172px; height:44px;line-height:30px;">Dodaj u košaricu</a>
          </div>
          </form>
      </div>
  <?php 
               }
            }
        ?>
        
        </div> 
            <?php }else{ 
          ?>
<div class="row1">
            <div class="column1">
               <img src='slike/slika1.jpeg' alt="Tonik" style="width:100%">
               <!-- Button trigger modal -->
               <button type="button" class="btt" data-toggle="modal" data-target="#exampleModal1">Golden Facial Tonic</button>
               <!-- Modal -->
                  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Golden Facial Tonic</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                       <div class="modal-body">
                            <div class="rowmod">
                               <div class = "columnmod">
                                  <div class= "columnmod-left">
                                    <img style =" width:150px; height: 300px;" src="slike/slika1.jpeg"></br></br></br></br></br></br>
                          
                                    </div>
                        
                             
                                 </div>
                             
                              <div class="rowmod">
                                 <div class="columnmod-right">
                              
                                   <p class="columnmod-tekst">
                                     <ul>
                                       <li>
                                         <h2 style="font-size:13px">Opis:</h2>
                                         <span style="font-size:12px">-Tonik na bazi smilja.</br> -Poboljšava tonus kože.</br>-Čisti vaše lice.
                                         </br>-Pomaže pri hidraciji suhe kože.</br>
                                           -Pomaže pri umanjenju podočnjaka i regenerira kožu.</br>-Uklanja tragove 
                                           kamenca iz kože koji isušuju kožu i stvaraju osjećaj zatezanja.</br></span>
                                       </li>
                                       <li>
                                          </br>
                                         <h2 style="font-size:13px">Cijena:</h2>
                                         <span style="font-size:12px">20.00KM</span>
                                       </li>
                                     </ul>

                                   </p>
                                   </div>
                        
                               </div>
                            </div>
                          </div>
                       <div class="modal-footer">
                          <button type="button" class="btt" data-dismiss="modal">Zatvori</button>
                          <script>$(function () {
  $('[data-toggle="popover"]').popover()
})</script>
                          <button type="button" class="btn btn-secondary" style="background-color:#6d5454; width:88px;
    height:44px; border-radius:0;" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Morate se registrirati/prijaviti">
                          <i class="fa fa-shopping-cart"></i> Kupi</button>
                          
                       </div>
                       </div>
                     </div>
                   </div>
            </div>
            <div class="column1">
                <img src="slike/slika2.jpeg" alt="Dnevna" style="width:100%">
                <!-- Button trigger modal -->
               <button type="button" class="btt" data-toggle="modal" data-target="#exampleModal2">Daily Cream</button>
               <!-- Modal -->
                  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Daily Cream</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                       <div class="modal-body">
                       <div class="rowmod">
                               <div class = "columnmod">
                                  <div class= "columnmod-left">
                                    <img style =" width:150px; height: 300px;" src="slike/slika2.jpeg"></br></br></br></br></br></br>
                          
                                  </div>                           
                                 </div>
                             
                              <div class="rowmod">
                                 <div class="columnmod-right">
                              
                                   <p class="columnmod-tekst">
                                     <ul>
                                       <li>
                                         <h2 style="font-size:13px">Opis:</h2>
                                         <span style="font-size:12px">-30ml, prirodna i bez štetnih sastojaka.</br>
                                         -Zdrava i njegovana koža bez iritacija,blistav ten.</br>
                                         -Prekrasne teksture na bazi smilja.</br>
                                         -Smilje je eliksir mladosti.</br>Jedinstvena kombinacija koja 
                                          koži lica daje dubinsku njegu, hidrataciju, mekoću i svježinu.</br>
                                         -Jamči bogatu njegu.</br>
                                           </span>
                                       </li>
                                       <li>
                                          </br>
                                         <h2 style="font-size:13px">Cijena:</h2>
                                         <span style="font-size:12px">37.00KM</span>
                                       </li>
                                     </ul>

                                   </p>
                                   </div>
                        
                               </div>
                            </div>
                       </div>
                       <div class="modal-footer">
                          <button type="button" class="btt" data-dismiss="modal">Zatvori</button>
                          <script>$(function () {
  $('[data-toggle="popover"]').popover()
})</script>
                          <button type="button" class="btn btn-secondary" style="background-color:#6d5454; width:88px;
    height:44px; border-radius:0;" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Morate se registrirati/prijaviti">
                          <i class="fa fa-shopping-cart"></i> Kupi</button>
                       </div>
                       </div>
                     </div>
                   </div>
            </div>
            <div class="column1">
                <img src="slike/slika3.jpeg" alt="Nocna" style="width:100%">
                <!-- Button trigger modal -->
               <button type="button" class="btt" data-toggle="modal" data-target="#exampleModal3">Night Repair Cream</button>
               <!-- Modal -->
                  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Night Repair Cream</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                       <div class="modal-body">
                       <div class="rowmod">
                               <div class = "columnmod">
                                  <div class= "columnmod-left">
                                    <img style =" width:150px; height: 300px;" src="slike/slika3.jpeg"></br></br></br></br></br></br>
                          
                                  </div>                           
                                 </div>
                             
                              <div class="rowmod">
                                 <div class="columnmod-right">
                              
                                   <p class="columnmod-tekst">
                                     <ul>
                                       <li>
                                         <h2 style="font-size:13px">Opis:</h2>
                                         <span style="font-size:12px">-Koža postaje meksa i njegovanija.</br>
                                         -Namijenjena je intenzivnoj i dubinskoj njezi kože tijekom sna.</br>
                                         -Sastojci koji hrane i regeneriraju kožu.</br>-Umiruje lice.</br>
                                         -Pospješuje cirkulaciju u koži lica.</br>-Pomaže koži lica da povrati elastičnost.</br>
                                           </span>
                                       </li>
                                       <li>
                                          </br>
                                         <h2 style="font-size:13px">Cijena:</h2>
                                         <span style="font-size:12px">40.00KM</span>
                                       </li>
                                     </ul>

                                   </p>
                                   </div>
                        
                                   </div>
                            </div>
                       </div>
                       <div class="modal-footer">
                          <button type="button" class="btt" data-dismiss="modal">Zatvori</button>
                          <script>$(function () {
  $('[data-toggle="popover"]').popover()
})</script>
                          <button type="button" class="btn btn-secondary" style="background-color:#6d5454; width:88px;
    height:44px; border-radius:0;" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Morate se registrirati/prijaviti">
                          <i class="fa fa-shopping-cart"></i> Kupi</button>
                       </div>
                       </div>
                     </div>
                   </div>
                </div>
                  <?php   } ?> 
       </div>
       </br></br>
        
        <div >
            <div class = "kontakt-area" id = "kontakt">
                
                       <div class = "col2-tekst">
                          </br></br>
                           <h2>KONTAKTIRAJTE NAS</h2>
                           <p>Obratite nam se za bilo kakve informacije.</p>
                       </div>
             </div>

           <div class="row2">
              <div class = "column2">
                       <div class= "column2-left">
                           <img style=" height: 75px; width: 130px;" src="slike/slika4.jpeg">
                           <p> Autentična, jedinstvena i prirodna. </br>Anthos je prirodan dodatak 
                           vašoj </br>ljepoti koji vam pruža luksuznu njegu </br>kakvu vaša 
                          koža i zaslužuje.</p>
                        </div>
                        
                             
            </div>
            <div class="row2">
                   <div class="column2-right">
                     <h3></br>ANTHOS prirodna kozmetika</h3>
                     <div class= "kont-podaci">
                              <ul>
                                  <li>
                                     <div class="podaci">
                                         <i class="fa fa-home"></i>
                                         <h4>Adresa</h4>
                                         <span>Dubrovačka ulica bb.,Mostar,BIH</span>
                                      </div> 
                                   </li>
                                    </br>
                                  <li>
                                     <div class="podaci">
                                         <i class="fa fa-plane"></i>
                                         <h4>Email</h4>
                                         <span> info@anthos.com</span>
                                      </div> 
                                   </li>
                                   </br>
                                  <li>
                                     <div class="podaci">
                                         <i class="fa fa-phone"></i>
                                         <h4>Telefon</h4>
                                         <span> +999888 </span>
                                     </div> 
                                   </li>   
                                   </br>

                                </ul> 
                         </div>
                  
                    </div>
               </div>
            </div>
            




        </div> 
        <hr class=h>
          <div class="footer">
             <p> Ivona Škobić, Ivona Lozić, Helena Zeko</p>
          </div>
  
                
    </body>
</html>
