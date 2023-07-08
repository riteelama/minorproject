<?php
global $conn;
include "frontend/includes/header.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM packages WHERE id = '$id'";
//    var_dump($sql);
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
}
?>
    <div class="container card mt-9" style="margin: 90px 50px;">
        <div class="card-title text-bold text-center">
            <h2>Package Detail</h2>
            <div class="card-body">
                <form method="post">
                        <input type="hidden" name="package_id" value="<?php echo $row['id'];?>">
                        <input type="hidden" name="package_name" value="<?php echo $row['name'];?>">
                        <input type="hidden" name="user_custid" value="<?php echo $user_id;?>">
                        <input type="hidden" name="user_name" value="<?php echo $username;?>">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "frontend/includes/footer.php";
?>
