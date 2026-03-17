<?php
include "db.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email =$conn->real_escape_string( $_POST['email']);
    $password = $conn->real_escape_string($_POST['Password']);

    // Retrieve user from the users table
    $sql = "SELECT  Pseudoname, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result( $psuedoname, $password);
        $stmt->fetch();
        $_SESSION['name']= $psuedoname;
        if ($password == $password) {
            header('Location: index.php');
            exit;
    } else {
        $nullpass=1;
    }

    $stmt->close();
    $conn->close();
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign-up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <header class="header-container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand logo" href="#"><span class="text-white h3">Culinary</span> Cameroon</a>
        </nav>
    </header>
    <main class="py-5 bg-light">
    <div class="container-fluid  py-5">
       <div class=" row justify-content-center">
         <form class="col-lg-3 bg-white border rouded shadow-lg m-5 text-center" method="post" >
            <h1 class="text-center p-4" >sign-in</h1>
                <div class="form-group m-2"> 
                    <input type="email" name="email" class='form-control' placeholder="email" required>
                </div>
                <div class="form-group m-2">
                    <input type="Password" name="Password" class='form-control' id="pass" placeholder="Password" max="10" min="5" required>
                </div>
                <div class="form-group m-2 text-center">
                    <button type="Submit" name="Submit " class="btn btn-primary">log-in</button>         
                </div>
                    <p>Dont have an account? <a href="register.php">sign-up</a></p>       
            </form>
        </div>

    </div>
    </main>
    <footer class="text-dark  bg-dark ">
        <div class="text-center py-3 text-light">
            <p>&copy; 2024 Cameroon Recipe Delights. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>