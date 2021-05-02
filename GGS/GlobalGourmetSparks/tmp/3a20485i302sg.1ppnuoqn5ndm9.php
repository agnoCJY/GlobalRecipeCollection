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

<div class="flex justify-center">
    <div class="bg-cover bg-center box-border mt-10 h-32 w-80 ..." style="background-image: url('static/img/share_recipe.png')">
        <div class="text-center mt-10 mr-6">
            <span class="inline-block align-middle ..." style="font-weight: bolder; color: white;">STEP 1/1</span>
        </div>
    </div>
</div>

<div class="flex flex-row mt-10 ...">
    <div class="box-border w-3/6">
        <img class="box-border mx-20 w-4/6" id="upload_file_img" src="static/img/upload.png">
        <input type="file" id="upload_file" style="display:none"/>
    </div>
    <div class="box-border w-3/6">
        <form id="form1" name="form1" method="post" action="<?= ($BASE) ?>/share_recipe?step=1">
            <div class="flex flex-row= ...">
                Name:
                <input class="box-border mx-10" name="name" type="text" id="name" size="25" />
            
                <!-- photo:
                <input disabled="value" id="input_photo" name="photo" type="text" size="25" /> -->
            
                <div>Country:</div>
                <select class="box-border mx-10" name="country" id="country_selector">
                    <option></option>
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
            </div>

            <div>Type:</div>
            <select name="meal_type" id="type_selector">
                <option></option>
                <option value="Starters">Starters</option>
                <option value="Main meal">Main meal</option>
                <option value="Dessert">Dessert</option>
                <option value="Drink">Drink</option>
            </select>
        
            <div>Time:</div>
            <select name="meal_time" id="time_selector">
                <option></option>
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
            </select>
        
            <div>People:</div>
            <select name="people_qantity" id="people_selector">
                <option></option>
                <option value="1-3">1~3</option>
                <option value="4-6">4~6</option>
                <option value="7-9">7~9</option>
                <option value="9-">>9</option>
            </select>
          
          <p>
            <input type="submit" name="Submit" value="Submit" />
          </p>
          </form>
            </div>
</div>


<!-- <img id="upload_file_img" src="static/img/upload.png">
<input type="file" id="upload_file" style="display:none"/> -->

<!-- <form id="form1" name="form1" method="post" action="<?= ($BASE) ?>/share_recipe?step=1">
    Name:
    <input name="name" type="text" id="name" size="25" />

    photo:
    <input id="input_photo" name="photo" type="text" size="25" />

    <div>Country:</div>
    <select name="country" id="country_selector">
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

    <div>Type:</div>
    <select name="meal_type" id="type_selector">
        <option value="Starters">Starters</option>
        <option value="Main meal">Main meal</option>
        <option value="Dessert">Dessert</option>
        <option value="Drink">Drink</option>
    </select>

    <div>Time:</div>
    <select name="meal_time" id="time_selector">
        <option value="Breakfast">Breakfast</option>
        <option value="Lunch">Lunch</option>
        <option value="Dinner">Dinner</option>
    </select>

    <div>People:</div>
    <select name="people_qantity" id="people_selector">
        <option value="1-3">1~3</option>
        <option value="4-6">4~6</option>
        <option value="7-9">7~9</option>
        <option value="9-">>9</option>
    </select>
  
  <p>
    <input type="submit" name="Submit" value="Submit" />
  </p>
  </form> -->

<div><a href="<?= ($BASE) ?>/share_recipe?step=2">next</a></div>
<script>
$(function() {
    $('#upload_file_img').click(function() {
        $('#upload_file').click();
    });
    $('#upload_file').change(function() {
        let files = document.querySelector('#upload_file').files;
        let file = files[0];
        let formData = new FormData();
        formData.append('image', file, '123.jpg');
        $.ajax({
            url: 'api/v1/upload',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                $('#input_photo').val(res);
            }
        })

    });
    $('#form1').submit(function() {
        if(!$('#input_photo').val()) {
            return false;
        }
    });
});
</script>
</body>


</html>


