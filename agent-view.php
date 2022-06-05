<?php 
include "frontend/includes/blog-header.php";

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM users WHERE status= '1' AND id = '$id' AND role_id='2'";
    $query = mysqli_query($conn,$sql);

    $subsql = "SELECT count(*) as total_row FROM packages where user_id_packages = '$id'";
    $subquery = mysqli_query($conn,$subsql);

}
?>
<div class="container card" style = "margin: 150px;">
    <div class="card-body">
    <?php foreach($query as $q){?>

        <img class="card-img-top" src="uploads/images/<?php echo $q['profile_picture'];?>" alt="Card image cap">
        <div class="card-title bg-dark text-white">
            <h1><?php echo $q['fullname']?></h1>
        </div>
        
        <div class="card-subtitle p-2 bg-info"><h6 class="text-bold">Address: </h6> <?php echo $q['address'];?></div>
        <div class="card-subtitle p-2 bg-info"><h6 class="text-bold">Phone Number: </h6><?php echo $q['phoneno'];?></div>
        <?php foreach($subquery as $s){?>
            <div class="card-subtitle p-2 bg-info"><h6 class="text-bold">No of Packages: </h6> <?php echo $s['total_row'];?></div>
            <?php } ?>
        <?php } ?>
    </div>    
</div>
<?php
include "frontend/includes/footer.php";
?><