<?php
include_once 'header.php';
include 'backend/db_conn.php';

if (!$_SESSION['userid']) {
    header("Location: index.php");
    exit();
} else {

    $userId = $_SESSION['userid'];

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
    <div class="edit" id="blur">
        <?php
        echo "<h1>Edit Your Profile, " . $_SESSION['userName'] . "</h1>";
        ?>
        <form class="edit-form" action="backend/db_editprofile.php" method="POST" enctype="multipart/form-data">

            <div class="inputs">
                <label class="label" for="firstName">First Name:</label>
                <input class="input" id="firstName" name="firstName" type="text" value="<?php echo $row['first_name'] ?>">
            </div>

            <div class="inputs">
                <label class="label" for="lastName">Last Name:</label>
                <input class="input" id="lastName" name="lastName" type="text" value="<?php echo $row['last_name'] ?>">
            </div>

            <div class="inputs">
                <label class="label" for="email">Email Address:</label>
                <input class="input" id="email" name="email" type="email" value="<?php echo $row['email_address'] ?>">
            </div>

            <div class="inputs">
                <label class="label" for="phoneNumber">Phone Number:</label>
                <input class="input" id="phoneNumber" name="phoneNumber" type="text" value="<?php echo $row['phone_num'] ?>">
            </div>

            <div class="inputs">
                <label class="label" for="dob">Date of Birth:</label>
                <input class="input" id="dob" name="dob" type="date" max="2009-05-31" value="<?php echo $row['date_of_birth'] ?>">
            </div>

            <div class="inputs">
                <label class="label" for="gender">Gender:</label>
                <select class="input" name="gender" id="gender">
                    <option>Select One</option>
                    <option value="Male" <?php if ($row['gender'] == "Male") {
                                                echo "selected";
                                            } ?>>Male</option>
                    <option value="Female" <?php if ($row['gender'] == "Female") {
                                                echo "selected";
                                            } ?>>Female</option>
                    <option value="Prefer Not To Say" <?php if ($row['gender'] == "Prefer Not To Say") {
                                                            echo "selected";
                                                        } ?>>Prefer Not To Say</option>
                </select>
            </div>

            <div class="inputs text-input">
                <label class="label" for="about">About Me:</label>
                <?php
                if ($row['about_me']) {
                    echo "<textarea class='about' name='about' id='about' cols='30' rows='10'>" . $row['about_me'] . "</textarea>";
                } else {
                    echo '<textarea class="about" name="about" id="about" cols="30" rows="10">Write a few lines about yourself!</textarea>';
                }
                ?>
            </div>

            <div class="inputs">
                <label class="label" for="profile-image">Upload A Profile Pic:</label>
                <input class="input input-profile-image" id="profile-image" name="profile-image" type="file">
            </div>

            <div class="inputs">
            </div>

            <div class="inputs">
                <label class="label" for="newpwd">Update Password:</label>
                <input class="input" id="newpwd" name="newpwd" type="password">
                <p class="secondary-text">*Enter a new password if you want to update your password</p>
            </div>

            <div class="inputs">
                <label class="label" for="pwd">Current Password:</label>
                <input class="input" id="pwd" name="pwd" type="password">
                <p class="secondary-text">*Enter your current password to save changes</p>
            </div>

            <div class="error-message full-col">
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
                    } else if ($_GET["error"] == "imageError") {
                        echo "<p class='error'>only upload .jpeg, .jpg and .png images please</p>";
                    } else if ($_GET["error"] == "sqlerror" || $_GET["error"] == "sqlentryerror") {
                        echo "<p class='error'>Something went wrong. Try again</p>";
                    } else if ($_GET["error"] == "incorrectPassword") {
                        echo "<p class='error'>You have entered a wrong password</p>";
                    }
                }
                ?>
            </div>

            <button class="btn-primary edit-button" name="edit-profile">Submit Changes</button>
        </form>
        <button class="btn-red togglebtn">Delete account</button>




    </div>
    <div class="delete">
        <div class="modal">
            <i class="fa-solid fa-xmark closebutton"></i>
            <h2>Are you sure you want to delete your profile?</h2>
            <p>Your account will be permanently deleted.</p>
            <p>To proceed, key in your password and click 'Delete Profile'</p>

            <form class="modal-form" action="backend/db_deleteprofile.php" method="POST">
                <input class="input deleteinput" type="password" name="password" placeholder="Password">
                <button class="btn-red" name="delete-button">Delete Profile</button>
            </form>
        </div>
    </div>
</div>

<script>
    const toggle = document.querySelector('.togglebtn');
    const page = document.querySelector('.edit');
    const modal = document.querySelector('.delete');

    const cross = document.querySelector('.closebutton');

    toggle.addEventListener('click', () => {
        modal.classList.add('show-modal');
        page.classList.add('blur');
    })

    cross.addEventListener('click', () => {
        modal.classList.remove('show-modal');
        page.classList.remove('blur');
    })
</script>
<?php
include_once 'footer.php';
?>