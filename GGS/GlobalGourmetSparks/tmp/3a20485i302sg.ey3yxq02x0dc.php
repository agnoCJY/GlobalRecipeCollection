<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= ($html_title) ?></title>
    <link rel="stylesheet" type="text/css" href="static/css/viewrecipe_search.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;500;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"> </script>
    <script src="static/js/viewrecipe_search.js"></script>

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
                
                    <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/login">LOG IN</a></li>
                
                <?php else: ?>
                    <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/user_info">Hi, <?= ($SESSION['userName']) ?></a></li>
                
            <?php endif; ?>      
            <?php if ($SESSION['userName']=='UNSET'): ?>
                
                    <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/login">SHARE RECIPE</a></li>
                
                <?php else: ?>
                    <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/share_recipe?step=1">SHARE RECIPE</a></li>
                
            <?php endif; ?>      
            <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/viewrecipe-navigate"><u><b>VIEW RECIPE</b></u></a></li>
            <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/">HOME</a></li>
        </ul>
    </div>
</header>

<div class="bg-contain bg-center bg-local box-border mt-10 h-12 w-72 ..." style="background-image: url('static/img/switcher-right.png')">
    <div class="flex flex-row ...">
        <div class="box-border w-36 p-4 text-center ..." style="color: #F23D4C;"><a class="navigate_a" href="<?= ($BASE) ?>/viewrecipe-navigate">Navigate</a></div>
        <div class="box-border w-36 p-4 text-center ..." style="color: white;"><a class="search_a" href="<?= ($BASE) ?>/viewrecipe-search">Search</a></div>
    </div>
</div>

    <!-- <div class="switcher">
        <div class="background">
            <img src="static/img/switcher-right.png">
        </div>
        <div class="navigate"><a class="navigate_a" href="<?= ($BASE) ?>/viewrecipe-navigate">Navigate</a></div>
        <div class="search"><a class="search_a" href="<?= ($BASE) ?>/viewrecipe-search">Search</a></div>
    </div>
 -->
 <div class="flex flex-row-reverse mt-10">
    <div class="box-border pr-20 ...">
        <div class="recipecard">
            <ul id="recipe_list">
            </ul>
        </div>
    </div>

    <div class="fixed float-right ..." id="filter">
        <div>Country:</div>
        <select name="country" id="country_selector">
            <option value=""></option>
            <option value="China">China</option>
            <option value="Italy">Italy</option>
            <option value="Amarica">Amarica</option>
            <option value="Thailand">Thailand</option>
            <option value="Mexico">Mexico</option>
            <option value="Spain">Spain</option>
            <option value="England">England</option>
            <option value="Morocco">Morocco</option>
            <option value="Peru">Peru</option>
            <option value="India">India</option>
            <option value="Greek">Greek</option>
            <option value="French">French</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="South Korea">South Korea</option>
            <option value="Japan">Japan</option>
            <option value="Vietnam">Vietnam</option>
            <option value="Welsh">Welsh</option>
            <option value="Egypt">Egypt</option>
            <option value="Ireland">Ireland</option>
            <option value="Malaysia">Malaysia</option>

        </select>

        <div>Meal Type:</div>
        <select name="type" id="type_selector">
            <option value=""></option>
            <option value="Starters">Starters</option>
            <option value="Main meal">Main meal</option>
            <option value="Dessert">Dessert</option>
            <option value="Drink">Drink</option>
        </select>

        <div>Meal Time:</div>
        <select name="time" id="time_selector">
            <option value=""></option>
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
        </select>

        <div>People:</div>
        <select name="people" id="people_selector">
            <option value=""></option>
            <option value="1-3">1~3</option>
            <option value="4-6">4~6</option>
            <option value="7-9">7~9</option>
            <option value="9-">>9</option>
        </select>
    </div>
</div>

</body>


</html>


