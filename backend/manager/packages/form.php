<?php 
// include "includes/header.php";
?>
<style>
	input#pac-input {
    width: 60%;
}
</style>
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
	        
    		<h1>Create or Edit Package</h1>
    		
    		<form action="<?php echo $_SERVER['PHP_SELF']; echo isset($_GET['page'])?'?page='.$_GET['page']:'';?>" method="POST" id="packageform" enctype="multipart/form-data">
                <div class="form-group has-error">
    		        <label for="name">Package Name</label>
    		        <input type="text" class="form-control" name="name" value = "<?php echo isset($editData)?$editData['name']:'';?>"/>
    		        <!-- <span class="help-block">Input the title</span> -->
    		    </div>

    		    <div class="form-group">
    		        <label for="description">Description</label>
    		        <textarea rows="5" class="form-control" name="description"><?php echo isset($editData)?$editData['description']:'';?></textarea>
    		    </div>

				<div class="form-group">
					<label for="itinerary">Itinerary</label>
					<textarea rows="5" class="form-control" name="itinerary" id="itinerary"><?php echo isset($editData)?$editData['itinerary']:'';?></textarea>
				</div>


				<div class="form-group">
				<label for="excerpt">Excerpt</label>
    		        <textarea rows="5" class="form-control" name="excerpt" required><?php echo isset($editData)?$editData['excerpt']:'';?></textarea>
    		    </div>

				<div class="form-group">
    		        <label for="price">Price</label>
    		        <input type="text" class="form-control" name="price" value="<?php echo isset($editData)?$editData['price']:'';?>" required/>
    		    </div>

				<div class="form-group">
    		        <label for="location">Location</label>
    		        <input type="hidden" name="lat" id="lat" class="form-control" value="<?php echo isset($editData)?$editData['lat']:'';?>">
                  	<input type="hidden" name="lng" id="lng" class="form-control" value="<?php echo isset($editData)?$editData['lng']:'';?>">
                  	<input type="text" name="location" id="location" value="<?php echo isset($editData)?$editData['location']:'';?>">
                  <div id="map" style="height: 400px;width: 600px"></div>
                  	<input id="pac-input" type="text" placeholder="Enter a location" class="form-control">
				</div>

				<div class="form-group">
					<label for="costincludes">Cost Includes</label>
					<textarea rows="5" class="form-control" name="costincludes" id="costincludes"><?php echo isset($editData)?$editData['costincludes']:'';?></textarea>
				</div>

				<div class="form-group">
					<label for="costexcludes">Cost Excludes</label>
					<textarea rows="5" class="form-control" name="costexcludes" id="costexcludes"><?php echo isset($editData)?$editData['costexcludes']:'';?></textarea>
				</div>


				<div class="form-group has-error">
    		        <label for="image">Choose an image</label>
					<input type="file" name="image" onchange="loadFile(event)" required>
					<br>
					<img id="output" src="../uploads/images/<?php echo $editData['image']; ?>" height="300" width="300" required accept="image/x-png,image/jpeg">
    		        <!-- <span class="help-block">Input the title</span> -->
    		    </div>

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
    		        <button type="submit" class="btn btn-success" name="create">
    		            Create Package
    		        </button>
    		        <button type="submit" class="btn btn-primary" name="save">
    		            Update Package
    		        </button>
					<input type="hidden" name="id" value=<?php echo isset($editData)?$editData['id']:'';?>>
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

<script>
         // This example requires the Places library. Include the libraries=places
         // parameter when you first load the API. For example:
         // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
         
         function initMap() {
           var map = new google.maps.Map(document.getElementById('map'), {
             center: {lat: -33.8688, lng: 151.2195},
             zoom: 13
           });
           var input = /** @type {!HTMLInputElement} */(
               document.getElementById('pac-input'));
         
           var types = document.getElementById('type-selector');
           map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
           map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);
         
           var autocomplete = new google.maps.places.Autocomplete(input);
           autocomplete.bindTo('bounds', map);
         
           var infowindow = new google.maps.InfoWindow();
           var marker = new google.maps.Marker({
             map: map,
             anchorPoint: new google.maps.Point(0, -29)
           });
         
           autocomplete.addListener('place_changed', function() {
             infowindow.close();
             marker.setVisible(false);
             var place = autocomplete.getPlace();
             if (!place.geometry) {
               // User entered the name of a Place that was not suggested and
               // pressed the Enter key, or the Place Details request failed.
               window.alert("No details available for input: '" + place.name + "'");
               return;
             }
         
             // If the place has a geometry, then present it on a map.
             if (place.geometry.viewport) {
               map.fitBounds(place.geometry.viewport);
             } else {
               map.setCenter(place.geometry.location);
               map.setZoom(17);  // Why 17? Because it looks good.
             }
             marker.setIcon(/** @type {google.maps.Icon} */({
               url: place.icon,
               size: new google.maps.Size(71, 71),
               origin: new google.maps.Point(0, 0),
               anchor: new google.maps.Point(17, 34),
               scaledSize: new google.maps.Size(35, 35)
             }));
             marker.setPosition(place.geometry.location);
             marker.setVisible(true);
         var item_Lat =place.geometry.location.lat();
         var item_Lng= place.geometry.location.lng();
         var item_Location = place.formatted_address;
         //alert("Lat= "+item_Lat+"_____Lang="+item_Lng+"_____Location="+item_Location);
         $("#lat").val(item_Lat);
         $("#lng").val(item_Lng);
         $("#location").val(item_Location);
                 
             var address = '';
             if (place.address_components) {
               address = [
                 (place.address_components[0] && place.address_components[0].short_name || ''),
                 (place.address_components[1] && place.address_components[1].short_name || ''),
                 (place.address_components[2] && place.address_components[2].short_name || '')
               ].join(' ');
             }
         
             infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
             infowindow.open(map, marker);
           });
         
           // Sets a listener on a radio button to change the filter type on Places
           // Autocomplete.
           function setupClickListener(id, types) {
             var radioButton = document.getElementById(id);
             radioButton.addEventListener('click', function() {
               autocomplete.setTypes(types);
             });
           }
         
           setupClickListener('changetype-all', []);
           setupClickListener('changetype-address', ['address']);
           setupClickListener('changetype-establishment', ['establishment']);
           setupClickListener('changetype-geocode', ['geocode']);
         }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfjyHuSMqkLHM-vw9Dvj71yJ9MqoF3d20&libraries=places&callback=initMap"
         async defer></script>