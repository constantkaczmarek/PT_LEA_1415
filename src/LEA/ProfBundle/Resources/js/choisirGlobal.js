$(document).ready(function () {


    var formation = $("#formationGlobal");

    formation.change(function(){

        formation = $(this).val();
        $.ajax({
            type: "POST",
            url: Routing.generate('lea_prof_changeForm',{formation:formation}),
            success:function(data){
                location.reload();
            }
        });
        return false;
    });

    var year = $("#yearGlobal");

    year.change(function(){

        year = $(this).val();
        $.ajax({
            type: "POST",
            url: Routing.generate('lea_prof_changeForm',{year:year}),
            success:function(data){
                location.reload();
            }
        });
        return false;
    });

});