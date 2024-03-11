<?php

 // Database 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "carpaint_db";
 

 $conn = new mysqli($servername, $username, $password, $dbname);
 

 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

function insertData($plateNo, $currentColor, $targetColor, $conn) {
    $status = 'In Progress';
    $stmt = $conn->prepare("INSERT INTO car_paint_jobs (plate_number, current_color, target_color, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $plateNo, $currentColor, $targetColor, $status);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            // Redirect if successful
            header("Location: paintjobs.php");
            exit();
        } else {
            echo "Error: No rows affected. Failed to insert data into the database.";
        }
    } else {
        echo "Error: Execute statement failed: " . $stmt->error;
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plateNo = htmlspecialchars($_POST['plateNo']);
    $currentColor = htmlspecialchars($_POST['currentcolor']);
    $targetColor = htmlspecialchars($_POST['targetcolor']);

    $conn = connectToDatabase();
    insertData($plateNo, $currentColor, $targetColor, $conn);
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Paint Jobs</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div id="header" class="head">
        <span> Juan's Paint Job</span>
        
        <ul>
            <li><a href="index.php">New paint Job</a></li>
            <li><a href="paintjobs.php">Paint Jobs</a></li>
        </ul>
    </div>


    <div id="newPaintJobfor" class="page">

        <h1> New Paint Job</h1>

        <div id="car-img">
            <img id="leftcar" src="img/default-car.png" alt="left car">
            <img id="arrow" src="img/center-arrow.png" alt="Arrow">
            <img id="rightcar" src="img/default-car.png" alt="right car">
        </div>
    </div>

    <form id="paintjobform" action="submit.php" method="post">

        <h3>Car details</h3>
        
        <label for="plateNo">Plate No:</label>
        <input type="text" id="plateNo" name="plateNo">
        <label for="currentcolor">Current Color:</label>
        <select id="currentcolor" name="currentcolor">
            <option value="">Select Color</option>
            <option value="default">Default</option>
            <option value="blue">Blue</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
        </select>

        <label for="targetcolor">Target Color:</label>
        <select id="targetcolor" name="targetcolor">
            <option value="">Select Color</option>
            <option value="default">Default</option>
            <option value="blue">Blue</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
        </select>

        <br>

        <button type="submit">Submit</button>
    
    </form>

    <script src="js/script.js"></script>

</body>

</html>