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
	        
    		<h1>Create or Edit Comments</h1>
    		
    		<form action="<?php echo $_SERVER['PHP_SELF']; echo isset($_GET['page'])?'?page='.$_GET['page']:'';?>" method="POST" id="categoryform" enctype="multipart/form-data">

    		    <div class="form-group">
    		        <label for="comments">Comments</label>
    		        <textarea rows="5" class="form-control" name="comments"><?php echo isset($editData)?$editData['comments']:'';?></textarea>
    		    </div>
    		    
    		    <div class="form-group">
    		        <button type="submit" class="btn btn-success" name="create">
    		            Confirm Comment
    		        </button>
    		        <button type="submit" class="btn btn-primary" name="save">
    		            Update Comment
    		        </button>
					<input type="hidden" name="id" value=<?php echo isset($editData)?$editData['id']:'';?>>
    		    </div>
    		    
    		</form>
		</div>
		
	</div>
</div>


