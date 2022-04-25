<?php 

//find the total records
$sql = "SELECT COUNT(*) AS 'total' FROM $tablename";
$query = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($query);
$totalPage = ceil($data['total']/$limit);
// echo $totalPage;
// echo $data['total'];
// echo "<br>";

$pagLink = "<ul class='pagination justify-content-center'>";  
$current_page = isset($_GET['page'])?$_GET['page'] : 1;
for ($i=1; $i<=$totalPage; $i++) {
  $active_class = "";
    if($i==$current_page)
    {
      $active_class = "active";
    }
    $pagLink .= "<li class='page-item $active_class'><a class='page-link' href='?page=".$i."'>".$i."</a></li>";	
}
echo $pagLink . "</ul>";  
// for($i = 1; $i<=$totalPage; $i++){
?>


