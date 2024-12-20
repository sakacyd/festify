<?php
include 'db_connect.php';
include 'event-terdekat.php';
include 'head.php';
include 'header.php';
?>

<!-- ***** About Us Page ***** -->
<div class="page-heading-shows-events">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>Tickets On Sale Now!</h2>
        <span>Check out upcoming shows & events and grab your ticket right now.</span>
      </div>
    </div>
  </div>
</div>

<div class="tickets-page">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="heading">
          <h2>Tickets Page</h2>
        </div>
      </div>

      <?php if (!empty($event)) { ?>
        <?php foreach ($event as $concert) { ?>
          <div class="col-lg-4">
            <div class="ticket-item">
              <div class="thumb">
                <img src="<?php echo $concert['image']; ?>" alt="">
                <div class="harga_tiket">
                  <span>1 ticket<br>from <em><?php echo $concert['harga_tiket']; ?></em></span>
                </div>
              </div>
              <div class="down-content">
                <h4><?php echo $concert['nama_event']; ?></h4>
                <ul>
                  <li><i class="fa fa-calendar-o"></i> <?php echo date('d M Y', strtotime($concert['tanggal_event'])); ?></li>
                  <li><i class="fa fa-map-marker"></i><?php echo $concert['nama_venue']; ?></li>
                </ul>
                <div class="main-dark-button">
                  <a href="ticket-details.php?id=<?php echo $concert['id']; ?>">Purchase Tickets</a>  
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php } else { ?>
        <div class="col-lg-12">
          <p>Tidak ada event yang ditemukan.</p>
        </div>
      <?php } ?>

      <div class="col-lg-12">
        <div class="pagination">
          <ul>
            <li><a href="#">Prev</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">Next</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- *** Subscribe *** -->
<div class="col-lg-12">
  <div class="sub-footer">
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