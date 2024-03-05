<?php

// Function to establish database connection
function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "carpaint_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Function to insert data into the database
function insertData($plateNo, $currentcolor, $targetcolor, $conn) {
    $stmt = $conn->prepare("INSERT INTO car_paint_jobs (plate_number, current_color, target_color) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $plateNo, $currentcolor, $targetcolor);
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            // Redirect if successful
            header("Location: index.php");
            exit();
        } else {
            echo "Error: No rows affected. Failed to insert data into the database.";
        }
    } else {
        echo "Error: Execute statement failed: " . $stmt->error;
    }
    $stmt->close();
}

// Main code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plateNo = $_POST['plateNo'];
    $currentcolor = $_POST['currentcolor'];
    $targetcolor = $_POST['targetcolor'];

    $conn = connectToDatabase();
    insertData($plateNo, $currentcolor, $targetcolor, $conn);
    $conn->close();
}

?>
