<?php include_once "header.php"; ?>
<?php include_once "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Patient</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="animation-container">
        <canvas id="animation-canvas"></canvas>
    </div>
    <div class="form-container">
        <h2 style="text-align: center;">Add New Patient</h2>
        <form id="patientForm" method="post" action="process_patient.php" onsubmit="return showSuccessMessage()">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required><br>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required><br>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required><br>

            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" required><br>

            <label for="maritalStatus">Marital Status:</label>
            <input type="text" id="maritalStatus" name="maritalStatus" required><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br><br>

            <input type="submit" value="Submit">
        </form>
        <form action="getResults.php">
            <input type="submit" value="View Records">
        </form>
        <form action="getPatient.php">
            <input type="submit" value="View Patients">
        </form>
    </div>
    <script src="js/background.js"></script>

    <script>
        function showSuccessMessage() {
            // Display a pop-up message
            var confirmed = confirm("Record successfully updated! Click OK to continue.");
            // Redirect to addPatient.php only if the user clicks "OK"
            return confirmed;
        }
    </script>
</body>
</html>