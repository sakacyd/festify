<?php
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Ambil informasi pengguna dari sesi
$user_id = $_SESSION['user']['id_user'];
$user_name = $_SESSION['user']['nama_lengkap'];
$user_email = $_SESSION['user']['email'];

// Proses pembaruan data pengguna
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_name = trim($_POST['nama_lengkap']);
    $new_email = trim($_POST['email']);
    $new_password = trim($_POST['password']);

    if (!empty($new_name) && !empty($new_email)) {
        // Update nama dan email
        $stmt = $conn->prepare("UPDATE akun SET nama_lengkap = ?, email = ? WHERE id_akun = ?");
        $stmt->bind_param("ssi", $new_name, $new_email, $user_id);

        if ($stmt->execute()) {
            // Perbarui sesi pengguna
            $_SESSION['user']['nama_lengkap'] = $new_name;
            $_SESSION['user']['email'] = $new_email;

            $_SESSION['success'] = "Account updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update account.";
        }
        $stmt->close();
    }

    // Update password jika diisi
    if (!empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE akun SET password = ? WHERE id_akun = ?");
        $stmt->bind_param("si", $hashed_password, $user_id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Password updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update password.";
        }
        $stmt->close();
    }

    header("Location: myaccount.php");
    exit();
}

include 'db_connect.php';
include 'event-terdekat.php';
include 'head.php';
include 'header.php';
?>

<!-- Account Page Content -->
<div class="page-heading-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>My Account</h2>
                <span>Manage your personal information and account settings.</span>
            </div>
        </div>
    </div>
</div>

<div class="account-settings">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Success/Error Messages -->
                <?php
                if (isset($_SESSION['success'])) {
                    echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
                    unset($_SESSION['success']);
                }
                if (isset($_SESSION['error'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
                    unset($_SESSION['error']);
                }
                ?>

                <form action="myaccount.php" method="POST" class="form-box">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="nama_lengkap" id="name" class="form-control" value="<?php echo htmlspecialchars($user_name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($user_email); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Leave blank to keep current password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update Account</button>
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