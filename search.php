<?php 
include "frontend/includes/header.php";


function haversineDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // Earth's radius in kilometers
    
    $deltaLat = deg2rad($lat2 - $lat1);
    $deltaLon = deg2rad($lon2 - $lon1);
    
    $a = sin($deltaLat / 2) * sin($deltaLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($deltaLon / 2) * sin($deltaLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
    $distance = $earthRadius * $c; // Distance in kilometers
    
    return $distance;
}

// $lat1 = 37.7749; // Latitude of point 1
// $lon1 = -122.4194; // Longitude of point 1

// $lat2 = 34.0522; // Latitude of point 2
// $lon2 = -118.2437; // Longitude of point 2

//search the package according to the price and location
if(isset($_GET['search'])){
    $search_location = $_GET['location'];
    $price = $_GET['price'];

    // Geocode the selected location using the Google Maps Geocoding API
    $geocode_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($search_location) . "&key=AIzaSyDfjyHuSMqkLHM-vw9Dvj71yJ9MqoF3d20";
    $geocode_response = file_get_contents($geocode_url);
    $geocode_data = json_decode($geocode_response, true);
    
    if ($geocode_data && $geocode_data["status"] === "OK") {
        $search_latitude = $geocode_data["results"][0]["geometry"]["location"]["lat"];
        var_dump($search_latitude);
       
        $search_longitude = $geocode_data["results"][0]["geometry"]["location"]["lng"];
         var_dump($search_longitude);

         $distance = haversineDistance(40, 40, 41, 41);
        var_dump($distance);

        //1 km maa kati degree hunxa.
        $calc_degree_on_KM = (float) 1 / $distance; 

        var_dump( $calc_degree_on_KM);

        // radius of 5km 
        $calculating_distace = 50 * $calc_degree_on_KM;
        var_dump($calculating_distace);

        // update latitude and longitude.

        $lat1 = $search_latitude - $calculating_distace;
        $lng1 = $search_longitude - $calculating_distace;
        $lat2 = $search_latitude + $calculating_distace;
        $lng2 = $search_longitude + $calculating_distace;
                
        // Calculate Haversine distance using MySQL function
        // $haversine_distance = "
        //     6371 * 
        //     ACOS(
        //         COS(RADIANS($search_latitude)) * COS(RADIANS(lat)) * 
        //         COS(RADIANS(lng) - RADIANS($search_longitude)) + 
        //         SIN(RADIANS($search_latitude)) * SIN(RADIANS(lat))
        //     )
        // ";
            }
        
        // Construct the query to search and sort by distance and price
        // $sql = "SELECT name, price, description, excerpt, 
        //             $haversine_distance AS distance
        //         FROM
        //             packages
        //         WHERE BETWEEN
        //             price  $price - 100 AND price $price + 100
        //         ORDER BY
        //             distance ASC, ABS(price - $price) ASC
        //         LIMIT 10";

        $sql = "SELECT
            id,
            name,
            excerpt,
            price,
            lat,
            lng,
            image
        FROM
            packages
        WHERE
           (lat BETWEEN $lat1 AND $lat2) 
            AND (lng BETWEEN $lng1 AND $lng2) AND (price BETWEEN $price - 100 AND $price + 100)";
    
        $query = mysqli_query($conn,$sql);
        // var_dump($sql);
        $check = mysqli_num_rows($query) > 0;
        $row = mysqli_fetch_all($query);
        // var_dump($row);
    
}
?>

<style>
    a.button.button-sm.button-info:hover {
    color: #ffa900;
}
</style>
        <div id="wrapper">

	<!-- Begin Page Content -->
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">Search Results</h1>
			</div>
		</div>

		<div class="row mt-4">
			<?php
    
			if ($check) {
                // $row = mysqli_fetch_all($query);
                // var_dump($row);
                
				foreach($row as $data) {
			?>
					<div class="col-md-4 mt-3">
						<div class="card">
							<form method="post">
							<div class="card-body">
    						<img src="uploads/images/<?php echo $data[6]?>" class="card-img-top" alt="image of different packages">
								<h2 class="card-title" style="color:#ffa900"><a href="package-view.php?id=<?php echo $data[0]?>"?><?php echo $data[1]; ?></a></h2>
								<p class="card-text">
									<?php echo $data[2] ?>
								</p>
								<h4 class="card-text text-bold" style="color:#ffa900">$ 
									<?php echo $data[3]; ?> per person
								</h4>
                                <a class="button button-sm button-info">View Details</a>
							</div>
							</form>
						</div>
					</div>
			<?php
				}
			} else {
				echo "Sorry, Currently packages are not available";
			}
			?>
		</div>
	</div>
</div>

<?php
include "frontend/includes/footer.php";
?>