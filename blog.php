<?php
$currentPage = 'blog';
include "frontend/includes/header.php";
?>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-md-8 offset-md-2">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <?php 
                    $sql = "SELECT * FROM posts WHERE status = '1' ORDER BY id ASC";
                    $query = mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($query)):
                    // $id = $_GET['id'];
                ?>
                <img class="card-img-top" src="uploads/images/<?php echo $row['image'];?>" alt="" />
                <div class="card-body">
                    <div class="small text-muted"><?php echo $row['postdate'];?></div>
                    <h2 class="card-title"><?php echo $row['title'];?></h2>
                    <p class="card-text"><?php echo $row['description'];?></p>
                    <a class="btn btn-primary" href="single.php?id=<?php echo $row['id'];?>">Read more →</a>
                </div>
                <?php endwhile ?>
            </div>
        </div>
            
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <?php 
                // include "backend/includes/pagination.php";
                ?>
            </nav>
        </div>
        <!-- Side widgets-->
<?php
include "frontend/includes/footer.php";
?><