<?php
include_once 'header.php';
include 'backend/db_conn.php';
?>

<div class="hero container main-section">

    <form class="index-filter" action="" method="GET">

        <p class='filtertext'>Search or Filter</p>
        <p class='filterphone'>Click here to search or filter <i class="fa fa-search"></i> </p>
        <div class="for-hidden">
            <div class="filter-main">
                <input type="text" id="search" name="search" class="filter-input" value="<?php if (isset($_GET['search'])) {
                                                                                                echo $_GET['search'];
                                                                                            } ?>" placeholder="What are you looking for?">


                <select class="filter-input" name="area" id="area">
                    <option value="" <?php if (!isset($_GET['area'])) {
                                            echo "selected";
                                        } ?>>Select Your Area</option>
                    <option value="Abdullahpur" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Abdullahpur') {
                                                    echo "selected";
                                                } ?>>Abdullahpur</option>
                    <option value="Agargaon" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Agargaon') {
                                                    echo "selected";
                                                } ?>>Agargaon</option>
                    <option value="Badda" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Badda') {
                                                echo "selected";
                                            } ?>>Badda</option>
                    <option value="Banani" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Banani') {
                                                echo "selected";
                                            } ?>>Banani</option>
                    <option value="Banasree" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Banasree') {
                                                    echo "selected";
                                                } ?>>Banasree</option>
                    <option value="Baridhara" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Baridhara') {
                                                    echo "selected";
                                                } ?>>Baridhara</option>
                    <option value="Bashundhara" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Bashundhara') {
                                                    echo "selected";
                                                } ?>>Bashundhara</option>
                    <option value="Bawnia" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Bawnia') {
                                                echo "selected";
                                            } ?>>Bawnia</option>
                    <option value="Beraid" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Beraid') {
                                                echo "selected";
                                            } ?>>Beraid</option>
                    <option value="Cantonment Area" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Cantonment Area') {
                                                        echo "selected";
                                                    } ?>>Cantonment Area</option>
                    <option value="Dakshinkhan" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Dakshinkhan') {
                                                    echo "selected";
                                                } ?>>Dakshinkhan</option>
                    <option value="Dania" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Dania') {
                                                echo "selected";
                                            } ?>>Dania</option>
                    <option value="Demra" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Demra') {
                                                echo "selected";
                                            } ?>>Demra</option>
                    <option value="Dhanmondi" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Dhanmondi" ') {
                                                    echo "selected";
                                                } ?>>Dhanmondi</option>
                    <option value="Farmgate" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Farmgate') {
                                                    echo "selected";
                                                } ?>>Farmgate</option>
                    <option value="Gabtali" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Gabtali') {
                                                echo "selected";
                                            } ?>>Gabtali</option>
                    <option value="Gulshan" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Gulshan') {
                                                echo "selected";
                                            } ?>>Gulshan</option>
                    <option value="Hazaribagh" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Hazaribagh') {
                                                    echo "selected";
                                                } ?>>Hazaribagh</option>
                    <option value="Islampur" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'mpur" <?p') {
                                                    echo "selected";
                                                } ?>>Islampur</option>
                    <option value="Jurain" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'rain') {
                                                echo "selected";
                                            } ?>>Jurain</option>
                    <option value="Kafrul" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Kafrul') {
                                                echo "selected";
                                            } ?>>Kafrul</option>
                    <option value="Kamalapur" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Kamalapur') {
                                                    echo "selected";
                                                } ?>>Kamalapur</option>
                    <option value="Kamrangirchar" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Kamrangirchar') {
                                                        echo "selected";
                                                    } ?>>Kamrangirchar</option>
                    <option value="Kazipara" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Kazipara') {
                                                    echo "selected";
                                                } ?>>Kazipara</option>
                    <option value="Khilgaon" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Khilgaon') {
                                                    echo "selected";
                                                } ?>>Khilgaon</option>
                    <option value="Khilkhet" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Khilkhet') {
                                                    echo "selected";
                                                } ?>>Khilkhet</option>
                    <option value="Kotwali" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Kotwali') {
                                                echo "selected";
                                            } ?>>Kotwali</option>
                    <option value="Lalbagh" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Lalbagh') {
                                                echo "selected";
                                            } ?>>Lalbagh</option>
                    <option value="Matuail" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Matuail') {
                                                echo "selected";
                                            } ?>>Matuail</option>
                    <option value="Mirpur" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Mirpur') {
                                                echo "selected";
                                            } ?>>Mirpur</option>
                    <option value="Mohakhali" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Mohakhali') {
                                                    echo "selected";
                                                } ?>>Mohakhali</option>
                    <option value="Mohammadpur" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Mohammadpur') {
                                                    echo "selected";
                                                } ?>>Mohammadpur</option>
                    <option value="Motijheel" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Motijheel') {
                                                    echo "selected";
                                                } ?>>Motijheel</option>
                    <option value="Nimtoli" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Nimtoli') {
                                                echo "selected";
                                            } ?>>Nimtoli</option>
                    <option value="Pallabi" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Pallabi') {
                                                echo "selected";
                                            } ?>>Pallabi</option>
                    <option value="Paltan" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Paltan') {
                                                echo "selected";
                                            } ?>>Paltan</option>
                    <option value="Ramna" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Ramna') {
                                                echo "selected";
                                            } ?>>Ramna</option>
                    <option value="Rampura" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Rampura') {
                                                echo "selected";
                                            } ?>Rampura</option>
                    <option value="Sabujbagh" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Sabujbagh') {
                                                    echo "selected";
                                                } ?>>Sabujbagh</option>
                    <option value="Sadarghat" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Sadarghat') {
                                                    echo "selected";
                                                } ?>>Sadarghat</option>
                    <option value="Satarkul" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Satarkul') {
                                                    echo "selected";
                                                } ?>>Satarkul</option>
                    <option value="Shahbagh" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Shahbagh') {
                                                    echo "selected";
                                                } ?>>Shahbagh</option>
                    <option value="Sher-e-Bangla Nagar" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Sher-e-Bangla Nagar') {
                                                            echo "selected";
                                                        } ?>>Sher-e-Bangla Nagar</option>
                    <option value="Shyampur" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Shyampur') {
                                                    echo "selected";
                                                } ?>>Shyampur</option>
                    <option value="Sutrapur" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Sutrapur') {
                                                    echo "selected";
                                                } ?>>Sutrapur</option>
                    <option value="Tejgaon" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Tejgaon') {
                                                echo "selected";
                                            } ?>>Tejgaon</option>
                    <option value="Uttara" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Uttara') {
                                                echo "selected";
                                            } ?>>Uttara</option>
                    <option value="Uttarkhan" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Uttarkhan') {
                                                    echo "selected";
                                                } ?>>Uttarkhan</option>
                    <option value="Vatara" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Vatara') {
                                                echo "selected";
                                            } ?>>Vatara</option>
                    <option value="Wari" <?php if (isset($_GET['area']) &&  $_GET['area'] == 'Wari') {
                                                echo "selected";
                                            } ?>>Wari</option>
                </select>

                <input class="filter-input" type="date" name="date" id="date" value="<?php if (isset($_GET['date'])) {
                                                                                            echo $_GET['date'];
                                                                                        } ?>">


                <button type="submit" class="filter-search"> <i class="fa fa-search"></i> Search</button>
            </div>
        </div>
    </form>

    <!-- job cards -->

    <div class="jobs">

        <?php

        if (!isset($_GET['search']) && !isset($_GET['area']) && !isset($_GET['date'])) {

            $sql = "SELECT * from jobs WHERE status = 'Active' ORDER BY job_id DESC;";
            $query = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($query);

            $numperpage = 4;
            $totalpage = ceil($num / $numperpage);


            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }

            $startinglimit = ($page - 1) * $numperpage;

            $q = "SELECT * from jobs WHERE status = 'Active' ORDER BY job_id DESC LIMIT " . $startinglimit . "," . $numperpage . ";";
            $result = mysqli_query($conn, $q);

            if (mysqli_num_rows($result) < 1) {
                echo "<p> There are no jobs available </p>";
                exit();
            }
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="job-card">
                    <div class="title-desc">
                        <?php echo "<p class='secondary-text'>Posted on " . date('d M Y, g:i a', strtotime($row['created'])) . " </p>"  ?>
                        <?php echo "<h2>" . $row['title'] . "</h2>"; ?>
                        <div class="index-info-mobile">
                            <div class="info-items">
                                <i class="fa-solid fa-location-dot"></i>
                                <?php echo " <p>" . $row['address'] . ", " . $row['area'] . "</p>"; ?>
                            </div>
                            <div class="info-items">
                                <i class="fa-solid fa-clock"></i>
                                <?php echo "<p>" . date("g:i a", strtotime($row['time'])) . "</p>" ?>
                            </div>
                            <div class="info-items">
                                <i class="fa-solid fa-calendar-days"></i>
                                <?php echo "<p>" . date("d M, Y", strtotime($row['date'])) . "</p>" ?>
                            </div>
                            <div class="info-items">
                                <i class="fa-solid fa-sack-dollar"></i>
                                <?php echo "<p> Tk. " . $row['salary'] . "</p>"  ?>
                            </div>
                        </div>
                        <?php
                        if (strlen($row['description']) > 60) {
                            echo "<p>" . substr($row['description'], 0, 60)   . "...</p>";
                        } else {
                            echo "<p>" . $row['description'] . "</p>";
                        }
                        ?>


                        <?php echo "<a class='btn-primary job-desc-btn' href='job.php?job=" . $row['job_id'] . "'>Learn More</a> "; ?>
                    </div>
                    <div class="index-info">
                        <div class="info-items">
                            <i class="fa-solid fa-location-dot"></i>
                            <?php echo " <p>" . $row['address'] . ", " . $row['area'] . "</p>"; ?>
                        </div>
                        <div class="info-items">
                            <i class="fa-solid fa-clock"></i>
                            <?php echo "<p>" . date("g:i a", strtotime($row['time'])) . "</p>" ?>
                        </div>
                        <div class="info-items">
                            <i class="fa-solid fa-calendar-days"></i>
                            <?php echo "<p>" . date("d M, Y", strtotime($row['date'])) . "</p>" ?>
                        </div>
                        <div class="info-items">
                            <i class="fa-solid fa-sack-dollar"></i>
                            <?php echo "<p> Tk. " . $row['salary'] . "</p>"  ?>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
            <div class="bottom-page">
                <?php
                for ($btn = 1; $btn <= $totalpage; $btn++) {
                    if ($btn == $page) {
                ?>
                        <a class="pagination current-page" href="index.php?page=<?php echo $btn ?>"> <?php echo $btn ?> </a>
                    <?php
                    } else {
                    ?>
                        <a class="pagination" href="index.php?page=<?php echo $btn ?>"> <?php echo $btn ?> </a>
                <?php

                    }
                }
                ?>
            </div>
            <?php
        } else {

            $search = $_GET['search'];
            $area = $_GET['area'];
            $date = $_GET['date'];

            if ($area && $date) {
                $q = "SELECT * FROM jobs WHERE status = 'Active' AND CONCAT(title) LIKE '%" . $search . "%' AND area= '" . $area . "' AND date = '" . $date . "';";
            } else if (!$area && $date) {
                $q = "SELECT * FROM jobs WHERE status = 'Active' AND CONCAT(title) LIKE '%" . $search . "%' AND date = '" . $date . "';";
            } else if ($area && !$date) {
                $q = "SELECT * FROM jobs WHERE status = 'Active' AND CONCAT(title) LIKE '%" . $search . "%' AND area= '" . $area . "';";
            } else {
                $q = "SELECT * FROM jobs WHERE status = 'Active' AND CONCAT(title) LIKE '%" . $search . "%';";
            }

            $query = mysqli_query($conn, $q);

            $num = mysqli_num_rows($query);

            $numperpage = 4;
            $totalpage = ceil($num / $numperpage);


            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }

            $startinglimit = ($page - 1) * $numperpage;




            if ($area && $date) {
                $sql = "SELECT * FROM jobs WHERE status = 'Active' AND CONCAT(title) LIKE '%" . $search . "%' AND area= '" . $area . "' AND date = '" . $date . "' ORDER BY job_id DESC LIMIT " . $startinglimit . "," . $numperpage . ";";
            } else if (!$area && $date) {
                $sql = "SELECT * FROM jobs WHERE status = 'Active' AND CONCAT(title) LIKE '%" . $search . "%' AND date = '" . $date . "' ORDER BY job_id DESC LIMIT " . $startinglimit . "," . $numperpage . ";";
            } else if ($area && !$date) {
                $sql = "SELECT * FROM jobs WHERE status = 'Active' AND CONCAT(title) LIKE '%" . $search . "%' AND area= '" . $area . "' ORDER BY job_id DESC LIMIT " . $startinglimit . "," . $numperpage . ";";
            } else {
                $sql = "SELECT * FROM jobs WHERE status = 'Active' AND CONCAT(title) LIKE '%" . $search . "%' ORDER BY job_id DESC LIMIT " . $startinglimit . "," . $numperpage . ";";
            }

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) < 1) {
                echo "<p> There are no jobs available </p>";
                exit();
            }


            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="job-card">
                    <div class="title-desc">
                        <?php echo "<p class='secondary-text'>Posted on " . date('d M Y, g:i a', strtotime($row['created'])) . " </p>"  ?>
                        <?php echo "<h2>" . $row['title'] . "</h2>"; ?>
                        <?php echo "<p>" . $row['description'] . "</p>"; ?>
                        <?php echo "<a class='btn-primary job-desc-btn' href='job.php?job=" . $row['job_id'] . "'>Learn More</a> "; ?>
                    </div>
                    <div class="index-info">
                        <div class="info-items">
                            <i class="fa-solid fa-location-dot"></i>
                            <?php echo " <p>" . $row['address'] . ", " . $row['area'] . "</p>"; ?>
                        </div>
                        <div class="info-items">
                            <i class="fa-solid fa-clock"></i>
                            <?php echo "<p>" . date("g:i a", strtotime($row['time'])) . "</p>" ?>
                        </div>
                        <div class="info-items">
                            <i class="fa-solid fa-calendar-days"></i>
                            <?php echo "<p>" . date("d M, Y", strtotime($row['date'])) . "</p>" ?>
                        </div>
                        <div class="info-items">
                            <i class="fa-solid fa-sack-dollar"></i>
                            <?php echo "<p> Tk. " . $row['salary'] . "</p>"  ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="bottom-page">
                <?php
                for ($btn = 1; $btn <= $totalpage; $btn++) {
                    if ($btn == $page) {
                ?>
                        <a class="pagination current-page" href="index.php?search=<?php echo $search ?>&area=<?php echo $area ?>&date=<?php echo $date ?>&page=<?php echo $btn ?>"> <?php echo $btn ?> </a>
                    <?php
                    } else {
                    ?>
                        <a class="pagination" href="index.php?search=<?php echo $search ?>&area=<?php echo $area ?>&date=<?php echo $date ?>&page=<?php echo $btn ?>"> <?php echo $btn ?> </a>
                <?php
                    }
                }
                ?>
            </div>
        <?php
        }
        ?>

    </div>

    <!-- profile or login card -->

    <div class="profile">



        <?php
        if (isset($_SESSION['userid'])) {

            $userid = $_SESSION['userid'];

            $sql = "SELECT * FROM users WHERE user_id=" . $userid . ";";
            $query = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($query);

        ?>
            <div class="loggedin">
                <img class="index-profile" src="images/profile-images/<?php echo $row['image'] ?>" alt="">
                <?php echo "<h2>" . $row['first_name'] . " " . $row['last_name'] .  "</h2>"; ?>
                <?php echo "<a class='btn-primary index-view-btn' href='profile.php?id=" . $row['user_id'] . "'>View Profile</a>"; ?>

            </div>

        <?php
        } else {
        ?>
            <div class=" notloggedin">
                <h2> Sign Up Today </h2>
                <p class="banner-text"> And get countless exciting earning opportunities! </p>
                <a class="btn-primary" href="signup.php">Sign Up</a>
                <p> or </p>
                <a class="login-button" href="login.php">Login to your existing account</a>
            </div>
        <?php
        }
        ?>

    </div>

</div>


<script>
    const search = document.querySelector('.filterphone');
    const filter = document.querySelector('.for-hidden');

    let change = 1;

    search.addEventListener('click', () => {
        if (change == 1) {
            filter.classList.add('show');
            change = 0;
        } else {
            filter.classList.remove('show');
            change = 1;
        }
    })
</script>
<?php
include_once 'footer.php';
?>