<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Paint Jobs</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div id="newPaintJobform" class="page">
        <h1> New Paint Job</h1>
        <div id="car-img">
            <img id="leftcar" src="img/black-car.png" alt="left car">
            <img id="arrow" src="img/center-arrow.png" alt="Arrow">
            <img id="rightcar" src="img/black-car.png" alt="right car">
        </div>
    </div>

    <form id="paintjobform" action="submit.php" method="post">

        <h2>Car details</h2>
        
        <label for="plateNo">Plate No:</label>
        <input type="text" id="plateNo" name="plateNo">
        <label for="currentcolor">Current Color:</label>
        <select id="currentcolor" name="currentcolor">
            <option value="">Select Color</option>
            <option value="black">Black</option>
            <option value="green">Green</option>
            <option value="purple">Purple</option>
            <option value="red">Red</option>
        </select>

        <label for="targetcolor">Target Color:</label>
        <select id="targetcolor" name="targetcolor">
            <option value="">Select Color</option>
            <option value="black">Black</option>
            <option value="green">Green</option>
            <option value="purple">Purple</option>
            <option value="red">Red</option>
        </select>
        <br>
        <button type="submit">Submit</button>
    </form>

    <h2>Paint Jobs in Progress</h2>

    <table>
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