<?php
include_once 'header.php';

if (!isset($_SESSION['userid'])) {
    header("Location: index.php");
}

?>

<div class="hero container">
    <form action="backend/db_createjob.php" method="POST" class="createjob-form" enctype="multipart/form-data">

        <h1>Create A Job</h1>

        <div class="input-with-label">
            <label for="jobtitle" class="create-label">Job Title</label>
            <input class="input" type="text" id="jobtitle" name="jobtitle" placeholder="An eye catching title for your job">
        </div>
        <div class="input-with-label">
            <label for="jobdesc" class="create-label">Job Description</label>
            <textarea class="job-input" type="text" id="jobdesc" name="jobdesc" cols="30" rows="10" placeholder="What work do you need done?"></textarea>
        </div>
        <div class="input-with-label">
            <label for="jobadd" class="create-label">Address</label>
            <div class="addressline">
                <input class="input address" type="text" id="jobadd" name="jobadd" placeholder="Where are you located?">
                <select class="input dropdown" name="area" id="jobadd">
                    <option value="">Select Your Area</option>
                    <option value="Abdullahpur">Abdullahpur</option>
                    <option value="Agargaon">Agargaon</option>
                    <option value="Badda">Badda</option>
                    <option value="Banani">Banani</option>
                    <option value="Banasree">Banasree</option>
                    <option value="Baridhara">Baridhara</option>
                    <option value="Bashundhara">Bashundhara</option>
                    <option value="Bawnia">Bawnia</option>
                    <option value="Beraid">Beraid</option>
                    <option value="Cantonment area">Cantonment area</option>
                    <option value="Dakshinkhan">Dakshinkhan</option>
                    <option value="Dania">Dania</option>
                    <option value="Demra">Demra</option>
                    <option value="Dhanmondi">Dhanmondi</option>
                    <option value="Farmgate">Farmgate</option>
                    <option value="Gabtali">Gabtali</option>
                    <option value="Gulshan">Gulshan</option>
                    <option value="Hazaribagh">Hazaribagh</option>
                    <option value="Islampur">Islampur</option>
                    <option value="Jurain">Jurain</option>
                    <option value="Kafrul">Kafrul</option>
                    <option value="Kamalapur">Kamalapur</option>
                    <option value="Kamrangirchar">Kamrangirchar</option>
                    <option value="Kazipara">Kazipara</option>
                    <option value="Khilgaon">Khilgaon</option>
                    <option value="Khilkhet">Khilkhet</option>
                    <option value="Kotwali">Kotwali</option>
                    <option value="Lalbagh">Lalbagh</option>
                    <option value="Matuail">Matuail</option>
                    <option value="Mirpur">Mirpur</option>
                    <option value="Mohakhali">Mohakhali</option>
                    <option value="Mohammadpur">Mohammadpur</option>
                    <option value="Motijheel">Motijheel</option>
                    <option value="Nimtoli">Nimtoli</option>
                    <option value="Pallabi">Pallabi</option>
                    <option value="Paltan">Paltan</option>
                    <option value="Ramna">Ramna</option>
                    <option value="Rampura">Rampura</option>
                    <option value="Sabujbagh">Sabujbagh</option>
                    <option value="Sadarghat">Sadarghat</option>
                    <option value="Satarkul">Satarkul</option>
                    <option value="Shahbagh">Shahbagh</option>
                    <option value="Sher-e-Bangla Nagar">Sher-e-Bangla Nagar</option>
                    <option value="Shyampur">Shyampur</option>
                    <option value="Sutrapur">Sutrapur</option>
                    <option value="Tejgaon">Tejgaon</option>
                    <option value="Uttara">Uttara</option>
                    <option value="Uttarkhan">Uttarkhan</option>
                    <option value="Vatara">Vatara</option>
                    <option value="Wari">Wari</option>
                </select>
            </div>
            <p class="secondary-text">*Currently we are only operating in Dhaka City. Our services will open for other areas soon.</p>
        </div>

        <div class="date-time">
            <div class="input-with-label">
                <label for="date" class="create-label">Date of your Job </label>
                <input type="date" class="input" id="date" name="date" placeholder="date">
            </div>
            <div class="input-with-label">
                <label for="time" class="create-label">Time of your Job </label>
                <input type="time" class="input" id="time" name="time" placeholder="time">
            </div>
            <div class="input-with-label">
                <label for="salary" class="create-label">How much will you pay? (Tk/hour)</label>
                <div class="inputwithspan">
                    <span class="inputspan">Tk</span>
                    <input type="text" name="salary" id="salary" class="input" placeholder="500">
                </div>
            </div>
        </div>
        <div class="job-images">
            <div class="label" for="job-image">Upload Necessary Images: (Must upload 2 images)</div>
            <input class="input input-profile-image" id="job-image" name="job-image1" type="file" value="">
            <input class="input input-job-image input-profile-image" id="job-image" name="job-image2" type="file" value="">
        </div>

        <div class="error-message full-col">
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyfield") {
                    echo "<p class='error'>Fill in all fields</p>";
                } else if ($_GET["error"] == "lowSalary") {
                    echo "<p class='error'>Salary must be above 100tk per hour</p>";
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
                } else if ($_GET["error"] == "imageError") {
                    echo "<p class='error'>Only upload .jpeg, .jpg and .png images please</p>";
                }
            }
            ?>
        </div>

        <button class="btn-primary create-job-btn" name="create-button">Create Job</button>

    </form>

</div>

<?php
include_once 'footer.php';
?>