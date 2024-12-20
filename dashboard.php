<?php
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Ambil nama pengguna dari sesi
$nama_lengkap = $_SESSION['user']['nama_lengkap'];

include 'db_connect.php';
include 'event-terdekat.php';
include 'head.php';
include 'header.php';
?>


<!-- Dashboard Content -->
<div class="page-heading-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 h2>Welcome, <?php echo htmlspecialchars($nama_lengkap); ?>!</h2>
                <span>Here are your event details and account management options.</span>
            </div>
        </div>
    </div>
</div>

<div class="dashboard">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="tickets.html"><i class="fa fa-ticket"></i> My Tickets</a></li>
                        <li><a href="myaccount.php"><i class="fa fa-user"></i> Account Settings</a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <div class="content">
                    <h3>My Tickets</h3>
                    <p>Here you can view and manage your purchased tickets:</p>
                    <div class="ticket-list">
                        <div class="ticket-item">
                            <h4>LaLaLa Festival</h4>
                            <p><i class="fa fa-calendar"></i> 23 - 25 August 2024</p>
                            <p><i class="fa fa-map-marker"></i> Jakarta International Expo, Jakarta</p>
                            <a href="ticket-details-lalalafest.html" class="btn btn-primary">View Details</a>
                        </div>
                        <div class="ticket-item">
                            <h4>Forestra</h4>
                            <p><i class="fa fa-calendar"></i> 31 August 2024</p>
                            <p><i class="fa fa-map-marker"></i> Orchid Forest Cikole, Bandung</p>
                            <a href="ticket-details-forestra.html" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
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