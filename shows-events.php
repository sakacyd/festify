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
                <h2>Our Shows & Events</h2>
                <span>Check out upcoming and past shows & events.</span>
            </div>
        </div>
    </div>
</div>

<div class="shows-events-tabs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="tabs">
                    <div class="col-lg-12">
                        <div class="heading-tabs">
                            <div class="row">
                                <div class="col-lg-8">
                                    <ul>
                                        <li><a href='#tabs-1'>Upcoming</a></li>
                                        <li><a href='#tabs-2'>Past</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <div class="main-dark-button">
                                        <a href="tickets.php">Purchase Tickets</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <section class='tabs-content'>
                            <article id='tabs-1'>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="heading">
                                            <h2>Upcoming</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="event-item">
                                                    <div class="row">
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="left-content">
                                                                <h4>LaLaLa Festival</h4>
                                                                <p>Festival musik lainnya yang nggak kalah seru adalah LaLaLa Festival yang bakal digelar di Jakarta International Expo pada 23-25 Agustus mendatang.</p>
                                                                <div class="main-dark-button"><a href="event-details.html">Discover More</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="thumb" style="display: flex; justify-content: center; align-items: center;">
                                                                <img src="assets/images/event-page-01.jpg" style="width: 300px; height: auto;" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="right-content">
                                                                <ul>
                                                                    <li>
                                                                        <i class="fa fa-calendar-o"></i>
                                                                        <h6>23 - 25 Agustus 2024</h6>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-map-marker"></i>
                                                                        <span>Jakarta International Expo, Jakarta</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="event-item">
                                                    <div class="row">
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="left-content">
                                                                <h4>Dieng Culture Festival</h4>
                                                                <p>Dieng Culture Festival 2024 akan menampilkan kirab budaya, penerbangan lampion, pesta kembang api dalam Gebyar Lentera, serta pertunjukan musik Jazz yang dikenal dengan Jazz Atas Awan.</p>
                                                                <div class="main-dark-button"><a href="event-details.html">Discover More</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="thumb">
                                                                <img src="assets/images/event-page-02.jpg" style="width: 300px; height: auto;" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="right-content">
                                                                <ul>
                                                                    <li>
                                                                        <i class="fa fa-calendar-o"></i>
                                                                        <h6>23 - 25 Agustus 2024</h6>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-map-marker"></i>
                                                                        <span>Desa Dieng Kulon, Banjarnegara</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="event-item">
                                                    <div class="row">
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="left-content">
                                                                <h4>Nexfest</h4>
                                                                <p>Nexfest 2024 akan memboyong legenda Bring Me to The Horizon dan Babymetal sebagai bintang tamunya.</p>
                                                                <div class="main-dark-button"><a href="event-details.html">Discover More</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="thumb">
                                                                <img src="assets/images/event-page-03.jpg" style="width: 300px; height: auto;" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="right-content">
                                                                <ul>
                                                                    <li>
                                                                        <i class="fa fa-calendar-o"></i>
                                                                        <h6>25 Agustus 2024</h6>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-map-marker"></i>
                                                                        <span>Pantai Carnaval Ancol, Jakarta</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="event-item">
                                                    <div class="row">
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="left-content">
                                                                <h4>Forestra</h4>
                                                                <p>Pertunjukan akan semakin ciamik dengan kolaborasi musik orkestra dengan musisi seperti Tulus, Isyana Sarasvati, Efek Rumah Kaca, Nadin Amizah, Diskoria dan Scaller.</p>
                                                                <div class="main-dark-button"><a href="event-details.html">Discover More</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="thumb">
                                                                <img src="assets/images/event-page-04.jpg" style="width: 300px; height: auto;" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="right-content">
                                                                <ul>
                                                                    <li>
                                                                        <i class="fa fa-clock-o"></i>
                                                                        <h6>31 Agustus 2024</h6>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-map-marker"></i>
                                                                        <span>Orchid Forest Cikole, Bandung</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                            </article>
                            <article id='tabs-2'>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="heading">
                                            <h2>Past</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="event-item">
                                                    <div class="row">
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="left-content">
                                                                <h4>Jakarta Sneaker Day</h4>
                                                                <p>Pameran sneakers dan streetwear terbesar di Indonesia ini digelar selama 3 hari.</p>
                                                                <div class="main-dark-button"><a href="event-details.html">Discover More</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="thumb">
                                                                <img src="assets/images/event-page-04.jpg" style="width: 300px; height: auto;" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="right-content">
                                                                <ul>
                                                                    <li>
                                                                        <i class="fa fa-calendar-o"></i>
                                                                        <h6>5, 6, 7 Juli 2024</h6>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-map-marker"></i>
                                                                        <span>Hall A, JCC Senayan, Jakarta</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="event-item">
                                                    <div class="row">
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="left-content">
                                                                <h4>The Sound Project</h4>
                                                                <p>Nggak sekadar gelaran musik, TSP7 ini juga diwarnai dengan berbagai booth yang bikin kamu ingin jajan.</p>
                                                                <div class="main-dark-button"><a href="event-details.html">Discover More</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="thumb">
                                                                <img src="assets/images/event-page-03.jpg" style="width: 300px; height: auto;" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="right-content">
                                                                <ul>
                                                                    <li>
                                                                        <i class="fa fa-calendar-o"></i>
                                                                        <h6>9 - 11 Agustus 2024</h6>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-map-marker"></i>
                                                                        <span>Allianz Ecopark, Jakarta</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="event-item">
                                                    <div class="row">
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="left-content">
                                                                <h4>The 90’s Festival</h4>
                                                                <p>Anak ‘90-an wajib banget ke The 90’s Festival 2024 ini. Festival musik ini akan ngajak kamu nostalgia tahun ‘90-an yang diadakan setiap tahunnya di Jakarta.</p>
                                                                <div class="main-dark-button"><a href="event-details.html">Discover More</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="thumb">
                                                                <img src="assets/images/event-page-02.jpg" style="width: 300px; height: auto;" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 d-flex align-items-center">
                                                            <div class="right-content">
                                                                <ul>
                                                                    <li>
                                                                        <i class="fa fa-calendar-o"></i>
                                                                        <h6>10 - 11 Agustus 2024</h6>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-map-marker"></i>
                                                                        <span>Gambir Expo Kemayoran, Jakarta</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                            </article>
                        </section>
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