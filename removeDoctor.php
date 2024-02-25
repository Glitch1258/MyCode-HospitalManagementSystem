<?php
include("connection.php");
include("styles.php");

if (empty($_GET["doctorName"])) {
    echo "<h1><center>Please enter doctors's name<h1><center>";
    return;
}
// if (empty($_GET["doctorID"])) {
//     echo "<h1><center>Please enter doctors's ID</h1></center>";
//     return;
// }

$sql = "DELETE FROM hospitaldoctors WHERE doctorName = '{$_GET["doctorName"]}'";
$sql2 = "DROP TABLE `{$_GET["doctorName"]}list`";

try {
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);
    header("Location: welcom.php");
} catch (Exception $e) {
    echo "<h1><center>Something went wrong sorry for the inconveniance</h1></center>" . $e->getMessage() . "";
} finally {
    mysqli_close($conn);
}
