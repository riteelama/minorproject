<!--BODY SECTION -->
<!--Including header file in site-->
<?php 
include "frontend/includes/about-header.php";
?>
<!-- hi, we are brave-->
<!--INTRO SECTION-->
<section class="section section-lg bg-default">
    <div class="container container-bigger">
        <div class="row row-50 justify-content-md-center align-items-lg-center justify-content-xl-between flex-lg-row-reverse">
            <div class="col-md-10 col-lg-6 col-xl-5">
                <?php 
                    $sql = "SELECT * FROM users WHERE status='1' AND id='1'";
                    $query = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($query);
                ?>
                <h3>hi, we are Travel booker</h3>
                <div class="divider divider-decorate"></div>
                <p class="heading-5">We are glad to a part of your great trekking and tour plan. We allow you to create packages as an agents annd book the packages as an cutsomers. </p>
                <p class="text-spacing-sm">Hop on boat with us to get into the great journeys of your life with us. 
                </p>
            </div>
            <div class="col-md-10 col-lg-6"><img src="uploads/images/about-banner.jpg" alt="" width="720" height="459" />
            </div>
        </div>
    </div> 
</section>

<!-- our agents-->
<section class="section section-lg text-center novi-background bg-cover" style="background: #f1f1f1;">
    <div class="container container-wide">
        <h3>TOP AGENTS</h3>
        <div class="divider divider-decorate"></div>
        <div class="row row-50 row-xxl-90 justify-content-sm-center offset-custom-2">
            <?php 
                $sql = "SELECT * FROM users WHERE status = '1' AND role_id = '2' ORDER BY id LIMIT 3";
                // var_dump($sql);
                $query = mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($query)):
            ?>
            <div class="col-md-6 col-lg-3">
                <div class="team-classic team-classic-circle">
                    <figure><img class="rounded-circle" src="uploads/images/<?php echo $row['profile_picture']?>" alt="" style="height:300px; width:300px;"/>
                    </figure>
                    <div class="team-classic-caption">
                        <h5 class="team-classic-title"><?php echo $row['fullname'];?></h5>
                    </div>
                </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
    <a class="button button-sm button-secondary button-nina" href="agents.php">View All Agents</a>
</section>

<section class="section section-lg bg-default text-center">
  <div class="container mt-md-5">
    <h3>Top Packages</h3>
    <div class="divider divider-decorate"></div>
        <div class="row row-50">
        <?php 
        $sql = "SELECT * FROM packages where status = '1' ORDER BY id ASC LIMIT 6";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($query)):
        ?>
        <div class="col-md-6 col-xl-4">
          <article class="event-default-wrap">
            <div class="event-default">
              <figure class="event-default-image"><img src="uploads/images/<?php echo $row['image'];?>" alt="" width="570" height="370"/>
              </figure>
              <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="#">learn more</a></div>
            </div>
            <div class="event-default-inner">
              <h5><a class="event-default-title" href="package-view.php?id=<?php echo $row['id']?>"><?php echo $row['name'];?></a></h5><span class="heading-5"><?php echo $row['price'];?></span>
            </div>
          </article>
        </div>
        <?php endwhile ?>
        <!--END OF PACKAGE SHOWCASE-->
    </div>
  </div>
  <a class="button button-sm button-secondary button-nina" href="packages.php">View All Packages</a>
</section>

<!-- INCLUDING Footer SECTION-->
<?php 
include "frontend/includes/footer.php";
?>