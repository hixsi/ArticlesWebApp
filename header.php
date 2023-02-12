<?php
session_start();
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="profile.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
<div class="topnav">


    <?php
    if(isset($_SESSION["userName"])){

        echo "<a href = 'logout.inc.php'> Log out </a>";
        echo "<a href = 'index.php'> Profile </a>";
    }
    else{

        echo "<a href = 'login.php'> Log in </a>";
        echo  "<a href=\"index.php\"> Home </a>";
    }

    ?>


</div>