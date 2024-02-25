<?php
include("connection.php");
include("styles.php");

if (empty($_POST["patientID"])) {
    echo "<h1><center>Please enter patient's ID</h1></center>";
    return;
}
try {
    $query = "DELETE FROM {$_POST["targetList"]}list WHERE patientID = ('{$_POST["patientID"]}')";
    $result = mysqli_query($conn, $query);
} catch (Exception $e) {
    echo "<center><h3>
    Error encountered , check is patient ID entered is correct
    </h3></center>";
    mysqli_close($conn);
    return;
}
mysqli_close($conn);
header("Location: welcom.php");
