<?php 
    session_start();
    include 'contact_process.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cameroon Recipe Delights</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "recipe.json", // Ensure this is the correct path to your JSON file
                type: "GET",
                success: function(data){
                    var recipes = "";
                    $.each(data, function(index, recipe){
                        recipes += `
                            <div class='carousel-item ${index === 0 ? "active" : ""}'>
                                <div class='card'>
                                    <a href='recipes.php' ><img src='${recipe.image}' class='card-img-top' alt='${recipe.name}'></a>
                                    <div class='card-body'>
                                        <h5 class='card-title'>${recipe.name}</h5>
                                        <p class='card-text'>${recipe.description}</p>
                                    </div>
                                </div>
                            </div>`;
                    });
                    $("#recipesContainer").html(recipes);
                },
                error: function(){
                    $("#recipesContainer").html("<p class='text-danger'>Failed to load recipes. Please try again later.</p>");
                }
            });
        });
    </script>
</head>
<body>
    <?php include 'header.html'; ?>

    <main class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4"><?php echo $_SESSION['name']?> Welcome to Cameroon Recipe Delights!</h1>
            <p class="lead">Discover the rich and diverse culinary heritage of Cameroon. From traditional dishes to modern twists, we bring you the best of Cameroonian cuisine.</p>
            <a class="btn btn-primary btn-lg" href="recipes.php" role="button">Explore Recipes</a>
        </div>

        <section class="featured-recipes my-5">
            <h2 class="text-center">Featured Recipes</h2>
            <div id="recipesCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner featured-recipes" id="recipesContainer">
                    <!-- Recipes will be loaded here via AJAX -->
                </div>
                <a class="carousel-control-prev" href="#recipesCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#recipesCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>

        <section class="about-section my-5">
            <h2 class="text-center">About Us</h2>   
            <p class="text-center">Cameroon Recipe Delights is your gateway to the vibrant culinary traditions of Cameroon. Our mission is to share the rich flavors and diverse recipes that define Cameroonian cuisine with food enthusiasts around the world. Join us on a gastronomic journey as we explore the best that Cameroon has to offer.</p>
        </section>

        <section class="contact-form my-5">
            <h2 class="text-center">Contact Us</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
    </main>

    <?php include 'footer.html'; ?>
</body>
</html>
