<?php
include_once 'header.php';
include "backend/db_conn.php";

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
} else {
    $userId = $_GET["id"];

    $sql = "SELECT * FROM users WHERE user_id = " . $userId . ";";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) < 1) {
        header("Location: index.php");
        exit();
    }

    $row = mysqli_fetch_assoc($query);
}
?>

<div class="hero container">
    <div class="profilepage">
        <div class="profileimgsec">
            <img class="profile-pic" src="images/profile-images/<?php echo $row['image'] ?>" alt="">
            <?php
            echo "<h1>" . $row['first_name'] . " " . $row['last_name'] . "</h1>";

            if (isset($_SESSION['userid']) && $_SESSION["userid"] == $row['user_id']) {
                echo ' <a class="btn-primary" href="editprofile.php">Edit Profile</a> ';
            }

            ?>
        </div>
        <div class="profiledesc">
            <div class="profileinfo">
                <div class="info">
                    <i class="fa-solid fa-envelope"></i>
                    <?php
                    echo "<p>" . $row['email_address'] . "</p>";
                    ?>
                </div>
                <div class="info">
                    <i class="fa-solid fa-phone"></i>
                    <?php
                    echo "<p>" . $row['phone_num'] . "</p>";
                    ?>
                </div>
                <div class="info">
                    <i class="fa-solid fa-cake-candles"></i>
                    <?php
                    echo "<p>" . $row['date_of_birth'] . "</p>";
                    ?>
                </div>
                <div class="info">
                    <i class="fa-solid fa-venus-mars"></i>
                    <?php
                    echo "<p>" . $row['gender'] . "</p>";
                    ?>
                </div>
            </div>
            <div class="profileabout">
                <?php
                if (!$row['about_me']) {
                    echo "<p>Write a short description of yourself to attract more people</p>";
                } else {
                    echo "<p>" . $row['about_me'] . "</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>