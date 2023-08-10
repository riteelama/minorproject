<?php
    include "includes/session.php";
    include "includes/dbconfig.php";
    // var_dump($_SESSION['loginAccess']);
    if(isset($_SESSION['loginAccess'])){
        $email = $_SESSION["loginAccess"];

        $sql = "SELECT * FROM users WHERE email='$email'";
        $query = mysqli_query($conn,$sql);
        // var_dump( $sql );
        // $rows=mysqli_num_rows($query)
        // print_r($rows);

        // if($rows>0){
        $num_rows = mysqli_fetch_assoc($query);
        $role_id = $num_rows['role_id'];
        // var_dump($role_id);
        $email = $num_rows['email'];
        // echo $role_id;
        // }
        
        switch($role_id){

        case 1:
         include "dashboard/admin-dashboard.php";
         break;

        case 2: 
        include "dashboard/agents-dashboard.php";
        break;

        case 3:
        include "dashboard/customer-dashboard.php";
        break;

        default:
        echo "Sorry, You don't have any creditentials for accessing the dashboard.";
        }
    } 

include "includes/footer.php";

?>