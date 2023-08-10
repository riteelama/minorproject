<?php
global $conn;
include "frontend/includes/header.php";

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM packages WHERE status= '1' AND id = '$id'";
//    var_dump($sql);
    $query = mysqli_query($conn, $sql);
}
?>
    <div class="container card" style="margin: 150px;">
    <div class="card-body">
        <?php foreach ($query as $q) { ?>

            <img class="card-img-top" src="uploads/images/<?php echo $q['image']; ?>" alt="Card image cap">
            <div class="card-title">
                <h1><?php echo $q['name'] ?></h1>
            </div>

            <div class="card-subtitle p-2 bg-info"><h6 class="text-bold">Postdate: </h6> <?php echo $q['postdate']; ?>
            </div>
            <div class="card-subtitle p-2 bg-info"><h6 class="text-bold">Price: </h6><?php echo "$ ". $q['price'] . " per person";?></div>

            <div class="card-subtitle p-2 bg-info"><h6 class="text-bold">Description </h6>
            <p class="card-text">
                <?php echo $q['description']; ?>
            </p>

            <div class="card-subtitle bg-info"><h6 class="text-bold my-4">Itinerary: </h6>
            <div class="package-list">
                <?php echo $q['itinerary']; ?>
            </div>

            <div class="card-subtitle bg-info"><h6 class="text-bold my-4 package-list">Cost Includes: </h6>
            <div class="package-list">
                <?php echo $q['costincludes']; ?>
            </div>

            <div class="card-subtitle bg-info"><h6 class="text-bold my-4 package-list">Cost Excludes: </h6>
            <div class="list-group">
                <?php echo $q['costexcludes']; ?>
            </div>

        <?php } ?>
        <!-- <a href="packageBooking.php?id=<?php
        // echo $id?>" class="btn btn-primary">Book This</a> -->
        <!--        <a href="bookPackage.php" class="button button-success" >Book this now</a>-->
        <!-- Modal -->
        <div class="py-5">
            <a href="bookPackage.php?book=<?php echo $id; ?>" class="btn btn-primary">Book this</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4> <?php echo (isset($similarQuery))?"You may also like":'';?></h4>
        </div>
    </div>

    <?php
    $location = $q['location'];
    $price = $q['price'];
    $id = $_REQUEST['id'];

    $similarSql = "SELECT * FROM packages WHERE location = '$location' AND price between $price -100 AND $price + 100 AND id != $id LIMIT 5";
    $similarQuery = mysqli_query($conn,$similarSql);
    $similarRow = mysqli_fetch_assoc($similarQuery);
    // var_dump($similarSql);
    if(isset($similarQuery)){
        ?>
        <div class="card-body">
            <a href="package-view.php?id=<?php echo $similarRow['id'];?>"><?php echo isset($similarRow['name'])?$similarRow['name']:''?></a>
        </div>
    <?php }
    ?>
<?php
include "frontend/includes/footer.php";
?>