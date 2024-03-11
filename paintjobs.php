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

    <div class="container">

        <div class="flex-container">
            <div class="paint-jobs">
                <h2>Paint Jobs in Progress</h2>

    <table>
</div>
        <thead>
            <tr>
                <th>Plate Number</th>
                <th>Current Color</th>
                <th>Target Color</th>
                <th>Action</th>

            </tr>

            

        </thead>
        <tbody>
            

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
            
           
            $sql = "SELECT id, plate_number, current_color, target_color FROM car_paint_jobs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["plate_number"] . "</td>";
        echo "<td>" . $row["current_color"] . "</td>";
        echo "<td>" . $row["target_color"] . "</td>";
        echo "<td><a href='mark_as_completed.php?id=" . $row["id"] . "' class='mark-as-completed'>Mark as Completed</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No paint jobs found</td></tr>";
}

$conn->close();
            ?>
        </tbody>
    </table>


    <div class="shop-performance" id="shop-per">
        <table class="shop">
            <thead>
                <tr>
                    <th id="shop-head">SHOP PERFORMANCE</th>
                </tr>
            </thead>
            <tbody>
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

                $sql = "SELECT COUNT(*) AS total_cars, 
                               SUM(CASE WHEN current_color = 'Blue' THEN 1 ELSE 0 END) AS blue_count,
                               SUM(CASE WHEN current_color = 'Red' THEN 1 ELSE 0 END) AS red_count,
                               SUM(CASE WHEN current_color = 'Green' THEN 1 ELSE 0 END) AS green_count
                        FROM car_paint_jobs";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<tr>";
                    echo "<td>Total Cars Painted</td>";
                    echo "<td>" . $row["total_cars"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Blue</td>";
                    echo "<td>" . $row["blue_count"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Red</td>";
                    echo "<td>" . $row["red_count"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Green</td>";
                    echo "<td>" . $row["green_count"] . "</td>";
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='2'>No shop performance data found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div>


    <h2>Paint Queue</h2>

    <table>
        <thead>
            <tr>
                <th>Plate Number</th>
                <th>Current Color</th>
                <th>Target Color</th>
            </tr>
        </thead>
        <tbody>
            

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
            
           
            $sql = "SELECT plate_number, current_color, target_color FROM car_paint_jobs";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
             
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["plate_number"] . "</td>";
                    echo "<td>" . $row["current_color"] . "</td>";
                    echo "<td>" . $row["target_color"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No paint jobs found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <script src="js/script.js"></script>

</body>

</html>