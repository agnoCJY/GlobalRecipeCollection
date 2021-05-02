<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= ($html_title) ?></title>
    <link rel="icon" href="static/img/black_logo.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="static/css/index.css">

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
                
                    <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/login"><b><u>SHARE RECIPE</u></b></a></li>
                
                <?php else: ?>
                    <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/share_recipe?step=1"><b><u>SHARE RECIPE</u></b></a></li>
                
            <?php endif; ?>      
            <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/viewrecipe-navigate">VIEW RECIPE</a></li>
            <li class="box-border w-50 p-4 ..." id="menu_a" style="color:#F23D4C"><a href="<?= ($BASE) ?>/">HOME</a></li>
        </ul>
    </div>
</header>

<img  class="logo" src="static/img/share_recipe.png">

<div>2</div>

<div><a href="<?= ($BASE) ?>/share_recipe?step=3">next</a></div>


</body>


</html>


