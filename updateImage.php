<?php
session_start();
if(isset($_POST['UpdatePhoto'])){
    $file = $_FILES['file'];
    $username = $_SESSION['userName'];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    $fileName = $_FILES['file']['name'];
    $fileTmpLocation = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExtension = explode('.',$fileName);
    $fileRealExt = strtolower(end($fileExtension));
    echo $fileRealExt;

    $extensions = array('jpg','jpeg','png');

    if(in_array($fileRealExt, $extensions)){
        if($fileError === 0){
            if($fileSize < 3000000){

                updateImage($conn,$fileName,$username);

                $fileDestination = "photos/".$fileName;
                move_uploaded_file($fileTmpLocation,$fileDestination);
                header("location: index.php?successfulUpdating");
            }
            else{
                echo"Your file is too big.";
            }
        }
        else{
            echo" Error occurred with updating your photo.";
        }
    }
    else{
        echo" Choose a photo of another type.";
    }
}