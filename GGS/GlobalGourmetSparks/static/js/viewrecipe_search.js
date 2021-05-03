$(document).ready(function () {
  function doSearch() {
    let filter_obj = {};
    switch ($('#people_selector').val()) {
      case '':
        break
      case '1-3':
        filter_obj.people_quantity_min = 1;
        filter_obj.people_quantity_max = 4;
        break;
      case '4-6':
        filter_obj.people_quantity_min = 4;
        filter_obj.people_quantity_max = 7;
        break;
      case '7-9':
        filter_obj.people_quantity_min = 7;
        filter_obj.people_quantity_max = 10;
        break;
      default:
        filter_obj.people_quantity_min = 10;
    }
    filter_obj.country = $('#country_selector').val();
    filter_obj.meal_type = $('#type_selector').val();
    filter_obj.meal_time = $('#time_selector').val();
    $.getJSON('api/v1/recipe', filter_obj, function(data) {
      $('#recipe_list').empty();
      for (let index = 0; index < data.length; index++) {
        let recipe = data[index];
        $('#recipe_list').append(`<li id="recipe-li-${index}" class="recipe">
                <div class="card">
                  <a href="${recipe.URL}"><img class="h-48" src="static/img/recipe/${recipe.photo}" style="width:100%"></a>
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
  }
  $('#country_selector').change(doSearch);
  $('#type_selector').change(doSearch);
  $('#time_selector').change(doSearch);
  $('#people_selector').change(doSearch);
  doSearch();
});
