<?php
session_start();

$ime = "";
$prezime = "";
$email    = "";
$errors = array();

$con=mysqli_connect('localhost:3306', 'fpmoz112019', 'csdigital2019', 'fpmoz112019');

if(!$con){
    die('Conection failed : ' .mysqli_connect_error());
}
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $ime = mysqli_real_escape_string($con, $_POST['ime']);
    $prezime = mysqli_real_escape_string($con, $_POST['prezime']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $lozinka_1 = mysqli_real_escape_string($con, $_POST['lozinka_1']);
    $lozinka_2 = mysqli_real_escape_string($con, $_POST['lozinka_2']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($ime)) { array_push($errors, "Ime je potrebno"); }
    if (empty($prezime)) { array_push($errors, "Prezime je potrebno"); }
    if (empty($email)) { array_push($errors, "Email je potreban"); }
    if (empty($lozinka_1)) { array_push($errors, "Lozinka je potrebna"); }
    if ($lozinka_1 != $lozinka_2) {
      array_push($errors, "Lozinke nisu iste");
    }
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $korisnik_check_query = "SELECT * FROM korisnik WHERE ime='$ime' OR email='$email' LIMIT 1";
    $result = mysqli_query($con, $korisnik_check_query);
    $korisnik = mysqli_fetch_assoc($result);
    
    if ($korisnik) { // if user exists
      if ($korisnik['ime'] === $ime) {
        array_push($errors, "Username already exists");
      }
  
      if ($korisnik['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $lozinka = ($lozinka_1);//encrypt the password before saving in the database
  
        $query = "INSERT INTO korisnik (ime,prezime, email, lozinka) 
                  VALUES('$ime','$prezime', '$email', '$lozinka')";
        mysqli_query($con, $query);
        $_SESSION['ime'] = $ime;
        $_SESSION['success'] = "";
        header('location: index.php');
    }
  }
  

if (isset($_POST['login_user'])) {
    $ime = mysqli_real_escape_string($con, $_POST['ime']);
    $lozinka = mysqli_real_escape_string($con, $_POST['lozinka']);
  
    if (empty($ime)) {
        array_push($errors, "Ime je potrebno");
    }
    if (empty($lozinka)) {
        array_push($errors, "Lozinka je potrebna");
    }
  
    if (count($errors) == 0) {
        $lozinka = ($lozinka);
        $query = "SELECT * FROM korisnik WHERE ime='$ime' AND lozinka='$lozinka'";
        $results = mysqli_query($con, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['ime'] = $ime;
          $_SESSION['success'] = "";
          header('location: index.php');
        }else {
            array_push($errors, "Pogrešno ime ili lozinka");
        }
    }
  }
  
?>

