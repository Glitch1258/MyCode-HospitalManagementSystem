<?php
include("connection.php");
include("styles.php");

if (empty($_GET["doctorName"])) {
    echo "<h1><center>Please enter doctors's name<h1><center>";
    return;
}

$sql = "CREATE TABLE {$_GET["doctorName"]}list(
    patientID INT AUTO_INCREMENT NOT NULL,
    patientName VARCHAR(255) NOT NULL,
    UNIQUE (patientID,patientName)
)";
$sql2 = "INSERT INTO hospitaldoctors (doctorName) VALUES ('{$_GET["doctorName"]}')";
try {
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);
    header("Location: welcom.php");
} catch (Exception $e) {
    echo "<h1><center>Something went wrong sorry for the inconveniance</h1></center>" . $e->getMessage() . "";
} finally {
    mysqli_close($conn);
}
