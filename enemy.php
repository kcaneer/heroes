<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "sqlheroes";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
//select current list of heroes
$sql = 'SELECT * FROM enemies';
$result = $conn->query($sql);

//get userinput to add friend
$newEnemy = $_POST['userInput'];
//update sql with new friend name

$sql = "INSERT INTO enemies (name) VALUES ('$newEnemy')";
//remove enemy
$removeEnemy = $_GET['remove'];
$removesql = "DELETE FROM enemies WHERE name = $removeEnemy";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

if ($sql != null) {
    header('Location: ./enemy.php');
    header("Location: index.php");
    exit;
}
?>
