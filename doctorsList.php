<?php
include("styles.php");
include("connection.php");
if (empty($_GET["doctorName"])) {
    echo "<h1><center>Please enter Doctor's name</h1></center>";
}
// if (empty($_GET["doctorID"])) {
//     echo "<h1><center>Please enter Doctor's ID</h1></center>";
//     return;
// }

$query = "SELECT * FROM {$_GET["doctorName"]}list";
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
                    <td> <form action='removePatient.php'>
                    <input type='hidden' name='patientID' value='{$keyValuePair["patientID"]}' />
                    <input type='hidden' name='targetList' value='{$_GET["doctorName"]}' />
                    <input type='submit' value='Remove patient ID: {$keyValuePair["patientID"]}' />
                </form>
                    </td>
                    <td> <b>{$keyValuePair["patientName"]}</b> </td>
                    </tr>";
                }
            }
            mysqli_close($conn);
            ?>
        </table>
    </div>
    <div>
        <form class="dataEntry_form" action="addPatientToList.php" method="$_GET">
            <h3>Add patient for doctor <?php echo $_GET["doctorName"] ?></h3>
            <br>
            <input type="hidden" id="targetList" name="targetList" value="<?php echo $_GET["doctorName"]; ?>" readonly style="background-color: beige;"><br>
            <label><b>Enter patient name:</b></label><br>
            <input type="text" id="patientName" name="patientName" placeholder="Enter patient's name to be added"><br>
            <input type="submit" value="Submit" name="submit">
        </form>




      
        <button style="padding:10px;"><a href="welcom.php"><b>Go back to list of doctors</b></a></button>

    </div>
</div>















