<?php
// Conect to Mysql database

$host = "127.0.0.1:5500"; // Replace with your host
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "sample_project"; // Replace with your database name

// Create a new MySQLi instance
$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve the form data
$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];
$vin = $_POST['vin'];
$license = $_POST['license'];
$owner = $_POST['owner'];
$contact = $_POST['contact'];

// Insert the data into the database
$query = "INSERT INTO vehicles (make, model, year, vin, license, owner, contact)
          VALUES ('$make', '$model', '$year', '$vin', '$license', '$owner', '$contact')";

// Execute the query
// Code here assumes you are using MySQLi, adjust accordingly if using a different database API
if ($mysqli->query($query) === TRUE) {
    echo "Vehicle information added successfully!";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>
