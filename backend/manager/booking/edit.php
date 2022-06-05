<!DOCTYPE html>
<html lang="en">
<head>
    
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <div class="container">

    <div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">

    		<h1>Edit your booking</h1>
    		
    		<form action="<?php echo $_SERVER['PHP_SELF']; echo isset($_GET['page'])?'?page='.$_GET['page']:'';?>" method="POST" id="categoryform" enctype="multipart/form-data">
			<div class="form-group">
                <!-- <label for="title">Select a category <span class="require"></span></label> -->
                <label>Choose main Category</label>
                <select name="package_id" id="package_id" class="form-select" selected style="border-radius:20px;">
                <?php 
                        $sql = "SELECT * FROM packages";
                        $query = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($query)){
                            $selected = '';
                            if(isset($editData)){
                                if($editData['package_id'] == $row['id']){
                                    $selected = 'selected="selected"';
                                }
                            }
                        
                    ?>                  
                    <option value="<?php echo $row['id'];?>"<?php echo $selected;?>><?php echo $row['name'];?></option>
                    <?php 
                        }
                    ?>
                </select>
    		    </div>

                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="text-danger" style="font-weight:bold; font-size: 20px;">
                        Enter package name here.
                    </div>
                    <label for="package_name">Package Name</label>
                    <input type="text" class="form-control form-control-user"
                        id="package_name" name="package_name" value="<?php echo isset($editData)?$editData['package_name']:"";?>">
                </div>
                
                <br>
    		   <div class="form-group">
               <select name="status" disabled id="status" class="form-select" selected style="border-radius:20px;">
                    <?php 
                        $active = 'selected="selected"';
                        $inactive = '';
                        if(isset($editData)){
                            if(!$editData['status']){
                            $active = '';
                            $inactive = 'selected = "selected"';
                            }
                        }
                    ?>
                    <option value="1" <?php echo $inactive;?>>Active</option>
                    <option value="0" <?php echo $active; ?>>In-active</option>
                </select>
               </div>

    		    <div class="form-group">
    		        <button type="submit" class="btn btn-success" name="edit">
    		            Update Booking
    		        </button>

                    <input type="hidden" name="id" value=<?php echo isset($editData)?$editData['user_custid']:'';?>>
    		    </div>
    		    
    		</form>
		</div>
		
	</div>
</div>

</body>
</html>