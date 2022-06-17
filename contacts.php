<?php
$currentPage = 'contact';
include "frontend/includes/header.php";
?>
<!-- Contact info-->
<section class="section section-lg bg-default text-center" style="padding:200px 0; background:#f1f1f1;">
    <div class="container container-wide">
        <div class="row row-fix row-50 row-custom-bordered">
            <div class="col-sm-6 col-lg-3">
                <!-- Box minimal-->
                <article class="box-simple">
                    <?php
                    $sql = "SELECT * FROM users WHERE id='1'";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($query);
                    ?>
                    <div class="box-simple-icon novi-icon mdi mdi-map-marker"></div>
                    <h6>Address</h6>
                    <div class="box-simple-text"><?php echo $row['address']; ?></div>
                </article>
            </div>
            <div class="col-sm-6 col-lg-3">
                <!-- Box simple-->
                <article class="box-simple">
                    <div class="box-simple-icon novi-icon mdi mdi-phone"></div>
                    <h6>phones</h6>
                    <div class="box-simple-text">
                        <a href="tel:<?php echo $row['email']; ?>"><?php echo $row['phoneno']; ?></a>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-lg-3">
                <!-- Box simple-->
                <article class="box-simple">
                    <div class="box-simple-icon novi-icon mdi mdi-email-open"></div>
                    <h6>e-mail</h6>
                    <div class="box-simple-text">
                        <ul class="list-comma list-0">
                            <li><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></li>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-lg-3">
                <!-- Box simple-->
                <article class="box-simple">
                    <div class="box-simple-icon novi-icon mdi mdi-calendar-clock"></div>
                    <h6>opening hours</h6>
                    <div class="box-simple-text">
                        <ul class="list-0">
                            <li>Mon–Fri: 9:00 am–6:00 pm</li>
                            <li>Sat–Sun: 11:00 am–4:00 pm</li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>


<!-- Page Footer-->
<?php
include "frontend/includes/footer.php";
?>      