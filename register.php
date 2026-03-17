<?php
//referencing the connection file db.php
include 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //collection of data
$Firstname = $conn->real_escape_string($_POST['Firstname']);
$Lastname =$conn->real_escape_string( $_POST['Lastname']);
$psuedoname =$conn->real_escape_string( $_POST['Pseudoname']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['Password']);
$confirmpassword = $conn->real_escape_string($_POST['Confirmpassword']);
$gender = $conn->real_escape_string($_POST['btn']);
//set sql command in
$sql = "INSERT INTO users(First_name, Last_name, Pseudoname, email, password, gender ) VALUES('$Firstname', '$Lastname', '$psuedoname', '$email', '$hashed_password', '$gender')";

if($conn->query($sql)===TRUE){
    header('location:login.php');
}else{
    header('location:Register.php');
}
$conn->close();
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
    <script>
        function validate(){
        var pass = document.getElementById('pass').value;
        var conf = document.getElementById('confirmpass').value;
        if(pass!=conf){
            document.getElementById('alert').innerHTML = "Passwords do not match";
            return false;
        }
        return true;
    }
    </script>
</head>
<body>
    <header class="header-container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand logo" href="#"><span class="text-white h3">Culinary</span> Cameroon</a>
        </nav>
    </header>
    <main>
    <div class="container-fluid bg-light py-5">
       <div class=" row justify-content-center">
         <form class="col-lg-3 bg-white border rouded shadow-lg m-5 text-center" method="post" onsubmit="return validate()">
                <h1 class="text-center p-4">sign-up</h1>
                <div class="form-group m-2">
                    <input type="text" name="Firstname" class='form-control' placeholder="Firstname" required>
                </div>
                <div class="form-group  m-2">
                    <input type="text" name="Lastname" class='form-control' placeholder="Lastname" required>
                </div>
                <div class="form-group  m-2">
                    <input type="text" name="Pseudoname" class='form-control' placeholder="Pseudoname" required>
                </div>
                <div class="form-group m-2"> 
                    <input type="email" name="email" class='form-control' placeholder="email" required>
                </div>
                <div class="form-group m-2">
                    <input type="Password" name="Password" class='form-control' id="pass" placeholder="Password" max="10" min="8" required>
                </div>
                <div class="form-group m-2">
                    <input type="Password" name="Confirmpassword" class='form-control' id="confirmpass"   placeholder="confirmpassword" max="10" min="8"required>
                </div>
                <div id="alert" class="text-danger form-group"></div>
                <div class="form-group m-2">
                            <label>male</label>
                            <input name="btn" type="radio" value="male" required>
                            <label>female</label> 
                            <input name="btn" type="radio" value="female" required>
                        </div>
                <div class="form-group m-2 text-center">
                    <button type="Submit" name="Submit " class="btn btn-primary">create account</button>         
                </div>
                    <p>Already have an account? <a href="login.php">sign-in</a></p>       
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