<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("styles.php") ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("connection.php");
    $query = "SELECT * FROM hospitaldoctors";
    $result = mysqli_query($conn, $query); ?>
    <div class="main">
        <div>

            <table class=".doctorManagementTable">
                <tr>

                    <th>name</th>
                </tr>

                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($keyValuePair = mysqli_fetch_assoc($result)) {
                        echo "<tr><td><form action='doctorsList.php'>
                        <b>click to visit list for dr : </b>
                       
                        <input type=hidden name=doctorName value={$keyValuePair["doctorName"]}></input>

                        <input type=submit value='{$keyValuePair["doctorName"]}'></input>
                        </form></td></tr>";
                    }
                }
                mysqli_close($conn)
                ?>
            </table>
        </div>
        <div>
            
            <form class="dataEntry_form" action="removeDoctor.php" method="GET">
                <h3>Remove doctor from list</h3>
                <label><b>doctors name:</b></label><br>
                <input type="text" id="doctorName" name="doctorName" placeholder="Enter doctor's name to be removed"><br>
                <!--<label>doctor id:</label><br>
                <input type="text" id="doctorID" name="doctorID"><br>-->
                <input type="submit" value="Submit" name="submit">
            </form>


            <form class="dataEntry_form" action="addDoctor.php" method="GET">
                <h3>Add doctor to list</h3>
                <label><b>doctors name:</b></label><br>
                <input type="text" id="doctorName" name="doctorName"  placeholder="Enter doctor's name to be added"><br>
                <!--
                <label>doctor id:</label><br>
                <input type="text" id="doctorID" name="doctorID"><br>
                -->
                <input type="submit" value="Submit" name="submit">

            </form>

        </div>
    </div>


</body>

</html>