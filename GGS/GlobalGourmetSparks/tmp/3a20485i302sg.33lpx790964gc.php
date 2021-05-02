<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= ($html_title) ?></title>
    <link rel="stylesheet" type="text/css" href="static/css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;500;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
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

<div class="mt-10 ...">
    <div class="float-left box-border ml-10">
        <div class="animation">
            <img src="static/img/FinalRed-Animation.gif">
        </div>
    </div>
    <div class="float-right box-border mr-60">
        <div class="form">
            <form autocomplete="off" id="form1" name="form1" method="post" action="<?= ($BASE) ?>/login">
                <label for="fname" id="username">USER NAME</label><br><br>
                <input name="uname" type="text" placeholder="Please enter your user name" id="name" size="50"/><br><br><br>

                <label for="lname" id="password">PASSWORD</label><br><br>
                <input name="password" type="password" placeholder="Please enter your password" id="pass" size="50"/><br><br><br><br>
                
                <input type="submit" name="Submit" value="LOG IN" id="login">
            </form>
        </div>
        <?php if ($message=='N'): ?>
            
                <div>Wrong username or password.</div>
            
        <?php endif; ?>
    </div>
</div>




</body>


</html>


