<?php 
    include "frontend/includes/header.php";
?>

<div class="container">
    <div class="row">
    <?php 
        $sql = "SELECT * FROM users where status = '1' AND role_id = '2'";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($query)):
    ?>
        <div class="col-md-6 col-12 mt-4 pt-2">            
            <div class="team-list position-relative overflow-hidden shadow rounded">
                <img src="uploads/images/<?php echo $row['profile_picture'];?>" class="img-fluid float-left" alt="">
                <div class="content float-left p-4">
                    <a class="title mb-0" href="agent-view.php?id=<?php echo $row['id'];?>"><?php echo $row['fullname'];?></a></h5>
                </div>
            </div>                                
        </div><!--end col-->
        <?php endwhile ?> 
    </div>
</div>
<?php 
    include "frontend/includes/footer.php";
?>