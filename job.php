<?php
include_once 'header.php';
include_once 'backend/db_conn.php';

if (!isset($_GET["job"])) {
    header("Location: index.php");
    exit();
} else {
    $jobId = $_GET["job"];

    $sql = "SELECT * FROM jobs WHERE job_id = " . $jobId . ";";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) < 1) {
        header("Location: index.php?error=queryerror");
        exit();
    }

    $row = mysqli_fetch_assoc($query);
}
?>

<div class="hero container">
    <div class="jobpage">
        <div class="job-firstrow">
            <?php echo '<p class="secondary-text">Posted ' . date('d M Y, g:i a', strtotime($row['created'])) . '</p>' ?>
            <?php

            $id;

            if (isset($_SESSION['userid'])) {
                $id = $_SESSION['userid'];
            } else {
                $id = null;
            }

            if ($id == $row['user_id']) {
            ?>

                <div class="delete-edit-job">
                    <div class='dropdown'>
                        <a class='dropbtn-job'><i class="fa-solid fa-ellipsis-vertical"></i></a>
                        <div class='dropdown-content'>
                            <?php echo "<a href='editjob.php?jobid=" . $row['job_id'] . "'>Edit Post</a> "; ?>
                            <a class="togglebtndelete" href='#'>Delete Post</a>
                        </div>
                    </div>
                </div>
            <?php
            }

            ?>

        </div>
        <?php echo '<h2>' . $row['title'] . '</h2>' ?>
        <div class=" profileinfo">
            <div class="info">
                <i class="fa-solid fa-location-dot"></i>
                <?php echo '<p>' . $row['address'] . ' - ' . $row['area'] . '</p>' ?>
            </div>
            <div class="info">
                <i class="fa-solid fa-clock"></i>
                <?php echo '<p> ' . date("g:i a", strtotime($row['time'])) . ' </p>' ?>
            </div>
            <div class="info">
                <i class="fa-solid fa-calendar-days"></i>
                <?php echo '<p> ' . date("d M, Y", strtotime($row['date'])) . ' </p>' ?>
            </div>
            <div class="info">
                <i class="fa-solid fa-sack-dollar"></i>
                <?php echo '<p> Tk. ' . $row['salary'] . ' </p>' ?>
            </div>
        </div>
        <?php echo ' <p class="job-desc">' . $row['description'] . '</p> ' ?>

        <div class="jobrelated-images">
            <?php echo ' <img class="jobpage-images" src="images/job-images/' . $row['image1'] . '" alt="Job Related Image 1"> ' ?>
            <?php echo ' <img class="jobpage-images" src="images/job-images/' . $row['image2'] . '" alt="Job Related Image 1"> ' ?>
        </div>

        <?php

        if (isset($_SESSION["userid"])) {
            if ($_SESSION["userid"] == $row['user_id']) {

                $term = "SELECT * FROM applied WHERE job_id = " . $jobId . ";";
                $find = mysqli_query($conn, $term);

                $num = mysqli_num_rows($find);

                if ($num < 1) {
                    echo "<p class='nouser'> <span> <a href='applications.php?jobid=" . $jobId . "'> You have " . $num . " application</a> </span> </p>";
                } else if ($num > 0 && $num < 2) {
                    echo "<p class='nouser'> <span> <a href='applications.php?jobid=" . $jobId . "'> View " . $num . " application</a> </span> </p>";
                } else {
                    echo "<p class='nouser'> <span> <a href='applications.php?jobid=" . $jobId . "'> View " . $num . " application</a> </span> </p>";
                }
            } else {

                //to find already applied
                $q = "SELECT * FROM applied WHERE job_id=" . $jobId . " AND user_id=" . $_SESSION['userid'] . ";";
                $search = mysqli_query($conn, $q);

                if (mysqli_num_rows($search) > 0) {
                    $applied = "true";
                } else {
                    $applied = "false";
                }

                if ($applied == "true") {
                    echo "<p class='nouser'> You have already applied </p>";
                } else {
                    echo "<a class='btn-primary apply' href='backend/db_applyjob.php?jobId=" . $row['job_id'] . "'>Apply For Job</a> ";
                }
            }
        } else {
        ?>
            <p class="nouser"><span> <a href="login.php">Login </a> </span> or <span><a href="signup.php"> Signup </a> </span>to start applying to jobs</p>
        <?php
        }

        ?>
    </div>

    <div class="delete">
        <div class="modal">
            <i class="fa-solid fa-xmark closebutton"></i>
            <h2>Are you sure you want to delete this job?</h2>
            <p>Your job will be permanently deleted.</p>

            <form class="modal-form" action="backend/db_deletejob.php?jobid=<?php echo $row['job_id'] ?>" method="POST">
                <button class="btn-red" name="delete-job-button">Yes, delete this job</button>
            </form>

        </div>
    </div>
</div>

<script>
    const toggle = document.querySelector('.togglebtndelete');
    const page = document.querySelector('.jobpage');
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