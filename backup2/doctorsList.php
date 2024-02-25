<?php
include("styles.php");
include("connection.php");
if (empty($_POST["doctorName"])) {
    echo "<h1><center>Please enter Doctor's name</h1></center>";
}
// if (empty($_POST["doctorID"])) {
//     echo "<h1><center>Please enter Doctor's ID</h1></center>";
//     return;
// }
$query = "SELECT * FROM {$_POST["doctorName"]}list";
try {
    $result = mysqli_query($conn, $query);
} catch (Exception $e) {
    echo "<center>
    <p style='color:red;font-size:50px;font-style:italic'>
    </h1>Error encountered</br>
    make sure name of the doctor entered is correct</br></h1></p><br>
    ";
    return;
}

// $numberOfEntries = mysqli_num_rows($result);
// echo $numberOfEntries;
?>
<div class="main">
    <div>

        <table>
            <tr>
                <th>patientID</th>
                <th>patientName</th>
            </tr>

            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($keyValuePair = mysqli_fetch_assoc($result)) {

                    echo "<tr>
                    <td> {$keyValuePair["patientID"]} </td>
                    <td> {$keyValuePair["patientName"]} </td>
                    </tr>";
                }
            }
            mysqli_close($conn);
            ?>
        </table>
    </div>
    <div>
        <form action="addPatientToList.php" method="POST">
            <h3>add patient to list</h3>
            <label>target doctor list:</label><br>
            <input type="text" id="targetList" name="targetList" value="<?php echo $_POST["doctorName"]; ?>" readonly style="background-color: beige;"><br>
            <label>patient name:</label><br>
            <input type="text" id="patientName" name="patientName"><br>
            <input type="submit" value="Submit" name="submit">
        </form>




        <form action="removePatient.php" method="POST">
            <h3>Remove patient</h3>
            <label>target doctor list:</label><br>
            <input type="text" id="targetList" name="targetList" value="<?php echo $_POST["doctorName"]; ?>" readonly style="background-color: beige;"><br>
            <label>patientID:</label><br>
            <input type="text" id="patientID" name="patientID"><br>
            <input type="submit" value="Submit" name="submit">
        </form>
        <form><button><a href="welcom.php">Back</a></button></form>
        
    </div>
</div>