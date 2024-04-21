<?php include_once "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Patients Information</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="animation-container">
        <canvas id="animation-canvas"></canvas>
    </div>
    <div class="form-container">
        <h2 style="text-align: center;">Patients Information</h2>
        <table>
            <tr>
                <th>PatientID</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
            <?php
            // Fetch patient records from the database
            $sql = "SELECT PatientID, FirstName, LastName FROM Patient";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["PatientID"] . "</td>";
                    echo "<td>" . $row["FirstName"] . "</td>";
                    echo "<td>" . $row["LastName"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>0 results</td></tr>";
            }
            ?>
        </table>
        <form action="addPatient.php">
            <input type="submit" value="Add New Patient">
        </form>
        <form action="getResults.php">
            <input type="submit" value="View Records">
        </form>
    </div>

    <script src="js/background.js"></script>

</body>
</html>

<?php $conn->close(); ?>