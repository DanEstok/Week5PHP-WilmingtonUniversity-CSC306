<?php
// Include database configuration
include_once "config.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from POST request
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $maritalStatus = $_POST["maritalStatus"];
    $address = $_POST["address"];

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO patient (firstName, lastName, age, gender, maritalStatus, address) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssisss", $firstName, $lastName, $age, $gender, $maritalStatus, $address);

    // Execute the statement
    if ($stmt->execute()) {
        // Data inserted successfully
        echo "";
    } else {
        // Error inserting data
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Record Created</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="animation-container">
        <canvas id="animation-canvas"></canvas>
    </div>
    <div class="container">
        <h2>Record Successfully Created</h2>
        <p>The patient record has been successfully created.</p>
        <div class="buttons">
            <a href="addPatient.php"><button>Add Another Patient</button></a>
            <a href="getPatient.php"><button>View Patients</button></a>
        </div>
    </div>
    <script src="js/background.js"></script>
</body>
</html>
