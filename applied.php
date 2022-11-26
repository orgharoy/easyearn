<?php
include_once 'header.php';
include 'backend/db_conn.php';

if (!$_SESSION['userid']) {
    header("Location: index.php");
    exit();
} else {

    $userId = $_SESSION['userid'];

    $sql = "SELECT * FROM applied INNER JOIN jobs ON applied.job_id = jobs.job_id WHERE applied.user_id=" . $userId . " ORDER BY applied_id DESC;";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) < 1) {
        header("Location: index.php");
        exit();
    }

    $num = mysqli_num_rows($query);

    $numperpage = 2;
    $totalpage = ceil($num / $numperpage);


    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $startinglimit = ($page - 1) * $numperpage;

    $q = "SELECT * FROM applied INNER JOIN jobs ON applied.job_id = jobs.job_id WHERE applied.user_id=" . $userId . " ORDER BY applied_id DESC LIMIT " . $startinglimit . "," . $numperpage . ";";
    $result = mysqli_query($conn, $q);
}
?>


<div class="hero container">
    <div class="myjobs">
        <h1>Jobs I Applied To</h1>

        <?php
        if (mysqli_num_rows($result) < 1) {
            echo "<p> You haven't applied to any job yet </p>";
            exit();
        }
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <?php echo ' <a class="myjob-card" href="job.php?job=' . $row['job_id'] . '"> ' ?>
            <div class="created-job">
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
                    <div class="info">
                        <i class="fa-solid fa-eye"></i>
                        <?php echo '<p> ' . $row['status'] . ' </p>' ?>
                    </div>
                </div>
            </div>
            </a>


        <?php
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