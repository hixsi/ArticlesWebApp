<?php

require_once('dbh.inc.php');

if (isset($_POST['createArticle'])) {
//    extract($_POST);

    $title = $_POST['title'];
    $content = $_POST['content'];

    $file = $_FILES['file'];

    print($_POST);
//    $dir = 'article_images/';
//
//
//   extract($_POST);
//
//    $tmp_file = $_FILES['file']['tmp_name'];
//    if(!is_uploaded_file($tmp_file)){
//        exit('Image is not uploaded. Choose an image.');
//    }
//
//    $file_type = $_FILES['file']['type'];
//
//    if(!strstr($file_type,'jpeg')&&!strstr($file_type,'png')){
//        exit("File type should be jpeg or png.");
//    }
//    $image_name = time().'.jpg';
//    if(!move_uploaded_file($tmp_file,$dir.$image_name)){
//        exit();
//    }


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
            if($fileSize < 1000000){



                $sql = "INSERT INTO articles (title,content,image) VALUES (?,?,?);";

                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    exit("Statement failed");
                }
                mysqli_stmt_bind_param($stmt,"sss",$title,$content,$fileName);
                mysqli_stmt_execute($stmt);


                mysqli_stmt_close($stmt);

                $fileDestination = "article_images/".$fileName;
                move_uploaded_file($fileTmpLocation,$fileDestination);

                header("location: upload_article.php");
            }
            else{
                echo"Your file is too big.";
            }
        }
        else{
            echo" Error occurred with the uploaded photo.";
        }
    }
    else{
        echo" Choose an image of another type.";
    }





//    $save_file = $conn->prepare('INSERT INTO articles(title,content,image) VALUES (?,?,?)');
//    $save_file->execute(array($title,$content,$image_name));

//    $stmt = $conn->prepare('INSERT INTO articles(title,content,image) VALUES (?,?,?)');
//    $stmt -> bind_param("sss", $title,$content,$image_name);
//    $stmt->execute();
//
//
//    $stmt->close();
}


