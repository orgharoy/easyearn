<div class="footer">
    <div class="main-footer">
        <div class="footer-contents container">

            <div class="company-info">
                <img class="footer-logo" src="images/easyEARN-logo.png" alt="logo of easyEARN">
                <p>easyEARN is a job searching and posting platform for youngsters who are looking to earn some extra money.</p>
            </div>
            <div class="useful-links">
                <h3>Useful Links</h3>
                <a href="index.php">Home</a>
                <a href='profile.php?id=<?php $_SESSION['userid'] ?>'>View Profile</a>
                <a href='editprofile.php'>Edit Profile</a>
                <a href='myjobs.php'>Jobs Created</a>
                <a href='applied.php'>Applied To</a>
            </div>
            <div class="other-links">
                <h3>Our Address</h3>
                <div class="line">
                    <i class="fa-solid fa-phone"></i>
                    <p>+880 1767-476903</p>
                </div>
                <div class="line">
                    <i class="fa-solid fa-envelope"></i>
                    <p>orgharoy@gmail.com</p>
                </div>
                <div class="line">
                    <i class="fa-brands fa-facebook"></i>
                    <p>/orgha.roy7</p>
                </div>
                <div class="line">
                    <i class="fa-solid fa-location-dot"></i>
                    <p>Uttara, Dhaka, Bangladesh</p>
                </div>
            </div>

        </div>
    </div>
    <div class="copyright">
        <i class="fa-regular fa-copyright"></i>
        <a class="link" href="www.orgha.xyz">Orgha Roy</a>
    </div>
</div>

<script src="https://kit.fontawesome.com/5948e9a22f.js" crossorigin="anonymous"></script>

<script>
    const openNav = document.querySelector('.fa-bars');
    const closeNav = document.querySelector('.close-button');
    const nav = document.querySelector('.main-nav');

    openNav.addEventListener('click', () => {
        nav.classList.add('open-nav')
    })
    closeNav.addEventListener('click', () => {
        nav.classList.remove('open-nav')
    })
</script>
</body>

</html>