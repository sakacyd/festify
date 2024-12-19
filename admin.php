<?php
include 'db_connect.php';
include 'event-terdekat.php';
include 'head.php';
include 'header.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Proses input data venue
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_venue'])) {
    $nama_venue = $_POST['nama_venue'];
    $kota_venue = $_POST['kota_venue'];

    $sql = "INSERT INTO venue (nama_venue, kota_venue) VALUES ('$nama_venue', '$kota_venue')";
    $conn->query($sql);
}

// Proses input data event
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_event'])) {
    $nama_event = $_POST['nama_event'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_event = $_POST['tanggal_event'];
    $harga_tiket = $_POST['harga_tiket'];
    $id_venue = $_POST['id_venue'];

    // Proses upload gambar
    $ticket_image = uploadImage($_FILES['ticket_image']);
    $venue_image = uploadImage($_FILES['venue_image']);
    $event_page_image = uploadImage($_FILES['event_page_image']);
    $show_event_image = uploadImage($_FILES['show_event_image']);
    $like_image = uploadImage($_FILES['like_image']);
    $event_image = uploadImage($_FILES['event_image']);
    $ticket_detail_image = uploadImage($_FILES['ticket_detail_image']);

    $sql = "INSERT INTO event (nama_event, deskripsi, tanggal_event, harga_tiket, id_venue, ticket_image, venue_image, event_page_image, show_event_image, like_image, event_image, ticket_detail_image) 
            VALUES ('$nama_event', '$deskripsi', '$tanggal_event', '$harga_tiket', '$id_venue', '$ticket_image', '$venue_image', '$event_page_image', '$show_event_image', '$like_image', '$event_image', '$ticket_detail_image')";
    $conn->query($sql);
}

// Fungsi untuk upload gambar
function uploadImage($file)
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $target_file);
    return $target_file;
}
?>

<body>
    <div class="container">
        <h1>Admin Dashboard</h1>

        <h2>Input Venue</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nama_venue">Nama Venue</label>
                <input type="text" class="form-control" name="nama_venue" required>
            </div>
            <div class="form-group">
                <label for="kota_venue">Kota Venue</label>
                < input type="text" class="form-control" name="kota_venue" required>
            </div>
            <button type="submit" name="submit_venue" class="btn btn-primary">Submit Venue</button>
        </form>

        <h2>Input Event</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_event">Nama Event</label>
                <input type="text" class="form-control" name="nama_event" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" required></textarea>
            </div>
            <div class="form-group">
                <label for="tanggal_event">Tanggal Event</label>
                <input type="date" class="form-control" name="tanggal_event" required>
            </div>
            <div class="form-group">
                <label for="harga_tiket">Harga Tiket</label>
                <input type="number" class="form-control" name="harga_tiket" required>
            </div>
            <div class="form-group">
                <label for="id_venue">ID Venue</label>
                <input type="number" class="form-control" name="id_venue" required>
            </div>
            <div class="form-group">
                <label for="ticket_image">Ticket Image</label>
                <input type="file" class="form-control" name="ticket_image" required>
            </div>
            <div class="form-group">
                <label for="venue_image">Venue Image</label>
                <input type="file" class="form-control" name="venue_image" required>
            </div>
            <div class="form-group">
                <label for="event_page_image">Event Page Image</label>
                <input type="file" class="form-control" name="event_page_image" required>
            </div>
            <div class="form-group">
                <label for="show_event_image">Show Event Image</label>
                <input type="file" class="form-control" name="show_event_image" required>
            </div>
            <div class="form-group">
                <label for="like_image">Like Image</label>
                <input type="file" class="form-control" name="like_image" required>
            </div>
            <div class="form-group">
                <label for="event_image">Event Image</label>
                <input type="file" class="form-control" name="event_image" required>
            </div>
            <div class="form-group">
                <label for="ticket_detail_image">Ticket Detail Image</label>
                <input type="file" class="form-control" name="ticket_detail_image" required>
            </div>
            <button type="submit" name="submit_event" class="btn btn-primary">Submit Event</button>
        </form>
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