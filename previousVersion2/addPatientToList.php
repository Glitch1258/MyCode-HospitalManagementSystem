<?php
include("connection.php");
include("styles.php");
//$query = "INSERT INTO {$_POST["targetList"]} (patientName) VALUES ";
if (empty($_POST["patientName"])) {
    echo "<h1><center>Please enter patient's name</h1></center>";
    return;
}
$query = "INSERT INTO {$_POST["targetList"]}list (patientName) VALUES ('{$_POST["patientName"]}')";
//echo "{$_POST["targetList"]}list";
$result = mysqli_query($conn, $query);
mysqli_close($conn);
header("refresh:0");
