<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= ($html_title) ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;500;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="static/css/viewrecipe_navigate.css">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"> </script>
    <script src="static/js/viewrecipe_navigate.js"></script>
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

<!-- <div class="switcher">
    <div class="box-border pt-14 ..." id="background">
        <img class="w-80" src="static/img/switcher-left.png">
    </div>
    <div class="navigate"><a class="navigate_a" href="<?= ($BASE) ?>/viewrecipe-navigate">Navigate</a></div>
    <div class="search"><a class="search_a" href="<?= ($BASE) ?>/viewrecipe-search">Search</a></div>
</div> -->

<div class="bg-contain bg-center bg-local box-border mt-10 h-12 w-72 ..." style="background-image: url('static/img/switcher-left.png')">
    <div class="flex flex-row ...">
        <div class="box-border w-36 p-4 text-center ..." style="color: white;"><a class="navigate_a" href="<?= ($BASE) ?>/viewrecipe-navigate">Navigate</a></div>
        <div class="box-border w-36 p-4 text-center ..." style="color: #F23D4C";"><a class="search_a" href="<?= ($BASE) ?>/viewrecipe-search">Search</a></div>
    </div>
</div>

<div>
    <div class="flex justify-center z-0">
        <div class="recipe">
            <img id="recipe_img" src="">
        </div>

        <div class="bg-cover bg-center box-border h-96 w-72 ..." id="recipts" style="background-image: url('static/img/recipts.png')">
            <br>
            <div class="text-center">************************************</div>
            <div class="text-center" id="recipe_name" style="color:#F23D4C; font-size: 20px; font-weight: bolder; "></div>
            <div class="text-center">************************************<div>
            
            <div class="recipe_country"># </div>
            <div class="recipe_type"># </div>
            <div class="recipe_time"># </div>
            <div class="recipe_people">#  people</div>

            <br><br><br><br><br><br>
            <div class="flex flex-row ...">
                <div class="flex flex-row  ...">
                    <img class="box-border ml-10" id="mdimg" src="static/img/moredetail.png">
                    <p class="mdp">More Detail</p>
                </div>

                <button class="flex flex-row focus:outline-none  ...">
                    <img class="box-border ml-10" id="mdimg" src="static/img/next.png">
                    <p class="nextp" style="color: #F23D4C; font-size: 15px;">Next</p>
                </button>

            </div>
        
        </div>

        <!-- <div class="moredetial"></div>
        <img class="mdimg" src="static/img/moredetail.png">
        <p class="mdp">More Detail</p>

        <div class="likeit"></div>
        <img class="liimg" src="static/img/heart.png">
        <div class="lip"><a class="lipa" href="<?= ($BASE) ?>/login">Like It</a></div>

        <div class="next"></div>
        <button>
            <img class="nextimg" src="static/img/next.png">
            <div class="nextp">Next</div>
        </button> -->

    </div>

    <!-- <div class="absolute box-border mt-10 h-12 w-72 z-40..." style="background-image: url('static/img/recipts.png')">
        <div>1</div>
    </div> -->

</div>



</body>


</html>


