<?php include_once "header.php"; ?>
<?php
// Include the database configuration file
require_once 'config.php';

// Function to display table records
function displayTableRecords($tableName) {
    global $conn;
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='form-container'>";
        echo "<h2 style='text-align: center;'>Table: $tableName</h2>";
        echo "<table>";
        echo "<tr>";
        // Print column names
        while ($fieldInfo = $result->fetch_field()) {
            echo "<th>" . $fieldInfo->name . "</th>";
        }
        echo "</tr>";

        // Print data rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='form-container'>";
        echo "<p>No records found in the $tableName table.</p>";
        echo "</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Database Records</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="animation-container">
        <canvas id="animation-canvas"></canvas>
    </div>
    <?php
    // Display records from each table
    displayTableRecords("Billing");
    displayTableRecords("Medication");
    displayTableRecords("Patient");
    ?>
    <div class="form-container">
        <form action="addPatient.php">
            <input type="submit" value="Add New Patient">
        </form>
        <form action="getPatient.php">
            <input type="submit" value="View Patients">
        </form>
    </div>
    <script src="js/background.js"></script>
    <?php
    // Close database connection
    $conn->close();
    ?>
</body>
</html>