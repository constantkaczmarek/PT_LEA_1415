$(document).ready(function () {

    var formation = $("#formationGlobal");

    formation.change(function(){

        formation = $(this).val();
        $.ajax({
            type: "POST",
            url: Routing.generate('lea_prof_changeFormGlobal',{formation:formation}),
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
            url: Routing.generate('lea_prof_changeFormGlobal',{year:year}),
            success:function(data){
                location.reload();
            }
        });
        return false;
    });

    var suivi = $("#suiviGlobal");

    suivi.change(function(){

        suivi = $(this).val();
        $.ajax({
            type: "POST",
            url: Routing.generate('lea_prof_changeFormGlobal',{suivi:suivi}),
            success:function(data){
                location.reload();
            }
        });
        return false;
    });

});