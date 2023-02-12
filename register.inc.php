<?php
if(isset($_POST["submit"])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if(emptyFields($username,$email,$password)!== false){
        header("location: register.php?error=emptyField");
        exit();

    }
    if(invalidUserName($username)!== false){
        header("location: register.php?error=invalidUsername");
        exit();
    }

    if(invalidEmail($email)!== false){
        header("location: register.php?error=invalidEmail");
        exit();

    }
    if(userExists($conn,$username,$email)!== false){
        header("location: register.php?error=usernameTaken");
        exit();

    }

    createuser($conn, $username, $email, $password);

}
else {
    header("location:register.php");
    exit();
}
?>