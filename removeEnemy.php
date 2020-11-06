<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "sqlheroes";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
//select current list of heroes
$removed = $_GET('remove');
$sql = "DELETE FROM enemies WHERE name = $removed";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

if ($sql != null) {
    header("Location: localhost:8888");
    exit;
}
