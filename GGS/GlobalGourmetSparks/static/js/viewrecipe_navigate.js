$(document).ready(function () {
    function loadData(){
        $.getJSON('api/v1/navigation_data', function (data, status) {
            $("#recipe_img").attr('src', data[0]);
            $(".recipe_name").text(data[1]);
            $(".recipe_country").text("# " + data[2]);
            $(".recipe_type").text("# " + data[3]);
            $(".recipe_time").text("# " + data[4]);
            $(".recipe_people").text("# " + data[5] + " people");
        });
    }
    loadData();
    $('.nextp').click(function() {
        loadData();
    });
})