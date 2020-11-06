<?php

$servername = "localhost";
$username = "root";
$password = "root";
$database = "sqlheroes";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

$sql = "SELECT id, name, about_me, biography FROM heroes";
$sql2 = "SELECT id, name FROM enemies";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

$friends = "";

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $friends .= "<li> " . " -<strong>" . $row["name"] . "</strong><br> " . $row["about_me"] . "<form class='mr-auto' method='GET' action='removeFriend.php'><button type='submit' name='remove' class='btn btn-danger'>Remove Friend</button></form></li>";
    }
}

if ($result2->num_rows > 0) {
    // output data of each row
    while ($row = $result2->fetch_assoc()) {
        $enemies .= "<li>" . "-<strong>" . $row["name"] . "</strong><br><form class='mr-auto' method='GET' action='removeEnemy.php'><button type='submit' name='remove' class='btn btn-success'>Remove Enemy</button></form></li>";
    }
}
$conn->close();
?>


<body>
    <div class="container-fluid page bg-dark">
        <div class="jumbotron">
            <h1 class="display-4 text-center text-white">Welcome to HeroBook</h1>
            <p class="lead text-center text-white">This is a great space to connect with your friends and keep an eye on your enemies!</p>
            <hr class="my-4">
            <p class="text-center text-white">Add your friends and enemies below!</p>
        </div>
        <form action="friends.php" method="POST" class="col col-6 mx-auto">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                <textarea name="userInput" type="text" class="form-control my-auto mt-2 mb-2" aria-label="With textarea"></textarea>
            </div>
            <div class="col col-6 mx-auto text-center">
                <button type="submit" class="btn btn-success mt-2 mb-2">Add Friend</button>
                <button type="submit" formaction="enemy.php" class="btn btn-danger mt-2 mb-2">Add Enemy</button>
            </div>
        </form>
        <div>
            <?php
            echo $_POST["name"];
            ?>
        </div>
        <div class="row">
            <div class="accordion col col-6" id="accordionExample">
                <div class="card">
                    <div class="card-header bg-success" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Your Current Friends
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <?php
                                echo $friends;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion col col-6" id="accordionExample">
                <div class="card">
                    <div class="card-header bg-danger" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Your Current Enemies
                            </button>
                        </h2>
                    </div>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <?php
                                echo $enemies;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark h-100">
            <div class="row h-100">
                <div class="col col-12 bg-dark h-100"> h </div>
            </div>
        </div> 
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>