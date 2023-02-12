
<?php
include_once('header.php');
?>
<div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">

                    <form id="login-form" class="form" action="login.inc.php" method="post">
                        <h3 class="text-center text-info">Sign in</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Sign in">
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="register.php" class="text-info">I don't have account. Sign up here.</a>
                        </div>
                    </form>

                    <?php
                    if(isset($_GET["error"])){

                        if($_GET["error"] == "emptyField"){
                            echo '<div style="padding: 10px; margin: 10px; background-color: #cc0000; color: white;">  Fill all fields.</div> ';
                        }

                        if($_GET["error"] == "wrongLogin"){
                            echo '<div style="padding: 10px; margin: 10px; background-color: #cc0000; color: white;">  Incorrect username or password.</div> ';
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