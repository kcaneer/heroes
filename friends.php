<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "sqlheroes";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

//get userinput to add friend
$newFriend = $_POST['userInput'];
//update sql with new friend name
$sql = "INSERT INTO heroes (name, about_me, biography) VALUES ('$newFriend', '', '')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

if ($sql != null) {
    header('Location: ./friends.php');
    header("Location: index.php");
    exit;
}

?>