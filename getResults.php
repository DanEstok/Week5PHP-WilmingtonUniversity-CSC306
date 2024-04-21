<?php
// Include the database configuration file
require_once 'config.php';

// Function to display table records
function displayTableRecords($tableName) {
    global $conn;
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Table: $tableName</h2>";
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
    } else {
        echo "No records found in the $tableName table.";
    }
}

// Display records from each table
displayTableRecords("Billing");
displayTableRecords("Medication");
displayTableRecords("Patient");

// Close database connection
$conn->close();
?>