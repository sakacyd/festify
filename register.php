<?php
include 'db_connect.php';
include 'event-terdekat.php';
include 'head.php';
include 'header.php';

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger text-center'>" . $_SESSION["error"] . "</div>";
    unset($_SESSION["error"]);
}
if (isset($_SESSION["success"])) {
    echo "<div class='alert alert-success text-center'>" . $_SESSION["success"] . "</div>";
    unset($_SESSION["success"]);
}
?>


<!-- Register Form -->
<div class="page-heading-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Register for Festify</h2>
                <span>Create an account to access your tickets and manage events.</span>
            </div>
        </div>
    </div>
</div>

<div class="register-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="process-register.php" method="POST" class="form-box">
                    <div class="form-group">
                        <label for="nama_lengkap">Full Name</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Create a password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirm your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <div class="text-center mt-3">
                        <a href="login.php">Already have an account? Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- *** Footer *** -->
<?php
include 'footer.php';
?>

<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script>
<script src="assets/js/mixitup.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="assets/js/owl-carousel.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>
</body>

</html>