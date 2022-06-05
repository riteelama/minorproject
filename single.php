<?php 
include "frontend/includes/blog-header.php";

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM posts WHERE status= '1' AND id = '$id'";
    $query = mysqli_query($conn,$sql);
}
?>
<div class="container card" style = "margin: 150px;">
    <div class="card-body">
    <?php foreach($query as $q){?>

        <img class="card-img-top" src="uploads/images/<?php echo $q['image'];?>" alt="Card image cap">
        <div class="card-title bg-dark text-white">
            <h1><?php echo $q['title']?></h1>
        </div>
        
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $q['postdate'];?></h6>

        <p class="card-text">
            <?php echo $q['description'];?>
        </p>

        <?php } ?>
    </div>    
</div>
<?php
include "frontend/includes/footer.php";
?><