<?php
include_once 'header.php';
include 'backend/db_conn.php';

if (!$_SESSION['userid']) {
    header("Location: index.php");
    exit();
} else {

    $jobId = $_GET['jobid'];

    $q = "SELECT * FROM jobs WHERE job_id =" . $jobId . ";";
    $find = mysqli_query($conn, $q);

    if (mysqli_num_rows($find) < 1) {
        header("Location: index.php");
        exit();
    }

    $have = mysqli_fetch_assoc($find);

    if ($have['user_id'] != $_SESSION['userid']) {
        header("Location: index.php?error=error");
        exit();
    }
}

?>

<div class="hero container">
    <div class="myjobs">

        <?php

        $sql = "SELECT * FROM applied INNER JOIN users ON applied.user_id = users.user_id WHERE applied.job_id=" . $jobId . " ORDER BY applied_id DESC;";
        $query = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($query);

        if ($num == 1) {
            echo "<h1>" . $num . " Job Application </h1>";
        } else {
            echo "<h1>" . $num . " Job Applications </h1>";
        }

        if (mysqli_num_rows($query) < 1) {
            echo "<p> You have 0 applications </p>";
            exit();
        }

        $numperpage = 2;
        $totalpage = ceil($num / $numperpage);


        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $startinglimit = ($page - 1) * $numperpage;
        $q = "SELECT * FROM applied INNER JOIN users ON applied.user_id = users.user_id WHERE applied.job_id=" . $jobId . " ORDER BY applied_id DESC LIMIT " . $startinglimit . "," . $numperpage . ";";
        $result = mysqli_query($conn, $q);

        while ($r = mysqli_fetch_assoc($result)) {
            echo '
            <div class="app-card">
                <h3> ' . $r['first_name'] . ' ' . $r['last_name'] . ' </h3>
                <a class="btn-primary" href="profile.php?id=' . $r['user_id'] . '"> View Profile</a> 
            </div> ';
        }
        ?>

        <div class="bottom-page">
            <?php
            for ($btn = 1; $btn <= $totalpage; $btn++) {
                if ($btn == $page) {
            ?>
                    <a class="pagination current-page" href="applied.php?page=<?php echo $btn ?>"> <?php echo $btn ?> </a>
                <?php
                } else {
                ?>
                    <a class="pagination" href="applied.php?page=<?php echo $btn ?>"> <?php echo $btn ?> </a>
            <?php
                }
            }
            ?>
        </div>

    </div>
</div>



<?php
include_once 'footer.php';
?>