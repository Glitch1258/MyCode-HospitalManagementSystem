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

            <table>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                </tr>

                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($keyValuePair = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                    <td> {$keyValuePair["doctorID"]} </td>
                    <td> {$keyValuePair["doctorName"]} </td>
                    </tr>";
                    }
                }
                mysqli_close($conn)
                ?>
            </table>
        </div>
        <div>
            <form action="doctorsList.php" method="POST">
                <h3>Show doctor's patient list</h3>
                <label>doctors name:</label><br>
                <input type="text" id="doctorName" name="doctorName"><br>
                <!-- <label>doctor id:</label><br>
                <input type="text" id="doctorID" name="doctorID"><br><br> -->
                <input type="submit" value="Submit" name="submit">
            </form>



            <form action="removeDoctor.php" method="POST">
                <h3>remove doctor from list</h3>
                <label>doctors name:</label><br>
                <input type="text" id="doctorName" name="doctorName"><br>
                <label>doctor id:</label><br>
                <input type="text" id="doctorID" name="doctorID"><br>
                <input type="submit" value="Submit" name="submit">
            </form>


            <form action="addDoctor.php" method="POST">
                <h3>add doctor to list</h3>
                <label>doctors name:</label><br>
                <input type="text" id="doctorName" name="doctorName"><br>
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