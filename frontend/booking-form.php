<?php
include "includes/dbconfig.php";
include "includes/session.php";

if(isset($_SESSION['loginAccess'])){
    if($_POST['book']){
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book A Trip</title>
    <!--bpotstrap css-->
    <link rel="stylesheet" href="includes/css/bootstrap.css">
    <!--custom css-->
    <link rel="stylesheet" href="booking-style.css">
</head>

<!--BODY SECTION-->
<body>
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="booking-form">
                    <div class="form-header">
                        <h1>Make your reservation</h1>
                    </div>
                    <form>
                        <div class="form-group"> <input class="form-control" type="text" placeholder="Country, ZIP, city..."> <span class="form-label">Destination</span> </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" type="date" required> <span class="form-label">Check In</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" type="date" required> <span class="form-label">Check out</span> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group"> <select class="form-control" required>
                                        <option value="" selected hidden>no of rooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select> <span class="select-arrow"></span> <span class="form-label">Rooms</span> </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> <select class="form-control" required>
                                        <option value="" selected hidden>no of adults</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select> <span class="select-arrow"></span> <span class="form-label">Adults</span> </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> <select class="form-control" required>
                                        <option value="" selected hidden>no of children</option>
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select> <span class="select-arrow"></span> <span class="form-label">Children</span> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" type="email" placeholder="Enter your Email"> <span class="form-label">Email</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" type="tel" placeholder="Enter you Phone"> <span class="form-label">Phone</span> </div>
                            </div>
                        </div>
                        <div class="form-btn"> <button class="submit-btn">Book Now</button> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<!--JAVASCRIPT SECTION-->
<script src="includes/js/core.min.js"></script>
</html>