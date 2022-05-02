<!--BODY SECTION -->
<!--Including header file in site-->
<?php 
include "frontend/includes/header.php";
?>
<section class="section">
  <div class="swiper-form-wrap">
    <!-- Swiper-->
    <div class="swiper-container swiper-slider swiper-slider_height-1 swiper-align-left swiper-align-left-custom context-dark bg-gray-darker" data-loop="false" data-autoplay="5500" data-simulate-touch="false" data-slide-effect="fade">
      <div class="swiper-wrapper">
      <?php 
        $sql = "SELECT * FROM posts WHERE status='1' ORDER BY id ASC LIMIT 3";
        $query = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($query)):

      ?>
        <div class="swiper-slide" data-slide-bg="uploads/images/<?php echo $row['image'];?>">
          <div class="swiper-slide-caption">
            <div class="container container-bigger swiper-main-section">
              <div class="row row-fix justify-content-sm-center justify-content-md-start">
                <div class="col-md-6 col-lg-5 col-xl-4 col-xxl-5">
                  <h3><?php echo $row['title'];?></h3>
                  <div class="divider divider-decorate"></div>
                  <p class="text-spacing-sm">We offer a variety of destinations to travel to, ranging from exotic to some extreme ones. They include very popular countries and cities like Paris, Rio de Janeiro, Cairo and a lot of others.</p><a class="button button-default-outline button-nina button-sm" href="#">learn more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
          <?php endwhile ?>
        <!-- <div class="swiper-slide" data-slide-bg="frontend/includes/images/swiper-slide-2.jpg">
          <div class="swiper-slide-caption">
            <div class="container container-bigger swiper-main-section">
              <div class="row row-fix justify-content-sm-center justify-content-md-start">
                <div class="col-md-6 col-lg-5 col-xl-4 col-xxl-5">
                  <h3>The Trip of Your Dream</h3>
                  <div class="divider divider-decorate"></div>
                  <p class="text-spacing-sm">Our travel agency is ready to offer you an exciting vacation that is designed to fit your own needs and wishes. Whether it’s an exotic cruise or a trip to your favorite resort, you will surely have the best experience.</p><a class="button button-default-outline button-nina button-sm" href="#">learn more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide" data-slide-bg="frontend/includes/images/swiper-slide-3.jpg">
          <div class="swiper-slide-caption">
            <div class="container container-bigger swiper-main-section">
              <div class="row row-fix justify-content-sm-center justify-content-md-start">
                <div class="col-md-6 col-lg-5 col-xl-4 col-xxl-5">
                  <h3>unique Travel Insights</h3>
                  <div class="divider divider-decorate"></div>
                  <p class="text-spacing-sm">Our team is ready to provide you with unique weekly travel insights that include photos, videos, and articles about untravelled tourist paths. We know everything about the places you’ve never been to!</p><a class="button button-default-outline button-nina button-sm" href="#">learn more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <!-- Swiper controls-->
      <div class="swiper-pagination-wrap">
        <div class="container container-bigger">
          <div class="row">
            <div class="col-sm-12">
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container container-bigger form-request-wrap form-request-wrap-modern">
      <div class="row row-fix justify-content-sm-center justify-content-lg-end">
        <div class="col-lg-6 col-xxl-5">
          <div class="form-request form-request-modern bg-gray-lighter novi-background">
            <h4>Find your Tour</h4>
            <!-- RD Mailform-->
            <form class="rd-mailform form-fix">
              <div class="row row-20 row-fix">
                <div class="col-sm-12">
                  <label class="form-label-outside">From</label>
                  <div class="form-wrap form-wrap-inline">
                    <select class="form-input select-filter" data-placeholder="All" data-minimum-results-for-search="Infinity" name="city">
                      <option value="1">New York</option>
                      <option value="2">Lisbon</option>
                      <option value="3">Stockholm</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <label class="form-label-outside">To</label>
                  <div class="form-wrap form-wrap-inline">
                    <select class="form-input select-filter" data-placeholder="All" data-minimum-results-for-search="Infinity" name="city">
                      <option value="1">Chicago</option>
                      <option value="2">Madrid</option>
                      <option value="3">Paris</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                  <label class="form-label-outside">Depart Date</label>
                  <div class="form-wrap form-wrap-validation">
                    <!-- Select -->
                    <input class="form-input" id="dateForm" name="date" type="text" data-time-picker="date">
                    <label class="form-label" for="dateForm">Choose the date</label>
                    <!--select.form-input.select-filter(data-placeholder="All", data-minimum-results-for-search="Infinity",  name='city')-->
                    <!--  option(value="1") Choose the date-->
                    <!--  option(value="2") Primary-->
                    <!--  option(value="3") Middle-->
                  </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                  <label class="form-label-outside">Duration</label>
                  <div class="form-wrap form-wrap-validation">
                    <!-- Select 2-->
                    <select class="form-input select-filter" data-placeholder="All" data-minimum-results-for-search="Infinity" name="city">
                      <option value="1">Any length</option>
                      <option value="2">2 days</option>
                      <option value="3">3 days</option>
                      <option value="4">4 days</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <label class="form-label-outside">Adults</label>
                  <div class="form-wrap form-wrap-modern">
                    <input class="form-input input-append" id="form-element-stepper" type="number" min="0" max="300" value="2">
                  </div>
                </div>
                <div class="col-lg-6">
                  <label class="form-label-outside">Children</label>
                  <div class="form-wrap form-wrap-modern">
                    <input class="form-input input-append" id="form-element-stepper-1" type="number" min="0" max="300" value="0">
                  </div>
                </div>
              </div>
              <div class="form-wrap form-button">
                <button class="button button-block button-secondary" type="submit">search flight</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-variant-1 bg-default novi-background bg-cover"> 
  <div class="container container-wide">
    <div class="row row-fix justify-content-xl-end row-30 text-center text-xl-left">
      <div class="col-xl-8">
        <div class="parallax-text-wrap">
          <h3>Our Best Tours Packages</h3><span class="parallax-text">Popular Packges</span>
        </div>
        <hr class="divider divider-decorate">
      </div>
      <div class="col-xl-3 text-xl-right"><a class="button button-secondary button-nina" href="#">view all packages</a></div>
    </div>
    <!--PACKAGES SHOWCASE-->
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
              <h5><a class="event-default-title" href="#"><?php echo $row['name'];?></a></h5><span class="heading-5"><?php echo $row['price'];?></span>
            </div>
          </article>
        </div>
        <?php endwhile ?>
        <!--END OF PACKAGE SHOWCASE-->
    </div>
  </div>
</section>
      
<!-- Tips & tricks-->
<section class="section section-lg novi-background bg-cover bg-default text-center">
  <div class="container-wide">
    <div class="row row-50"></div>
      <div class="col-sm-12">
        <h3>Latest News</h3>
        <div class="divider divider-decorate"></div>
        <!-- Owl Carousel-->
        <!--BLOG SECTION-->
        <div class="owl-carousel owl-carousel-team owl-carousel-inset" data-items="1" data-md-items="2" data-xl-items="3" data-stage-padding="15" data-loop="true" data-margin="30" data-mouse-drag="false" data-dots="true" data-autoplay="true">
        <?php 
        $sql = "SELECT * FROM posts where status = '1' ORDER BY id ASC LIMIT 4";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($query)):
        ?>  
        <article class="post-blog"><a class="post-blog-image" href="#"><img src="uploads/images/<?php echo $row['image'];?>" alt="" width="570" height="415"/></a>
          <div class="post-blog-caption">
              <div class="post-blog-caption-body">
                <h5><a class="post-blog-title" href="#"><?php echo $row['title'];?></a></h5>
              </div>
              <div class="post-blog-caption-footer">
                <time datetime="2019"><?php echo $row['postdate'];?></time>
              </div>
            </div>
          </article>
          <?php endwhile ?>
          <!--END BLOG SECTION-->
        </div>
      </div>
      <div class="col-12"><a class="button button-secondary button-nina button-offset-lg" href="blog.php">view all blog posts</a></div>
   </div>
  </div>
</section>

<!--TESTIMONIAL SECTION-->
<section class="section section-lg text-center bg-gray-lighter novi-background bg-cover">
  <div class="container container-bigger">
    <h3>View our testimonials</h3>
    <div class="divider divider-decorate"></div>
    <!-- Owl Carousel-->
    <div class="owl-carousel owl-layout-1" data-items="1" data-dots="true" data-nav="true" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="false" data-autoplay="true">
    <?php 
        $sql = "SELECT * FROM comments";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($query)):
        ?>  
      <article class="quote-boxed">
        <?php
        $id = $row['user_comid'];
        // var_dump($id);
        $subsql = "SELECT * FROM users WHERE id = '$id'";
        // var_dump($subsql);
        $subquery = mysqli_query($conn,$subsql);
        $subrow = mysqli_fetch_assoc($subquery);
        ?>      
        <div class="quote-boxed-aside"><img class="quote-boxed-image" src="uploads/images/<?php echo $subrow['profile_picture'];?>" alt="" width="210" height="210"/>
        </div>
        <div class="quote-boxed-main">
          <div class="quote-boxed-text">
            <p><?php echo $row['comments'];?></p>
          </div>
          <div class="quote-boxed-meta">
            <p class="quote-boxed-cite"><?php 
            // $id = $row['user_comid'];
            // // var_dump($id);
            // $subsql = "SELECT * FROM users WHERE id = '$id'";
            // // var_dump($subsql);
            // $subquery = mysqli_query($conn,$subsql);
            // $subrow = mysqli_fetch_assoc($subquery);
            ?>
            <p class="quote-boxed-cite"><?php echo $subrow['fullname'];?></p>
          </div>
        </div>
      </article>
    <?php endWhile ?>
    </div>
  </div>
</section>
<!--END OF TESTIMONIAL SECTION-->

<!--BOTTOM BOOKING SECCTION-->
<section class="section section-md text-center text-md-left bg-gray-700 novi-background bg-cover">
  <div class="container container-wide">
    <div class="row row-fix row-50 justify-content-sm-center">
      <div class="col-xxl-8">
        <div class="box-cta box-cta-inline">
          <div class="box-cta-inner">
            <h3 class="box-cta-title">Buy a tour without leaving your home</h3>
            <p>Using our website, you can book any tour just in a couple of clicks.</p>
          </div>
          <div class="box-cta-inner"><a class="button button-secondary button-nina" href="backend/booking.php">Book Now</a></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--END BOTTOM BOOKING SECCTION-->
<!-- END OF BODY SECTION-->

<!--Including footer file in main page-->
<?php 
include "frontend/includes/footer.php";
?>