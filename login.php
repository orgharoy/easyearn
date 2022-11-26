<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/login.css">
    <title>easyEARN | Login</title>
</head>

<body>
    <div class="hero">
        <div class="main">
            <div class="logo">
                <a href="index.php"><img class="logo-image" src="images/easyEARN-logo.png" alt="easyEARN logo"></a>
            </div>
            <div class="content">
                <form action="backend/db_login.php" method="POST">
                    <input class="input" name="email" type="text" placeholder="Email Address" required>
                    <input class="input" name="password" type="password" placeholder="Password" required>
                    <button class="button" name="login-button">Log In</button>


                    <div class="error-message">
                        <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyField") {
                                echo "<p class='error'>Fill in all fields</p>";
                            } else if ($_GET["error"] == "noUser") {
                                echo "<p class='error'>User does not exist</p>";
                            } else if ($_GET["error"] == "incorrectLogin") {
                                echo "<p class='error'>Email or Password do not match</p>";
                            } else if ($_GET["error"] == "success") {
                                echo "<p class='no-error'>You have signed up successfully! <br> Log in now access your account!</p>";
                            }
                        }
                        ?>
                    </div>


                    <div class="bottom-texts">
                        <div class="no-account">
                            <p>Dont have an account?</p> <span class="login-span"> <a class="sign-up" href="signup.php">Sign Up</a> </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>