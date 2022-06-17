<?php

include "frontend/includes/header.php";
$category_query = "SELECT * FROM categories WHERE status='1' AND id=" . $_GET["cat_id"];
$query = mysqli_query($conn, $category_query);
$category = mysqli_fetch_assoc($query);

$tour_query = " SELECT * FROM tour WHERE category_id = " . $category["id"];
$tour_exec = mysqli_query($conn, $tour_query);

?>

<!-- Tips & tricks-->
<section class="section section-lg novi-background bg-cover bg-default text-center">
    <div class="container-wide">
        <div class="row row-50">
            <div class="col-sm-12">
                <h3><?php echo $category["title"] ?></h3>
                <div class="divider divider-decorate"></div>
                <!-- Owl Carousel-->
                <div class="owl-carousel owl-carousel-team owl-carousel-inset" data-items="1" data-md-items="2"
                     data-xl-items="3" data-stage-padding="15" data-loop="true" data-margin="30"
                     data-mouse-drag="false" data-dots="true" data-autoplay="true">
                    <?php while ($row = mysqli_fetch_assoc($tour_exec)) { ?>
                        <article class="post-blog">
                            <a class="post-blog-image" href="#">
                                <img src="/php-test/tour/uploads/<?php echo $row["image"] ?>" alt="" width="570"
                                     height="415"/></a>
                            <div class="post-blog-caption">
                                <div class="post-blog-caption-header">
                                    <ul class="post-blog-tags">
                                        <li><a class="button-tags" href="#">Hotels</a></li>
                                    </ul>
                                    <ul class="post-blog-meta">
                                        <li><span>by</span>&nbsp;<a href="#">Ronald Chen</a></li>
                                    </ul>
                                </div>
                                <div class="post-blog-caption-body">
                                    <h5><a class="post-blog-title" href="#"><?php echo $row["title"] ?></a></h5>
                                </div>
                                <div class="post-blog-caption-footer">
                                    <time datetime="2019">Feb 27, 2019 at 6:53 pm</time>
                                    <a class="post-comment" href="#"><span
                                                class="icon novi-icon icon-md-middle icon-gray-1 mdi mdi-comment"></span><span>12</span></a>
                                </div>
                            </div>
                        </article>

                    <?php } ?>
                </div>
            </div>
            <div class="col-12"><a class="button button-secondary button-nina button-offset-lg" href="#">view all
                    blog posts</a></div>
        </div>
    </div>
</section>

<?php

include "frontend/includes/footer.php";

?>