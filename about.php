<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Cameroon Recipe Delights</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#loadAboutUs").click(function(){
                $.ajax({
                    url: "about.json",
                    type: "GET",
                    success: function(data){
                        $("#mission").text(data.mission);
                        $("#vision").text(data.vision);
                        var team = "";
                        $.each(data.team, function(index, member){
                            team += "<div class='col-md-4'>";
                            team += "<div class='card mb-4'>";
                            team += "<div class='card-body'>";
                            team += "<img scr=" + member.image + " alt='pic'/>";
                            team += "<h5 class='card-title'>" + member.name + "</h5>";
                            team += "<p class='card-text'>" + member.role + "</p>";
                            team += "</div>";
                            team += "</div>";
                            team += "</div>";
                        });
                        $("#teamContainer").html(team);
                    },
                    error: function(){
                        $("#aboutUsContent").html("<p class='text-danger'>Failed to load the content. Please try again later.</p>");
                    }
                });
            });
        });
    </script>
</head>
<body>
    <?php include 'header.html'?>
    
    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <p>Hi <?php echo $_SESSION['name']?> welicome to our about us page</p>
                <h1 class="display-4 text-center">About Us</h1>
                <p class="lead text-center">Learn more about Cameroon Recipe Delights and our mission to share the rich culinary heritage of Cameroon with the world.</p>
                
                <h2>Mission</h2>
                <p id="mission">Our mission is to share the rich flavors and diverse recipes that define Cameroonian cuisine with food enthusiasts around the world.</p>

                <h2>Vision</h2>
                <p id="vision">We envision a world where the culinary treasures of Cameroon are celebrated and enjoyed globally, bringing people together through the love of food.</p>
                
                <h2 class="mt-4">Our Team</h2>
                <div id="teamContainer" class="row about-section">
                    <!-- Team members will be loaded here via AJAX -->
                </div>
                <button id="loadAboutUs" class="btn btn-success mt-4">Load About Us Content</button>
            </div>
        </div>
    </main>
    <?php include 'footer.html'?>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
