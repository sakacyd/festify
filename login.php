<?php
include 'db_connect.php';
include 'event-terdekat.php';
include 'head.php';
include 'header.php';

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger text-center'>" . $_SESSION["error"] . "</div>";
    unset($_SESSION["error"]);
}
?>

<!-- Login Form -->
<div class="page-heading-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Login to Festify</h2>
                <span>Access your account and manage tickets.</span>
            </div>
        </div>
    </div>
</div>

<div class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="process-login.php" method="POST" class="form-box">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <div class="text-center mt-3">
                        <a href="register.php">Don't have an account? Register</a>
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