<?php
session_start();
if(isset($_POST["submit"])){

    $password = $_POST['password'];
    $username = $_SESSION['userName'];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if(emptyFieldsSettings($password)!== false){
        header("location: index.php?error=emptyField");
        exit();

    }

    changePassword($conn, $username, $password);

}
else {
    header("location:index.php");
    exit();
}
?>