<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/signup.css">
    <title>easyEARN | Signup</title>
</head>

<body>
    <div class="hero">
        <div class="main">
            <div class="logo">
                <a href="index.php"><img class="logo-image" src="images/easyEARN-logo.png" alt="easyEARN logo"></a>
            </div>
            <div class="content">
                <form action="backend/db_signup.php" method="POST">
                    <div class="input-field">
                        <div class="input-with-label">
                            <p>First Name</p>
                            <input class="input" type="text" name="firstname" id="firstname" placeholder="First Name">
                        </div>
                        <div class="input-with-label">
                            <p>Last Name</p>
                            <input class="input" type="text" name="lastname" id="lastname" placeholder="Last Name">
                        </div>
                        <div class="input-with-label">
                            <p>Email Address</p>
                            <input class="input" type="email" name="emailaddress" id="emailaddress" placeholder="example@example.com">
                        </div>
                        <div class="input-with-label">
                            <p>Phone Number</p>
                            <input class="input" type="text" name="phonenumber" id="phonenumber" placeholder="+880XXXXXXXXXX">
                        </div>
                        <div class="input-with-label">
                            <p>Date of Birth</p>
                            <input class="input" id="dob" name="dob" type="date" max="2009-05-31">
                        </div>
                        <div class="input-with-label">
                            <p>Gender</p>
                            <select class="input" name="gender" id="gender">
                                <option value="">Select One</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Prefer Not To Say">Prefer Not To Say</option>
                            </select>
                        </div>
                        <div class="input-with-label">
                            <p>Password</p>
                            <input class="input" type="password" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="input-with-label">
                            <p>Confirm Password</p>
                            <input class="input" type="password" name="passwordRepeat" id="password" placeholder="Confirm Password">
                        </div>
                        <div class="btn-box">
                            <button class="button" name="signup">Create Account</button>
                        </div>
                    </div>

                    <div class="error-message">
                        <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyfield") {
                                echo "<p class='error'>Fill in all fields</p>";
                            } else if ($_GET["error"] == "invalidEmail") {
                                echo "<p class='error'>Enter a valid e-mail address</p>";
                            } else if ($_GET["error"] == "invalidNumber") {
                                echo "<p class='error'>Enter a valid phone number</p>";
                            } else if ($_GET["error"] == "shortPassword") {
                                echo "<p class='error'>Your password must be longer than 8 characters</p>";
                            } else if ($_GET["error"] == "missmatchPassword") {
                                echo "<p class='error'>Your passwords dont match</p>";
                            } else if ($_GET["error"] == "userExists") {
                                echo "<p class='error'>User already exists</p>";
                            } else if ($_GET["error"] == "sqlerror" || $_GET["error"] == "sqlentryerror") {
                                echo "<p class='error'>Something went wrong. Try again</p>";
                            } else if ($_GET["error"] == "none") {
                                echo "<p class='error'>You have signed up! Go back to the login page to access your account!</p>";
                            }
                        }
                        ?>
                    </div>
                    <div class="bottom-texts">
                        <div class="yes-account">
                            <p class="already">Already have an account?</p> <span> <a class="login" href="login.php">Go back to login</a> </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>