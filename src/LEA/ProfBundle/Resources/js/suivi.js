$(document).ready(function() {

    var etudiants = $(".button");

    etudiants.click(function(){

        etudiants = $(this).attr('id');
        $.ajax({
            type: "GET",
            url: Routing.generate('lea_prof_suiviSuppr',{"etudiant":etudiants}),
            datatype:"json",
            success:function(){
                location.reload(true);
            },
            error:function(){
                console.log("error");
            }
        });
    });

});