<?php
include('connection.php');
if (isset($_POST['submit'])) {
    $adminName = $_POST['user'];
    $adminPass = $_POST['pass'];
    $sql = "SELECT * from admins where adminName = '$adminName' and adminPass = '$adminPass'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count >= 1) {
        header("Location: welcom.php");
    } else {
        header("Location: loginfailed.php");
    }
}
mysqli_close($conn);
