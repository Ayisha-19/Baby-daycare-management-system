<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $parent_name = $_POST['parent_name'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];

    // Database connection
    $host = 'localhost';    // Database host
    $user = 'root';         // Database username
    $password = '';         // Database password
    $dbname = 'daycare_system'; // Database name

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert baby data into database
    $sql = "INSERT INTO babies (name, dob, parent_name, contact_number, address) 
            VALUES ('$name', '$dob', '$parent_name', '$contact_number', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Baby added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
