<?php
include 'db_connect.php';
include 'event-terdekat.php';
include 'head.php';
include 'header.php';
?>

<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner">
  <div class="counter-content">
    <ul>
      <li>Days<span id="days"><?php echo $days; ?></span></li>
      <li>Hours<span id="hours"><?php echo str_pad($hours, 2, '0', STR_PAD_LEFT); ?></span></li>
      <li>Minutes<span id="minutes"><?php echo str_pad($minutes, 2, '0', STR_PAD_LEFT); ?></span></li>
      <li>Seconds<span id="seconds"><?php echo str_pad($seconds, 2, '0', STR_PAD_LEFT); ?></span></li>
    </ul>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="main-content">
          <div class="next-show">
            <i class="fa fa-arrow-up"></i>
            <span>Next Show</span>
          </div>
          <h6>Opening on <?php echo date("l, F jS", strtotime($event[0]['tanggal_event'])); ?></h6>
          <h2><?php echo $event[0]['nama_event']; ?></h2>
          <div class="main-white-button">
            <a href="ticket-details-<?php echo strtolower(str_replace(' ', '-', $event[0]['nama_event'])); ?>.php">Purchase Tickets</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- *** Owl Carousel Items ***-->
<div class="show-events-carousel">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="owl-show-events owl-carousel">
          <div class="item">
            <a href="event-details.php"><img src="assets/images/show-events-01.jpg" alt="" /></a>
          </div>
          <div class="item">
            <a href="event-details.php"><img src="assets/images/show-events-02.jpg" alt="" /></a>
          </div>
          <div class="item">
            <a href="event-details.php"><img src="assets/images/show-events-03.jpg" alt="" /></a>
          </div>
          <div class="item">
            <a href="event-details.php"><img src="assets/images/show-events-04.jpg" alt="" /></a>
          </div>
          <div class="item">
            <a href="event-details.php"><img src="assets/images/show-events-01.jpg" alt="" /></a>
          </div>
          <div class="item">
            <a href="event-details.php"><img src="assets/images/show-events-02.jpg" alt="" /></a>
          </div>
          <div class="item">
            <a href="event-details.php"><img src="assets/images/show-events-03.jpg" alt="" /></a>
          </div>
          <div class="item">
            <a href="event-details.php"><img src="assets/images/show-events-04.jpg" alt="" /></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- *** Amazing Venus ***-->
<div class="amazing-venues">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="left-content">
          <h4>Four Biggest Events of the Year</h4>
          <p>
            Get ready for a spectacular year filled with unmissable events!
            From electrifying music festivals to captivating cultural
            celebrations, this year's lineup offers something for everyone.
            Featured in this year's lineup are some of the most iconic
            events: <br />
            <b>LaLaLa Festival</b>, where nature and music blend
            harmoniously in the heart of the forest <br />
            <b>Dieng Culture Festival</b>, a celebration of heritage with
            mesmerizing cultural performances <br />
            <b>Nexfest</b>, a gathering of today's hottest music acts under
            one roof <br />
            and <b>Forestra</b>, an extraordinary concert series set amidst
            the serene backdrop of lush forests. <br />
            Each of these events promises a unique and thrilling experience,
            bringing together artists, culture, and nature in spectacular
            ways.
          </p>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="right-content">
          <h5><i class="fa fa-map-marker"></i> Visit Us</h5>
          <span>Jl. Lenteng Agung Raya No.56, <br />Jakarta Selatan, 12630<br />Indonesia</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- *** Map ***-->
<div class="map-image">
  <img src="assets/images/map-image.jpg" alt="Maps of 3 Venues" />
</div>

<!-- *** Venues & Tickets ***-->
<div class="venue-tickets">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading">
          <h2>Our Shows & Events</h2>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="venue-item">
          <div class="thumb">
            <img src="assets/images/venue-01.jpg" alt="" />
          </div>
          <div class="down-content">
            <div class="left-content">
              <div class="main-white-button">
                <a href="ticket-details-lalalafest.html">Purchase Tickets</a>
              </div>
            </div>
            <div class="right-content">
              <h4>LaLaLa Festival</h4>
              <p>
                LaLaLa Festival was founded orginally from dream that turned
                into reality in 2016.
              </p>
              <div class="price">
                <span>1 ticket<br />from <em>Rp300.000</em></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="venue-item">
          <div class="thumb">
            <img src="assets/images/venue-02.jpg" alt="" />
          </div>
          <div class="down-content">
            <div class="left-content">
              <div class="main-white-button">
                <a href="ticket-details-nexfest.html">Purchase Tickets</a>
              </div>
            </div>
            <div class="right-content">
              <h4>Nexfest</h4>
              <p>
                Dynamic performances and genre-defying sound continue to
                captivate audiences worldwide.
              </p>
              <div class="price">
                <span>1 ticket<br />from <em>Rp200.000</em></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="venue-item">
          <div class="thumb">
            <img src="assets/images/venue-03.jpg" alt="" />
          </div>
          <div class="down-content">
            <div class="left-content">
              <div class="main-white-button">
                <a href="ticket-details-forestra.html">Purchase Tickets</a>
              </div>
            </div>
            <div class="right-content">
              <h4>Forestra</h4>
              <p>
                An orchestra performance in the heart of the forest, the
                only one of its kind in Indonesia.
              </p>
              <div class="price">
                <span>1 ticket<br />from <em>Rp150.000</em></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- *** Coming Events ***-->
<div class="coming-events">
  <div class="left-button">
    <div class="main-white-button">
      <a href="shows-events.html">Discover More</a>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="event-item">
          <div class="thumb">
            <a href="event-details.php"><img src="assets/images/event-01.jpg" alt="" /></a>
          </div>
          <div class="down-content">
            <a href="event-details.php">
              <h4>LaLaLa Festival</h4>
            </a>
            <ul>
              <li><i class="fa fa-calendar-o"></i> Friday - Sunday</li>
              <li>
                <i class="fa fa-map-marker"></i> Jakarta International Expo,
                Jakarta
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="event-item">
          <div class="thumb">
            <a href="event-details.php"><img src="assets/images/event-02.jpg" alt="" /></a>
          </div>
          <div class="down-content">
            <a href="event-details.php">
              <h4>Nexfest</h4>
            </a>
            <ul>
              <li><i class="fa fa-calendar-o"></i> Sunday</li>
              <li>
                <i class="fa fa-map-marker"></i> Pantai Carnaval Ancol,
                Jakarta
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="event-item">
          <div class="thumb">
            <a href="event-details.php"><img src="assets/images/event-03.jpg" alt="" /></a>
          </div>
          <div class="down-content">
            <a href="event-details.php">
              <h4>Forestra</h4>
            </a>
            <ul>
              <li><i class="fa fa-calendar-o"></i> Saturday</li>
              <li>
                <i class="fa fa-map-marker"></i> Orchid Forest Cikole,
                Bandung
              </li>
            </ul>
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

<script>
  var countDownDate = new Date("<?php echo date('Y-m-d H:i:s', $concertDateTime); ?>").getTime();
  var distance, days, hours, minutes, seconds;

  function updateCountdown() {
    var now = new Date().getTime();
    distance = countDownDate - now;

    days = Math.floor(distance / (1000 * 60 * 60 * 24));
    hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = ("0" + hours).slice(-2);
    document.getElementById("minutes").innerHTML = ("0" + minutes).slice(-2);
    document.getElementById("seconds").innerHTML = ("0" + seconds).slice(-2);

    if (distance < 0) {
      clearInterval(timerInterval);
      document.getElementById("days").innerHTML = "0";
      document.getElementById("hours").innerHTML = "00";
      document.getElementById("minutes").innerHTML = "00";
      document.getElementById("seconds").innerHTML = "00";
    }

    requestAnimationFrame(updateCountdown);
  }

  updateCountdown();
</script>
</body>

</html>