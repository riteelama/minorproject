<?php 
include "frontend/includes/header.php";

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM packages WHERE status= '1' AND id = '$id'";
    $query = mysqli_query($conn,$sql);
}
?>
<div class="container card" style = "margin: 150px;">
    <div class="card-body">
    <?php foreach($query as $q){?>

        <img class="card-img-top" src="uploads/images/<?php echo $q['image'];?>" alt="Card image cap">
        <div class="card-title bg-dark text-white">
            <h1><?php echo $q['name']?></h1>
        </div>
        
        <div class="card-subtitle p-2 bg-info"><h6 class="text-bold">Postdate: </h6> <?php echo $q['postdate'];?></div>
        <div class="card-subtitle p-2 bg-info"><h6 class="text-bold">Price: </h6><?php echo $q['price'];?></div>

        

        <p class="card-text">
            <?php echo $q['description'];?>
        </p>


        <?php } ?>
        <a href="backend/booking.php" class="btn btn-primary">Book This</a>
    </div>    
</div>
<?php
include "frontend/includes/footer.php";
?><