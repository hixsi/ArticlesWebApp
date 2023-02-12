<?php
include_once('header.php');
?>

<div id="login">
    <h3 class="text-center text-white pt-5">Register form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="register.inc.php" method="post">
                        <h3 class="text-center text-info">Sign up</h3>
                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">

                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Sign up">
                        </div>
                        <div id="register-link" class="text-right">
                            <br>
                            <a href="login.php" class="text-info">I have an account already.</a>
                        </div>
                    </form>

                    <?php
                    if(isset($_GET["error"])){

                        if($_GET["error"] == "emptyField"){
                            echo '<div style="padding: 10px; margin: 10px; background-color: #cc0000; color: white;">  Fill all fields.</div> ';
                        }

                        if($_GET["error"] == "invalidEmail"){
                            echo '<div style="padding: 10px; margin: 10px; background-color: #cc0000; color: white;">  Email is invalid.</div> ';

                        }
                        if($_GET["error"] == "invalidUsername"){
                            echo '<div style="padding: 10px; margin: 10px; background-color: #cc0000; color: white;">  Username is invalid.</div> ';

                        }
                        if($_GET["error"] == "stmtfailed"){
                            echo '<div style="padding: 10px; margin: 10px; background-color: #cc0000; color: white;">  Something is wrong with the page.</div> ';

                        }
                        if($_GET["error"] == "usernameTaken"){
                            echo '<div style="padding: 10px; margin: 10px; background-color: #cc0000; color: white;">  Username is already taken.</div> ';

                        }
                        if($_GET["error"] == "none"){
                            echo '<div style="padding: 10px; margin: 10px; background-color: #66cc00; color: white;"> You have successfully signed up</div> ';

                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
