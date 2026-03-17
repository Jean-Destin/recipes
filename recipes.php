<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe | Cameroon Recipe Delights</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
    // Load recipe names into the dropdown
    $.ajax({
        url: 'recipe.json', // Path to your JSON file
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            let options = "<option value=''>Select a Recipe</option>";
            data.forEach(function(recipe, index) {
                options += `<option value="${index}">${recipe.name}</option>`;
            });
            $('#recipeSelect').html(options);
        },
        error: function() {
            alert('Failed to load recipes. Please try again later.');
        }
    });

    // Load selected recipe details
    $('#loadRecipe').click(function() {
        const selectedIndex = $('#recipeSelect').val();
        if (selectedIndex !== '') {
            $.ajax({
                url: 'recipe.json', // Path to your JSON file
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const recipe = data[selectedIndex];

                    $('#recipeName').text(recipe.name);
                    $('#recipeDescription').text(recipe.description);
                    $('#recipeImage').attr('src', recipe.image);

                    let ingredients = "";
                    recipe.ingredients.forEach(function(ingredient) {
                        ingredients += `<li class='list-group-item'>${ingredient}</li>`;
                    });
                    $('#ingredientsList').html(ingredients);

                    let instructions = "";
                    recipe.instructions.forEach(function(instruction) {
                        instructions += `<li class='list-group-item'>${instruction}</li>`;
                    });
                    $('#instructionsList').html(instructions);

                    $('#prepTime').text(recipe.prepTime);
                    $('#cookTime').text(recipe.cookTime);
                    $('#servings').text(recipe.servings);
                    $('#calories').text(recipe.nutrition.calories);
                    $('#protein').text(recipe.nutrition.protein);
                    $('#fat').text(recipe.nutrition.fat);
                    $('#carbohydrates').text(recipe.nutrition.carbohydrates);
                },
                error: function() {
                    alert('Failed to load recipe details. Please try again later.');
                }
            });
        } else {
            alert('Please select a recipe.');
        }
    });
});

    </script>
</head>
<body>
    <?php include 'header.html'?>
    <main class="container mt-5"> 
     <p> Hi <?php echo $_SESSION['name']?> welcome to our recipe page select your recipe below</p>
        <div class="row"> <div class="col-md-8">
             <h1 id="recipeName" class="display-4">Recipe Name</h1> 
             <p id="recipeDescription" class="lead">A brief introduction to the recipe, highlighting its significance in Cameroonian cuisine.</p> 
             <img id="recipeImage" src="path_to_recipe_image.jpg" class="img-fluid mb-4" alt="Recipe Image">
              <h2>Ingredients</h2> 
              <ul id="ingredientsList" class="list-group list-group-item"> 
                <!-- Ingredients will be loaded here via AJAX --> 
              </ul> 
              <h2 class="mt-4">Instructions</h2> 
              <ol id="instructionsList" class="list-group list-group-item list-group-flush"> 
                <!-- Instructions will be loaded here via AJAX --> 
                </ol> </div> 
                <div class="col-md-4"> 
                    <div class="card">
                         <div class="card-body"> 
                            <h4 class="card-title">Recipe Details</h4> 
                            <p class="card-text"><strong>Prep Time:</strong> <span id="prepTime">20 minutes</span></p>
                            <p class="card-text"><strong>Cook Time:</strong> <span id="cookTime">45 minutes</span></p>
                            <p class="card-text"><strong>Servings:</strong> <span id="servings">4 people</span></p> 
                        </div> 
                    </div> 
                        <div class="card mt-4"> 
                            <div class="card-body"> 
                                <h4 class="card-title">Nutrition Facts</h4> 
                                <p class="card-text"><strong>Calories:</strong> <span id="calories">250 kcal</span></p> 
                                <p class="card-text"><strong>Protein:</strong> <span id="protein">10 g</span></p> 
                                <p class="card-text"><strong>Fat:</strong> <span id="fat">15 g</span></p> 
                                <p class="card-text"><strong>Carbohydrates:</strong> <span id="carbohydrates">20 g</span></p> 
                            </div> 
                        </div> 
                </div> 
            </div> 
            <select id="recipeSelect" class="form-control mt-4"> 
                <option value="">Select a Recipe</option> 
            </select> 
            <button id="loadRecipe" class="btn btn-success mt-4">Load Recipe</button>
        </main>
    <?php include 'footer.html'?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
