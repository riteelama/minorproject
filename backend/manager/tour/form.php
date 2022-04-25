<?php 
// include "includes/header.php";
?>
<!-- Custom fonts for this template-->
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
	        
    		<h1>Create or Edit Tour posts</h1>
    		
    		<form action="<?php echo $_SERVER['PHP_SELF']; echo isset($_GET['page'])?'?page='.$_GET['page']:'';?>" method="POST" id="categoryform" enctype="multipart/form-data">
    		    
    		    

                <div class="form-group">
                <!-- <label for="title">Select a category <span class="require"></span></label> -->
                <label>Choose main Category</label>
                <select name="category_id" id="category_id" class="form-select" selected style="border-radius:20px;">
                <?php 
                $sql = "SELECT * FROM categories WHERE category_id='0'";
                ?>
                <optgroup label="Main Category">
                    <?php 
                     $query = mysqli_query($conn,$sql);
                     while($row = mysqli_fetch_assoc($query)){
                    ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['title'];?></option>
                    <?php } ?>
                </optgroup>
                <?php 
                        
                        $query = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($query)){
                            $selected = '';
                            if(isset($editData)){
                                if($editData['category_id'] == $row['id']){
                                    $selected = 'selected="selected"';
                                }
                            }
                        
                    ?>
                
                    <?php 
                    $cat_id=$row['id'];
                    $subSql = "SELECT * FROm categories WHERE status='1' AND category_id='$cat_id';";
                    $subQuery = mysqli_query($conn,$subSql);
                    $count = mysqli_num_rows($subQuery);

                    //to continue the loop 
                    if($count == 0)
                    continue;
                    ?>
                    <optgroup label="<?php echo $row['title'];?>">

                    <?php
                    while($subRow = mysqli_fetch_assoc($subQuery)){                    
                    ?>
                    <option value="<?php echo $subRow['id']; ?>"><?php echo $subRow['title']; ?></option>
                    <?php } ?>
                    <!-- <option>Item 3</option> -->
                </optgroup>
                        <?php } ?>
                <!-- <option value="0">Main Category</option> -->
                    <?php 
                        // $sql = "SELECT * FROM categories";
                        // $query = mysqli_query($conn,$sql);
                        // while($row = mysqli_fetch_assoc($query)){
                        //     $selected = '';
                        //     if(isset($editData)){
                        //         if($editData['category_id'] == $row['id']){
                        //             $selected = 'selected="selected"';
                        //         }
                        //     }
                        
                    ?>
                    <!-- <option value="<?php  
                    // echo $row['id'];?>"<?php 
                    // echo $selected;?>><?php 
                    // echo $row['title'];?></option>-->
                    <?php 
                        // }
                    ?>
                </select>
    		    </div>
    		    
                <div class="form-group has-error">
    		        <label for="title">Choose Top packages or not</label>
    		        <div class="form-check" >
                        <input class="form-check-input" type="radio" id="yes" value="1" name="toppackages">
                        <label class="form-check-label" for="yes">
                            Yes
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" name="toppackages" type="radio" id="no" value="0" checked >
                        <label class="form-check-label" for="no">
                            No
                        </label>
                    </div>
    		        <!-- <span class="help-block">Input the title</span> -->
    		    </div>

                <div class="form-group has-error">
    		        <label for="title">Title</label>
    		        <input type="text" class="form-control" name="title" value="<?php echo isset($editData)?$editData['title']:'';?>"/>
    		        <!-- <span class="help-block">Input the title</span> -->
    		    </div>

    		    <div class="form-group">
    		        <label for="url">URL</label>
    		        <input type="text" class="form-control" name="url" value="<?php echo isset($editData)?$editData['url']:'';?>"/>
    		    </div>

                <div class="form-group">
    		        <label for="seotitle">SEO Title</label>
    		        <input type="text" class="form-control" name="seotitle" value="<?php echo isset($editData)?$editData['seotitle']:'';?>"/>
    		    </div>

    		    <div class="form-group">
    		        <label for="seodesc">SEO Description</label>
    		        <textarea rows="5" class="form-control" name="seodesc" value="<?php echo isset($editData)?$editData['seodesc']:'';?>"></textarea>
    		    </div>
                
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose an image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                
                <div class="form-group">
    		        <label for="summary">Summary</label>
    		        <textarea rows="5" class="form-control" name="summary" value="<?php echo isset($editData)?$editData['summary']:'';?>"></textarea>
    		    </div>
                
                <div class="form-group">
    		        <label for="detail">Detail</label>
    		        <textarea rows="5" class="form-control" name="detail" value="<?php echo isset($editData)?$editData['detail']:'';?>"></textarea>
    		    </div>
                <script src="ckeditor/ckeditor.js"></script>
                <script>CKEDITOR.replace('detail');</script>

    		   <div class="form-group">
               <select name="status" id="status" class="form-select" selected style="border-radius:20px;">
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
                    <option value="1" <?php echo $active; ?>>Active</option>
                    <option value="0" <?php echo $inactive; ?>>In-active</option>
                </select>
               </div>
    		    
    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary" name="create">
    		            Create Tour post
    		        </button>
    		        <button class="btn btn-default">
    		            Cancel
    		        </button>
    		    </div>
    		    
    		</form>
		</div>
		
	</div>
</div>


