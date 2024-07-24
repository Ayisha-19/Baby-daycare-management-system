<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Baby Daycare Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="date"], textarea, input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Baby Daycare Management System</h2>
        
        <!-- Form to add a new baby -->
        <h3>Add New Baby</h3>
        <form action="add_baby.php" method="post">
            <label for="name">Baby's Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            <label for="dob">Date of Birth:</label><br>
            <input type="date" id="dob" name="dob" required><br><br>
            <label for="parent_name">Parent's Name:</label><br>
            <input type="text" id="parent_name" name="parent_name" required><br><br>
            <label for="contact_number">Contact Number:</label><br>
            <input type="text" id="contact_number" name="contact_number" required><br><br>
            <label for="address">Address:</label><br>
            <textarea id="address" name="address" rows="3"></textarea><br><br>
            <input type="submit" value="Add Baby">
        </form>

        <!-- Display list of babies -->
        <h3>List of Babies</h3>
        <table>
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Parent's Name</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Enrolled Date</th>
            </tr>
            <?php
            // Database connection
            $host = 'localhost';    // Database host
            $user = 'root';         // Database username
            $password = '';         // Database password
            $dbname = 'daycare_system'; // Database name

            $conn = new mysqli($host, $user, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch babies data from database
            $sql = "SELECT * FROM babies ORDER BY enrolled_date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . $row['dob'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['parent_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['contact_number']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                    echo "<td>" . $row['enrolled_date'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No babies found</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
