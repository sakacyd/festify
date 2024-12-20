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
$venues = $conn->query("SELECT * FROM venue");
$events = $conn->query("SELECT * FROM event");
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
                    <th>ID</th>
                    <th>Nama Venue</th>
                    <th>Kota Venue</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($venue = $venues->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $venue['id_venue']; ?></td>
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
                            <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteVenueModal" data-id="<?php echo $venue['id_venue']; ?>">Delete</button>
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
                            <p>Apakah Anda yakin ingin menghapus venue ini?</p>
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
                    <th>Tanggal Event</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Gambar Event</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM event");
                while ($event = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $event['nama_event']; ?></td>
                        <td><?php echo $event['tanggal_event']; ?></td>
                        <td><?php echo $event['deskripsi']; ?></td>
                        <td><?php echo $event['harga']; ?></td>
                        <td><img src="<?php echo $event['gambar_event']; ?>" alt="Gambar Event" style="width:100px;height:auto;"></td>
                        <td>
                            <button class="btn btn-warning edit-event-btn" data-id="<?php echo $event['id_event']; ?>">Edit</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <h3>Tambah Event</h3>
        <form method="POST" action="process_add_event.php">
            <div class="form-group">
                <label for="nama_event">Nama Event</label>
                <input type="text" class="form-control" name="nama_event" required>
            </div>
            <div class="form-group">
                <label for="tanggal_event">Tanggal Event</label>
                <input type="date" class="form-control" name="tanggal_event" required>
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
                        <form id="editEventForm" method="POST" action="process_edit_event.php">
                            <input type="hidden" name="id_event" id="editEventId">
                            <div class="form-group">
                                <label for="editNamaEvent">Nama Event</label>
                                <input type="text" class="form-control" name="nama_event" id="editNamaEvent" required>
                            </div>
                            <div class="form-group">
                                <label for="editTanggalEvent">Tanggal Event</label>
                                <input type="date" class="form-control" name="tanggal_event" id="editTanggalEvent" required>
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
                            <button type="submit" name="update_event" class="btn btn-primary">Update Event</button>
                            <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteEventModal" data-id="<?php echo $event['id_event']; ?>">Delete</button>
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
                            <p>Apakah Anda yakin ingin menghapus event ini?</p>
                            <input type="hidden" name="id_event" id="deleteEventId"> <!-- Input hidden untuk ID Event -->
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
            // Ketika tombol Edit Venue diklik
            $('.edit-venue-btn').click(function() {
                var venueId = $(this).data('id');
                var venueName = $(this).closest('tr').find('td:nth-child(2)').text();
                var venueCity = $(this).closest('tr').find('td :nth-child(3)').text();

                $('#editVenueId').val(venueId);
                $('#editNamaVenue').val(venueName);
                $('#editKotaVenue').val(venueCity);
                $('#editVenueModal').modal('show');
            });

            // Ketika tombol Edit Event diklik
            $('.edit-event-btn').click(function() {
                var eventId = $(this).data('id');
                var eventName = $(this).closest('tr').find('td:nth-child(2)').text();
                var eventDate = $(this).closest('tr').find('td:nth-child(3)').text();
                var venueId = $(this).closest('tr').find('td:nth-child(4)').data('venue-id'); // Pastikan venue ID disimpan di data atribut

                $('#editEventId').val(eventId);
                $('#editNamaEvent').val(eventName);
                $('#editTanggalEvent').val(eventDate);
                $('#editIdVenue').val(venueId);
                $('#editEventModal').modal('show');
            });
        });

        // Mengisi ID Venue ke Modal Hapus
        $('#deleteVenueModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var idVenue = button.data('id'); // Ambil ID dari data-id atribut
            var modal = $(this);
            modal.find('#deleteVenueId').val(idVenue);

            // Debugging: Tampilkan ID di console
            console.log("ID Venue yang akan dihapus: " + idVenue);
        });

        // Mengisi ID Venue ke Modal Hapus
        $('#deleteEventModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var idEvent = button.data('id'); // Ambil ID dari data-id atribut
            var modal = $(this);
            modal.find('#deleteEventId').val(idEvent);

            // Debugging: Tampilkan ID di console
            console.log("ID Event yang akan dihapus: " + idEvent);
        });
    </script>
</body>

</html>