<script>
    var myEditableElement = document.getElementById('phone');
    myEditableElement.addEventListener('input', function() {
        console.log('An edit input has been detected');
        console.log(myEditableElement.innerHTML);
    });
</script>


<?php
include_once('header.php');



if(isset($_SESSION["userName"])){


echo ' <div class="wrapper">
    <div class="left">

        <img src="'.$_SESSION["userImage"].'"
             name="userImage" width="100">

        <h4>'.$_SESSION["userName"].'</h4>
        <p>user</p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Profile info</h3>
            <div class="info_data">
                <div class="data">
                    <h4>Email</h4>
                    <p>'.$_SESSION["userEmail"].'</p>
                </div>
                <div class="data">
                    <h4>Phone number</h4>
                    <p>08000000000</p>
                </div>
            </div>
        </div>

        <div class="settings">
            <h4>Settings</h4>
            <div class="settings_data">
            <div class="data">
            <h4>Change password</h4>
             <form id="change-password-form" class="form" action="settings.inc.php" method="post">
                 <div class="form-group">
                        <input type="text" name="password" id="password" class="form-control">
                 </div>
                  <div class="form-group">

                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                        </div>
              </form>
              </div>
                <div class="data">

                 <h4>Update profile photo</h4>
                <form id="change-image-form" class="form" action="updateImage.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                 <input type="file" name="file">
                 </div>

                 <div class="form-group">
                 <input type="submit" name="UpdatePhoto" class="btn btn-info btn-md" value="Update">
                 </div>
                 </form>

                </div>
            </div>
        </div>


    </div>
</div> ';

}
?>


</body>
</html>

