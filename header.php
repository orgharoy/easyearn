<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/createjob.css">
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="stylesheet" href="styles/editprofile.css">
    <link rel="stylesheet" href="styles/job.css">
    <link rel="stylesheet" href="styles/myjobs.css">
    <link rel="stylesheet" href="styles/applications.css">
    <link rel="stylesheet" href="styles/footer.css">
    <title>easyEARN</title>
</head>

<body>
    <! -- Navigation -->

        <section class="navigation">
            <div class="container">
                <div class="nav">

                    <a href="index.php"><img class="logo" src="images/easyEARN-logo.png" alt=""></a>

                    <div class="main-nav">
                        <i class="fa-solid fa-xmark close-button"></i>
                        <ul>
                            <li class="animate"><a href="index.php">Home</a></li>
                            <?php
                            if (isset($_SESSION["userid"])) {
                                echo "<li class='animate' ><a href='createjob.php'>Create A Job</a></li>";
                                echo "
                                    <li class='big-screen'>
                                        <div class='dropdown'>
                                            <a class='dropbtn'>" . $_SESSION['userName'] . " <i class='fa-solid fa-caret-down'></i> </a>
                                            <div class='dropdown-content'>
                                                <a href='profile.php?id=" . $_SESSION['userid'] . "'>View Profile</a>
                                                <a href='editprofile.php'>Edit Profile</a>
                                                <a href='myjobs.php'>Jobs Created</a>
                                                <a href='applied.php'>Applied To</a>
                                                <a href='backend/db_logout.php'>Log Out</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class='animate small-screen'><a href='profile.php?id=" . $_SESSION['userid'] . "'>View Profile</a></li>
                                    <li class='animate small-screen'><a href='editprofile.php'>Edit Profile</a></li>
                                    <li class='animate small-screen'><a href='myjobs.php'>Jobs Created</a></li>
                                    <li class='animate small-screen'><a href='applied.php'>Applied To</a></li>
                                    <li class='animate small-screen'><a href='backend/db_logout.php'>Log Out</a></li>
                                ";
                            } else {
                                echo "<div class='big-screen sign-button'><a class='btn-primary' href='signup.php'>Sign Up</a> </div>";
                                echo "<div class='big-screen log-button'><a class='login-button' href='login.php'>Log In</a> </div>";
                                echo "<a class='animate small-screen' href='signup.php'>Sign Up</a>";
                                echo "<a class='animate small-screen' href='login.php'>Log In</a>";
                            }
                            ?>

                        </ul>
                    </div>

                    <div class="mobile-notifications">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
            </div>
        </section>
        <! -- Navigation -->