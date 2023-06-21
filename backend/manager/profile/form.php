<?php
// include "includes/header.php";
?>
<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<div class="container">

  <div class="container">
    <div class="row">

      <div class="col-md-8 col-md-offset-2">

        <h1>Create or Edit Profile</h1>

        <form action="<?php echo $_SERVER['PHP_SELF'];
                      echo isset($_GET['page']) ? '?page=' . $_GET['page'] : ''; ?>" method="POST" id="categoryform" enctype="multipart/form-data">

          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="fullname">Full Name <span class="text-danger">*</span></label>
              <input class="form-control" name="fullname" value="<?php echo isset($editData) ? $editData['fullname'] : ''; ?>">
            </div>

            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="username">Username <span class="text-danger">*</span></label>
              <input class="form-control" name="username" value="<?php echo isset($editData) ? $editData['username'] : ''; ?>">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="password">Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" name="password" value="<?php echo isset($editData) ? $editData['password'] : ''; ?>">
            </div>

            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="confirmpassword">Confirm Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" name="confirmpassword" value="<?php echo isset($editData) ? $editData['password'] : ''; ?>">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="address">Address <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="address" value="<?php echo isset($editData) ? $editData['address'] : ''; ?>">
            </div>

            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="phoneno">Phone Number </label>
              <input type="text" class="form-control" name="phoneno" value="<?php echo isset($editData) ? $editData['phoneno'] : ''; ?>">
            </div>
          </div>

          <div class="form-group has-error">
            <label for="profile_picture">Choose an image</label>
            <br>
            <input type="file" name="profile_picture" onchange="loadFile(event)" required>
            <br>
            <img id="output" src="../uploads/images/<?php echo $editData['profile_picture']; ?>" height="400" width="400" accept="image/x-png,image/jpeg">
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="save">
              Update Details
            </button>
            <input type="hidden" name="id" value=<?php echo isset($editData) ? $editData['id'] : ''; ?>>
          </div>

        </form>
      </div>

    </div>
  </div>
  <script>
    var loadFile = function(event) {
      var image = document.getElementById('output');
      image.src = URL.createObjectURL(event.target.files[0]);
    };
  </script>