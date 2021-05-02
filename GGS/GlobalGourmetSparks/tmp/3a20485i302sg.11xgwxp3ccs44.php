<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= ($html_title) ?></title>
    <link rel="stylesheet" type="text/css" href="static/css/user_info.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;500;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"> </script>
</head>
<body style= "background: #EBEEF2">
<header>
    <div class="float-left box-border h-32 w-32 p-4 ...">
        <a href="<?= ($BASE) ?>/"><img  class="logo" src="static/img/sparkslogo.png"></a>
    </div>
    <div class="box-border pt-8 pr-10 ...">
        <ul class="flex flex-row-reverse">
            <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="https://media.ed.ac.uk/media/Global%20Recipe%20Collection/1_pzuyjr1r">VIDEO</a></li>
            <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="static/DWD 750 words text Report-1st submission.pdf">REPORT</a></li>
            <?php if ($SESSION['userName']=='UNSET'): ?>
                
                    <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/login"><b><u>LOG IN</u></b></a></li>
                
                <?php else: ?>
                    <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/user_info"><b><u>Hi, <?= ($SESSION['userName']) ?></u></b></a></li>
                
            <?php endif; ?>      
            <?php if ($SESSION['userName']=='UNSET'): ?>
                
                    <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/login">SHARE RECIPE</a></li>
                
                <?php else: ?>
                    <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/share_recipe?step=1">SHARE RECIPE</a></li>
                
            <?php endif; ?>      
            <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/viewrecipe-navigate">VIEW RECIPE</a></li>
            <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/">HOME</a></li>
        </ul>
    </div>
</header>

<form method=post action="<?= ($BASE) ?>/user_info">
    <input type="submit" name="submit" value="Logout">
</form>

 <div class="flex flex-row-reverse">
    <div class="box-border pr-20 ...">
        <div class="recipecard">
            <ul id="recipe_list">
            </ul>
        </div>
    </div>
<script>
    $(function() {
        $.getJSON('api/v1/my-recipe', function(data) {
          $('#recipe_list').empty();
          for (let index = 0; index < data.length; index++) {
            let recipe = data[index];
            $('#recipe_list').append(`<li id="recipe-li-${index}" class="recipe">
                <div class="card">
                  <img src="static/img/recipe/${recipe.photo}" style="width:100%">
                  <div class="container">
                    <h4><b><u>${recipe.name}</u></b></h4>

                  <div class="flex flex-row ...">
                    <p><span style="color:#F23D4C;">#</span> ${recipe.country}</p>
                    <p class="box-border ml-10"><span style="color:#F23D4C;">#</span> ${recipe.meal_time}</p> 
                  </div>

                  <div class="flex flex-row ...">
                    <p><span style="color:#F23D4C;">#</span> ${recipe.meal_type}</p>
                    <p class="box-border ml-10"><span style="color:#F23D4C;">#</span> ${recipe.people_quantity} people</p>
                  </div>
                </div>
              </li>`);
          }
        })
    });
</script>
</body>


</html>


