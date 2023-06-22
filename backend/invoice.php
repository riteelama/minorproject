<?php
// global $conn;
global $conn;
include "includes/dbconfig.php";
include "includes/session.php";
require "../vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;
$tablename = "booking";
//$packageName = $packageView['package_name'];

if(isset($_GET['id'])){
    $id = $_GET['id'];
    var_dump($id);
    $sql = "SELECT * FROM $tablename WHERE id = '$id'";
//     var_dump($sql);
    $query = mysqli_query($conn, $sql);
//    var_dump($query);
    $count = mysqli_num_rows($query);
    $printPackage = mysqli_fetch_assoc($query);
    $printPackageName = $printPackage['package_name'];
    $printChildrenNumber = $printPackage['children_count'];
    $printAdultNumber = $printPackage['adult_count'];
    $printBookedDate = $printPackage['booked_for'];
    $printTotalAmount = $printPackage['total_amount'];
}

$html = '<h1> Your package booking invoice detail</h1>';
$html .= "<p style='margin: 10px 0;'>Package Name : $printPackageName</p>";
$html .= "<p>Number of children : $printChildrenNumber</p>";
$html .= "<p>Number of Adult: $printAdultNumber</p>";
$html .= "<p>Booked for Data: $printBookedDate</p>";
$html .= "<p><strong>Total Amount: $printTotalAmount</strong></p>";

$dompdf = new Dompdf();

$options = new Options;
$options->setChroot(__DIR__);

$dompdf = new Dompdf($options);

$dompdf -> setPaper("A4","landscape");

//$html = file_get_contents("template.html");

//$html = str_replace("{{packageName}}",$printPackageName,$html);
$dompdf -> loadHtml($html);
//$dompdf->loadHtmlFile("template.html");
$dompdf -> render();

$dompdf->addInfo("Title","Package Invoice");

$dompdf -> stream("invoice.pdf", ["Attachment" =>0]);

$output = $dompdf->output();
file_get_contents("invoice.pdf",$output);

?>