<?php
session_start();

$con = mysqli_connect('localhost', 'root','', 'cosmetic' );
if($con){
    echo "Uspješno!";
}else{
    echo "Neuspješno..";
}
$db = mysqli_select_db($con, 'cosmetic');

if(isset($_POST['submit'])){
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT * from admintable where user = '$username' and pass = '$password'";

    $query = mysqli_query($con, $sql);

        if(mysqli_num_rows($query) == 1){
            echo "Uspješna prijava";
            $_SESSION['user'] = $username;
            header('location:adminpage.php');
        }else{
            array_push($errors, "Pogrešno ime ili lozinka");
            header('location:adminlogin.php');
        }
    }


?>