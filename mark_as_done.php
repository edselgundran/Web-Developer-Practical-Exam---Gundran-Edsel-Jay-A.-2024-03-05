<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "carpaint_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the plate number from the form submission
    $plateNumber = $_POST["plate_number"];

    // Update the status to "done"
    $updateSql = "UPDATE car_paint_jobs SET status = 'done' WHERE plate_number = '$plateNumber'";

    if ($conn->query($updateSql) === TRUE) {
        echo "Paint job marked as done successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    

// Perform database update to mark the job as done
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carpaint_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $stmt = $conn->prepare("UPDATE car_paint_jobs SET status='Done' WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    // Redirect back to paintjobs.php
    header("Location: paintjobs.php");
    exit();
}
?>
