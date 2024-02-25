<?php
include("connection.php");
include("styles.php");
//$query = "INSERT INTO {$_GET["targetList"]} (patientName) VALUES ";
if (empty($_GET["patientName"])) {
    echo "<h1><center>Please enter patient's name</h1></center>";
    return;
}
$query = "INSERT INTO {$_GET["targetList"]}list (patientName) VALUES ('{$_GET["patientName"]}')";
//echo "{$_GET["targetList"]}list";
$result = mysqli_query($conn, $query);
mysqli_close($conn);
header("Location: welcom.php");
$doctorName = isset($_GET["targetList"]) ? $_GET["targetList"] : '';
header("Location: doctorsList.php?doctorName=" . urlencode($doctorName));