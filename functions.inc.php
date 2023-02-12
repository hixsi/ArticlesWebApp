<?php

function emptyFields($username,$email,$password){
    $result = true;
    if(empty($username)||empty($email)|| empty($password)){
        $result = true;
        }
    else{
        $result = false;
        }
    return $result;
}


function invalidUserName($username){
    $result = true;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function invalidEmail($email){
    $result = false;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function userExists($conn,$username, $email){


    $stmt = $conn -> prepare( "SELECT * FROM users WHERE userName = ? OR userEmail = ? ");

    $stmt -> bind_param("ss",  $username,$email);
    $stmt->execute();

    $result = $stmt->get_result();
    if($row = $result->fetch_assoc()){
        return $row;
    }
    else{
        $result=false;
        return $result;
    }
    $stmt->close();
}


function createUser($conn,$username, $email, $password){



    $stmt = $conn -> prepare( "INSERT INTO users (userName, userEmail,userPwd,userImage) VALUES (?,?,?,?)");

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $userimage = "profile_photo.jpg";

    $stmt -> bind_param("ssss", $username,$email,$hashedPassword,$userimage);
    $stmt->execute();


    $stmt->close();

    header("location: register.php?error=none");
}

function emptyFieldsLogin($username,$password){
    $result = true;
    if(empty($username)|| empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn,$username,$password){
    $userExists = userExists($conn,$username,$username);

    if($userExists === false){
        header("location: login.php?error=wrongLogin");
            exit();
    }

    $hashedPassword = $userExists["userPwd"];
    $checkPassword = password_verify($password,$hashedPassword);
    if($checkPassword === false){
        header("location: login.php?error=wrongLogin");
            exit();
    }
    else if($checkPassword === true){
        session_start();
        $_SESSION['userId'] = $userExists["userId"];
        $_SESSION['userName'] = $userExists["userName"];
        $_SESSION['userEmail'] = $userExists["userEmail"];
        $_SESSION['userImage'] = $userExists["userImage"];
        header("location: index.php");
        exit();
    }
}


function changePassword($conn, $username, $password){

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET userPwd='".$hashedPassword. "' WHERE userName='".$username."'";
    mysqli_query($conn,$sql);


    mysqli_close($conn);
    header("location: index.php?error=none");
}

function emptyFieldsSettings($password){
    $result = true;
    if(empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function updateImage($conn,$imagename,$username){
    $sql = "UPDATE users SET userImage='".$imagename. "' WHERE userName='".$username."'";
    mysqli_query($conn,$sql);


    mysqli_close($conn);

    $_SESSION["userImage"] = $imagename;
    header("location: index.php?error=none");
}