<?php
include 'db_connect.php';
include 'event-terdekat.php';
include 'head.php';
include 'header.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Ambil data venue dan event untuk ditampilkan
$venues = $conn->query("SELECT * FROM venue ORDER BY nama_venue ASC");
$events = $conn->query("
    SELECT e.*, v.nama_venue, g.path_gambar 
    FROM event e
    LEFT JOIN venue v ON e.id_venue = v.id_venue
    LEFT JOIN gambar g ON e.gambar_event = g.id_gambar
    ORDER BY e.tanggal_event
");
?>

<div class="page-heading-shows-events">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Admin Dashboard</h2>
                <span>Control all shows & events.</span>
            </div>
        </div>
    </div>
</div>

<body>
    <div class="container">
        <h2>Manage Venues</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Venue</th>
                    <th>Kota Venue</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($venue = $venues->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $venue['nama_venue']; ?></td>
                        <td><?php echo $venue['kota_venue']; ?></td>
                        <td>
                            <button class="btn btn-warning edit-venue-btn" data-id="<?php echo $venue['id_venue']; ?>">Edit</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h3>Tambah Venue</h3>
        <form method="POST" action="process_add_venue.php">
            <div class="form-group">
                <label for="nama_venue">Nama Venue</label>
                <input type="text" class="form-control" name="nama_venue" required>
            </div>
            <div class="form-group">
                <label for="kota_venue">Kota Venue</label>
                <input type="text" class="form-control" name="kota_venue" required>
            </div>
            <button type="submit" name="submit_venue" class="btn btn-primary">Tambah Venue</button>
        </form>

        <!-- Modal Edit Venue -->
        <div class="modal fade" id="editVenueModal" tabindex="-1" role="dialog" aria-labelledby="editVenueModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editVenueModalLabel">Edit Venue</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editVenueForm" method="POST" action="process_edit_venue.php">
                            <input type="hidden" name="id_venue" id="editVenueId">
                            <div class="form-group">
                                <label for="editNamaVenue">Nama Venue</label>
                                <input type="text" class="form-control" name="nama_venue" id="editNamaVenue" required>
                            </div>
                            <div class="form-group">
                                <label for="editKotaVenue">Kota Venue</label>
                                <input type="text" class="form-control" name="kota_venue" id="editKotaVenue" required>
                            </div>
                            <button type="submit" name="update_venue" class="btn btn-primary">Update Venue</button>
                            <button type="button" class="btn btn-danger float-right delete-venue-btn" data-toggle="modal" data-target="#deleteVenueModal" data-id="<?php echo $venue['id_venue']; ?>">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Hapus Venue -->
        <div class="modal fade" id="deleteVenueModal" tabindex="-1" role="dialog" aria-labelledby="deleteVenueModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteVenueModalLabel">Hapus Venue</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="process_delete_venue.php" method="POST">
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus venue: <strong><span id="venueNameToDelete"></span></strong>?</p>
                            <input type="hidden" name="id_venue" id="deleteVenueId">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" name="delete_venue" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <h2>Manage Events</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Event</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Event</th>
                    <th>Harga Tiket</th>
                    <th>Lokasi Venue</th>
                    <th>Gambar Event</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($event = $events->fetch_assoc()): ?>
                    <tr>
                        <td data-venue-id="<?php echo $event['id_venue']; ?>"><?php echo $event['nama_event']; ?></td>
                        <td><?php echo $event['deskripsi']; ?></td>
                        <td><?php echo $event['tanggal_event']; ?></td>
                        <td><?php echo $event['harga_tiket']; ?></td>
                        <td><?php echo $event['nama_venue']; ?></td>
                        <td>
                            <?php if ($event['path_gambar']): ?>
                                <img src="<?php echo $event['path_gambar']; ?>" style="max-width: 100px;">
                            <?php else: ?>
                                No image
                            <?php endif; ?>
                        </td>
                        <td>
                            <button class="btn btn-warning edit-event-btn" data-id="<?php echo $event['id_event']; ?>">Edit</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h3>Tambah Event</h3>
        <form method="POST" action="process_add_event.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_event">Nama Event</label>
                <input type="text" class="form-control" name="nama_event" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="textarea" class="form-control" name="deskripsi" required>
            </div>
            <div class="form-group">
                <label for="tanggal_event">Tanggal Event</label>
                <input type="date" class="form-control" name="tanggal_event" required>
            </div>
            <div class="form-group">
                <label for="harga_tiket">Harga Tiket</label>
                <input type="text" class="form-control" name="harga_tiket" required>
            </div>
            <div class="form-group">
                <label for="id_venue">Nama Venue</label>
                <select class="form-control" name="id_venue" required>
                    <option value="" disabled selected>Pilih Venue</option>
                    <?php
                    $venues = $conn->query("SELECT * FROM venue");
                    while ($venue = $venues->fetch_assoc()): ?>
                        <option value="<?php echo $venue['id_venue']; ?>"><?php echo $venue['nama_venue']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="gambar_event">Gambar Event</label>
                <input type="file" class="form-control-file" name="gambar_event" required>
            </div>
            <button type="submit" name="submit_event" class="btn btn-primary">Tambah Event</button>
        </form>

        <!-- Modal Edit Event -->
        <div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editEventForm" method="POST" action="process_edit_event.php" enctype="multipart/form-data">
                            <input type="hidden" name="id_event" id="editEventId">
                            <div class="form-group">
                                <label for="editNamaEvent">Nama Event</label>
                                <input type="text" class="form-control" name="nama_event" id="editNamaEvent" required>
                            </div>
                            <div class="form-group">
                                <label for="editDeskripsi">Deskripsi</label>
                                <input type="textarea" class="form-control" name="deskripsi" id="editDeskripsi" required>
                            </div>
                            <div class="form-group">
                                <label for="editTanggalEvent">Tanggal Event</label>
                                <input type="date" class="form-control" name="tanggal_event" id="editTanggalEvent" required>
                            </div>
                            <div class="form-group">
                                <label for="editHargaTiket">Harga Tiket</label>
                                <input type="text" class="form-control" name="harga_tiket" id="editHargaTiket" required>
                            </div>
                            <div class="form-group">
                                <label for="editIdVenue">Nama Venue</label>
                                <select class="form-control" name="id_venue" id="editIdVenue" required>
                                    <?php
                                    // Ambil data venue untuk dropdown
                                    $venues = $conn->query("SELECT * FROM venue");
                                    while ($venue = $venues->fetch_assoc()): ?>
                                        <option value="<?php echo $venue['id_venue']; ?>"><?php echo $venue['nama_venue']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editGambarEvent">Gambar Event</label>
                                <input type="file" class="form-control-file" name="gambar_event" id="editGambarEvent">
                                <div id="currentImage" class="mt-2">
                                    <p>Current image:</p>
                                    <img id="previewCurrentImage" src="" style="max-width: 200px;">
                                </div>
                            </div>
                            <button type="submit" name="update_event" class="btn btn-primary">Update Event</button>
                            <button type="button" class="btn btn-danger float-right delete-event-btn" data-toggle="modal" data-target="#deleteEventModal" data-id="<?php echo $event['id_event']; ?>">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Hapus Event -->
        <div class="modal fade" id="deleteEventModal" tabindex="-1" role="dialog" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteEventModalLabel">Hapus Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="process_delete_event.php" method="POST">
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus event: <strong><span id="eventNameToDelete"></span></strong>?</p>
                            <input type="hidden" name="id_event" id="deleteEventId">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" name="delete_event" class="btn btn-danger">Hapus</button>
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

    <script>
        $(document).ready(function() {
            // Variabel global untuk menyimpan ID venue dan event
            var currentVenueId = null;
            var currentEventId = null;

            // Ketika tombol Edit Venue diklik
            $('.edit-venue-btn').click(function() {
                var venueId = $(this).data('id');
                var venueName = $(this).closest('tr').find('td:nth-child(1)').text();
                var venueCity = $(this).closest('tr').find('td:nth-child(2)').text();

                // Simpan ID venue ke variabel global
                currentVenueId = venueId;

                $('#editVenueId').val(venueId);
                $('#editNamaVenue').val(venueName);
                $('#editKotaVenue').val(venueCity);
                $('#editVenueModal').modal('show');
            });

            // Ketika tombol Delete di modal edit venue diklik
            $('#editVenueModal').on('click', '.delete-venue-btn', function() {
                // Ambil nama venue dari modal edit
                var venueName = $('#editNamaVenue').val();

                // Isi modal hapus dengan data venue
                $('#deleteVenueId').val(currentVenueId); // Gunakan ID venue yang disimpan di variabel global
                $('#venueNameToDelete').text(venueName);

                // Tampilkan modal hapus
                $('#deleteVenueModal').modal('show');
            });

            // Ketika tombol Edit Event diklik
            $('.edit-event-btn').click(function() {
                var eventId = $(this).data('id');
                var eventName = $(this).closest('tr').find('td:nth-child(1)').text();
                var eventDescription = $(this).closest('tr').find('td:nth-child(2)').text();
                var eventDate = $(this).closest('tr').find('td:nth-child(3)').text();
                var ticketPrice = $(this).closest('tr').find('td:nth-child(4)').text();
                var venueId = $(this).closest('tr').find('td:nth-child(1)').data('venue-id');
                var imgSrc = $(this).closest('tr').find('td:nth-child(6) img').attr('src');

                // Simpan ID event ke variabel global
                currentEventId = eventId;

                // Isi form modal dengan data event
                $('#editEventId').val(eventId);
                $('#editNamaEvent').val(eventName);
                $('#editDeskripsi').val(eventDescription);
                $('#editTanggalEvent').val(eventDate);
                $('#editHargaTiket').val(ticketPrice);

                // Set nilai default dropdown Nama Venue
                $('#editIdVenue').val(venueId);

                // Tampilkan modal
                $('#editEventModal').modal('show');
            });

            // Ketika tombol Delete di modal edit event diklik
            $('#editEventModal').on('click', '.delete-event-btn', function() {
                // Ambil nama event dari modal edit
                var eventName = $('#editNamaEvent').val();

                // Isi modal hapus dengan data event
                $('#deleteEventId').val(currentEventId); // Gunakan ID event yang disimpan di variabel global
                $('#eventNameToDelete').text(eventName);

                // Tampilkan modal hapus
                $('#deleteEventModal').modal('show');
            });

            // Handler untuk tombol delete venue di halaman utama
            $('.delete-venue-btn').click(function() {
                var venueId = $(this).data('id');
                var venueName = $(this).closest('tr').find('td:eq(1)').text(); // Mengambil nama venue dari baris tabel

                $('#deleteVenueId').val(venueId);
                $('#venueNameToDelete').text(venueName);
                $('#deleteVenueModal').modal('show');
            });

            // Handler untuk tombol delete event di halaman utama
            $('.delete-event-btn').click(function() {
                var eventId = $(this).data('id');
                var eventName = $(this).closest(' tr').find('td:eq(1)').text(); // Mengambil nama event dari baris tabel

                $('#deleteEventId').val(eventId);
                $('#eventNameToDelete').text(eventName);
                $('#deleteEventModal').modal('show');
            });
        });
    </script>
</body>

</html>