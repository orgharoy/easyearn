<?php
include_once 'header.php';
include_once 'backend/db_conn.php';

$userId = $_SESSION['userid'];
$jobId = $_GET['jobid'];

$sql = "SELECT * FROM jobs WHERE job_id = " . $jobId . ";";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) < 1) {
    header("Location: job.php?job=" . $jobId);
    exit();
}

$row = mysqli_fetch_assoc($query);

if ($userId != $row['user_id']) {
    header("Location: job.php?job=" . $jobId);
    exit();
}

?>

<div class="hero container">
    <form action="backend/db_editjob.php?jobid=<?php echo $row['job_id'] ?>" method="POST" class="createjob-form" enctype="multipart/form-data">

        <h1>Edit Your Posting</h1>

        <div class="input-with-label">
            <label for="jobtitle" class="create-label">Job Title</label>
            <input class="input" type="text" id="jobtitle" name="jobtitle" value="<?php echo $row['title'] ?>">
        </div>
        <div class=" input-with-label">
            <label for="jobdesc" class="create-label">Job Description</label>
            <textarea class="job-input" type="text" id="jobdesc" name="jobdesc" cols="30" rows="10"><?php echo $row['description'] ?></textarea>
        </div>
        <div class="input-with-label">
            <label for="jobadd" class="create-label">Address</label>
            <div class="addressline">
                <input class="input address" type="text" id="jobadd" name="jobadd" value="<?php echo $row['address'] ?>">
                <select class="input dropdown" name="area" id="jobadd">
                    <option value="">Select Your Area</option>
                    <option value="Abdullahpur" <?php if ($row['area'] == "Abdullahpur") {
                                                    echo "selected";
                                                } ?>>Abdullahpur</option>
                    <option value="Agargaon" <?php if ($row['area'] == "Agargaon") {
                                                    echo "selected";
                                                } ?>>Agargaon</option>
                    <option value="Badda" <?php if ($row['area'] == "Badda") {
                                                echo "selected";
                                            } ?>>Badda</option>
                    <option value="Banani" <?php if ($row['area'] == "Banani") {
                                                echo "selected";
                                            } ?>>Banani</option>
                    <option value="Banasree" <?php if ($row['area'] == "Banasree") {
                                                    echo "selected";
                                                } ?>>Banasree</option>
                    <option value="Baridhara" <?php if ($row['area'] == "Baridhara") {
                                                    echo "selected";
                                                } ?>>Baridhara</option>
                    <option value="Bashundhara" <?php if ($row['area'] == "Bashundhara") {
                                                    echo "selected";
                                                } ?>>Bashundhara</option>
                    <option value="Bawnia" <?php if ($row['area'] == "Bawnia") {
                                                echo "selected";
                                            } ?>>Bawnia</option>
                    <option value="Beraid" <?php if ($row['area'] == "Beraid") {
                                                echo "selected";
                                            } ?>>Beraid</option>
                    <option value="Cantonment area" <?php if ($row['area'] == "Cantonment area") {
                                                        echo "selected";
                                                    } ?>>Cantonment Area</option>
                    <option value="Dakshinkhan" <?php if ($row['area'] == "Dakshinkhan") {
                                                    echo "selected";
                                                } ?>>Dakshinkhan</option>
                    <option value="Dania" <?php if ($row['area'] == "Dania") {
                                                echo "selected";
                                            } ?>>Dania</option>
                    <option value="Demra" <?php if ($row['area'] == "Demra") {
                                                echo "selected";
                                            } ?>>Demra</option>
                    <option value="Dhanmondi" <?php if ($row['area'] == "Dhanmondi") {
                                                    echo "selected";
                                                } ?>>Dhanmondi</option>
                    <option value="Farmgate" <?php if ($row['area'] == "Farmgate") {
                                                    echo "selected";
                                                } ?>>Farmgate</option>
                    <option value="Gabtali" <?php if ($row['area'] == "Gabtali") {
                                                echo "selected";
                                            } ?>>Gabtali</option>
                    <option value="Gulshan" <?php if ($row['area'] == "Gulshan") {
                                                echo "selected";
                                            } ?>>Gulshan</option>
                    <option value="Hazaribagh" <?php if ($row['area'] == "Hazaribagh") {
                                                    echo "selected";
                                                } ?>>Hazaribagh</option>
                    <option value="Islampur" <?php if ($row['area'] == "Islampur") {
                                                    echo "selected";
                                                } ?>>Islampur</option>
                    <option value="Jurain" <?php if ($row['area'] == "Jurain") {
                                                echo "selected";
                                            } ?>>Jurain</option>
                    <option value="Kafrul" <?php if ($row['area'] == "Kafrul") {
                                                echo "selected";
                                            } ?>>Kafrul</option>
                    <option value="Kamalapur" <?php if ($row['area'] == "Kamalapur") {
                                                    echo "selected";
                                                } ?>>Kamalapur</option>
                    <option value="Kamrangirchar" <?php if ($row['area'] == "Kamrangirchar") {
                                                        echo "selected";
                                                    } ?>>Kamrangirchar</option>
                    <option value="Kazipara" <?php if ($row['area'] == "Kazipara") {
                                                    echo "selected";
                                                } ?>>Kazipara</option>
                    <option value="Khilgaon" <?php if ($row['area'] == "Khilgaon") {
                                                    echo "selected";
                                                } ?>>Khilgaon</option>
                    <option value="Khilkhet" <?php if ($row['area'] == "Khilkhet") {
                                                    echo "selected";
                                                } ?>>Khilkhet</option>
                    <option value="Kotwali" <?php if ($row['area'] == "Kotwali") {
                                                echo "selected";
                                            } ?>>Kotwali</option>
                    <option value="Lalbagh" <?php if ($row['area'] == "Lalbagh") {
                                                echo "selected";
                                            } ?>>Lalbagh</option>
                    <option value="Matuail" <?php if ($row['area'] == "Matuail") {
                                                echo "selected";
                                            } ?>>Matuail</option>
                    <option value="Mirpur" <?php if ($row['area'] == "Mirpur") {
                                                echo "selected";
                                            } ?>>Mirpur</option>
                    <option value="Mohakhali" <?php if ($row['area'] == "Mohakhali") {
                                                    echo "selected";
                                                } ?>>Mohakhali</option>
                    <option value="Mohammadpur" <?php if ($row['area'] == "Mohammadpur") {
                                                    echo "selected";
                                                } ?>>Mohammadpur</option>
                    <option value="Motijheel" <?php if ($row['area'] == "Motijheel") {
                                                    echo "selected";
                                                } ?>>Motijheel</option>
                    <option value="Nimtoli" <?php if ($row['area'] == "Nimtoli") {
                                                echo "selected";
                                            } ?>>Nimtoli</option>
                    <option value="Pallabi" <?php if ($row['area'] == "Pallabi") {
                                                echo "selected";
                                            } ?>>Pallabi</option>
                    <option value="Paltan" <?php if ($row['area'] == "Paltan") {
                                                echo "selected";
                                            } ?>>Paltan</option>
                    <option value="Ramna" <?php if ($row['area'] == "Ramna") {
                                                echo "selected";
                                            } ?>>Ramna</option>
                    <option value="Rampura" <?php if ($row['area'] == "Rampura") {
                                                echo "selected";
                                            } ?>>Rampura</option>
                    <option value="Sabujbagh" <?php if ($row['area'] == "Sabujbagh") {
                                                    echo "selected";
                                                } ?>>Sabujbagh</option>
                    <option value="Sadarghat" <?php if ($row['area'] == "Sadarghat") {
                                                    echo "selected";
                                                } ?>>Sadarghat</option>
                    <option value="Satarkul" <?php if ($row['area'] == "Satarkul") {
                                                    echo "selected";
                                                } ?>>Satarkul</option>
                    <option value="Shahbagh" <?php if ($row['area'] == "Shahbagh") {
                                                    echo "selected";
                                                } ?>>Shahbagh</option>
                    <option value="Sher-e-Bangla Nagar" <?php if ($row['area'] == "Sher-e-Bangla Nagar") {
                                                            echo "selected";
                                                        } ?>>Sher-e-Bangla Nagar</option>
                    <option value="Shyampur" <?php if ($row['area'] == "Shyampur") {
                                                    echo "selected";
                                                } ?>>Shyampur</option>
                    <option value="Sutrapur" <?php if ($row['area'] == "Sutrapur") {
                                                    echo "selected";
                                                } ?>>Sutrapur</option>
                    <option value="Tejgaon" <?php if ($row['area'] == "Tejgaon") {
                                                echo "selected";
                                            } ?>>Tejgaon</option>
                    <option value="Uttara" <?php if ($row['area'] == "Uttara") {
                                                echo "selected";
                                            } ?>>Uttara</option>
                    <option value="Uttarkhan" <?php if ($row['area'] == "Uttarkhan") {
                                                    echo "selected";
                                                } ?>>Uttarkhan</option>
                    <option value="Vatara" <?php if ($row['area'] == "Vatara") {
                                                echo "selected";
                                            } ?>>Vatara</option>
                    <option value="Wari" <?php if ($row['area'] == "Wari") {
                                                echo "selected";
                                            } ?>>Wari</option>
                </select>
            </div>
            <p class="secondary-text">*Currently we are only operating in Dhaka City. Our services will open for other areas soon.</p>
        </div>

        <div class="date-time">
            <div class="input-with-label">
                <label for="date" class="create-label">Date of your Job </label>
                <input type="date" class="input" id="date" name="date" value="<?php echo $row['date'] ?>">
            </div>
            <div class="input-with-label">
                <label for="time" class="create-label">Time of your Job </label>
                <input type="time" class="input" id="time" name="time" value="<?php echo $row['time'] ?>">
            </div>
            <div class="input-with-label">
                <label for="salary" class="create-label">How much will you pay? (Tk/hour)</label>
                <div class="inputwithspan">
                    <span class="inputspan">Tk</span>
                    <input type="text" name="salary" id="salary" class="input" value="<?php echo $row['salary'] ?>">
                </div>
            </div>

            <div class="input-with-label">
                <label for="status" class="create-label">Make job active/inactive</label>
                <select class="input dropdown" name="status" id="status">
                    <option value="Active" <?php if ($row['status'] == "Active") {
                                                echo "selected";
                                            } ?>>Active</option>
                    <option value="Inactive" <?php if ($row['status'] == "Inactive") {
                                                    echo "selected";
                                                } ?>>Inactive</option>
                </select>
            </div>

        </div>

        <div class="job-images">
            <div class="label" for="job-image">Upload Any Necessary Images: </div>
            <input class="input input-profile-image" id="job-image" name="job-image1" type="file" value="">
            <input class="input input-job-image input-profile-image" id="job-image" name="job-image2" type="file" value="">
        </div>

        <div class="error-message">
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyFields") {
                    echo "<p class='error'>Fill in all fields</p>";
                } else if ($_GET["error"] == "lowSalary") {
                    echo "<p class='error'>Salary must be above 100tk per hour</p>";
                } else if ($_GET["error"] == "imageError") {
                    echo "<p class='error'>Only upload .jpeg, .jpg and .png images please</p>";
                } else if ($_GET["error"] == "sqlerror" || $_GET["error"] == "sqlentryerror") {
                    echo "<p class='error'>Something went wrong. Try again</p>";
                }
            }
            ?>
        </div>

        <button class="btn-primary create-job-btn" name="update-job">Update Job</button>

    </form>

</div>

<?php
include_once 'footer.php';
?>