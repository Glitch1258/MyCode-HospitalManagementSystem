<?php
include("connection.php");
include("styles.php");

if (empty($_GET["patientID"])) {
    echo "<h1><center>Please enter patient's ID</h1></center>";
    return;
}
try {
    $query = "DELETE FROM {$_GET["targetList"]}list WHERE patientID = ('{$_GET["patientID"]}')";
    $result = mysqli_query($conn, $query);
} catch (Exception $e) {
    echo "<center><h3>
    Error encountered , check is patient ID entered is correct
    </h3></center>";
    mysqli_close($conn);
    return;
}
mysqli_close($conn);
$doctorName = isset($_GET["targetList"]) ? $_GET["targetList"] : '';
header("Location: doctorsList.php?doctorName=" . urlencode($doctorName));
